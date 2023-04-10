<template>

<tr class="font-light text-sm text-blue-700 hover:bg-opacity-100">
            <td class="px-6 py-4">
                <div>{{ name }}</div>
            </td>
            <td class="px-6 py-4">
                {{ created_at }}
            </td>
            <td class="px-6 py-4">{{ nbrOffers }}</td>
            <td class="px-6 py-4">
              <div class="flex justify-end gap-4">
                <a x-data="{ tooltip: 'Delete' }" @click="delette(id);" class="cursor-pointer">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-4 w-4"
                    x-tooltip="tooltip"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                    />
                  </svg>
                </a>
                <a x-data="{ tooltip: 'Edite' }" @click="archive(id);" class="cursor-pointer">
                  <svg v-if="!archived" class="w-4 h-4" fill="#00458B" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" id="memory-archive"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M2 2H20V8H19V20H3V8H2V2M17 18V8H5V18H17M4 4V6H18V4H4M7 10H15V12H7V10Z"></path></g></svg>
                  <svg v-if="archived" class="w-4 h-4" fill="#00458B" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>unarchive-line</title> <path d="M29,32H7V22H5V32a2,2,0,0,0,2,2H29a2,2,0,0,0,2-2V22H29Z" class="clr-i-outline clr-i-outline-path-1"></path><path d="M14,24a1,1,0,0,0,1,1h6a1,1,0,0,0,0-2H15A1,1,0,0,0,14,24Z" class="clr-i-outline clr-i-outline-path-2"></path><path d="M15,18H6V14h9V12H5.5A1.5,1.5,0,0,0,4,13.5V20H15.78A3,3,0,0,1,15,18Z" class="clr-i-outline clr-i-outline-path-3"></path><path d="M30.5,12H21v2h9v4H21a3,3,0,0,1-.78,2H32V13.5A1.5,1.5,0,0,0,30.5,12Z" class="clr-i-outline clr-i-outline-path-4"></path><path d="M13,9.55,17,5.6V18a1,1,0,1,0,2,0V5.6l4,3.95a1,1,0,1,0,1.41-1.42L18,1.78,11.61,8.13A1,1,0,0,0,13,9.55Z" class="clr-i-outline clr-i-outline-path-5"></path> <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect> </g></svg>
                </a>
              </div>
            </td>
          </tr>

</template>
<script>

export default{

    name:'client',
    data(){

      return {

        nbrOffers : 0

      }

    },
    props:{
        name:{
            type:String
        },
        id:{
            type:Number
        },
        created_at:{
          type:String
        },
        archived:{
          type:Boolean
        }
    },
    created(){


      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({

          url: "http://localhost:8000/api/client/offers",
          type: "POST",
          context: this,
          data: {idclient:this.id},
          success:function(nbrOffers){

              this.nbrOffers = nbrOffers

          }

      });

    },
    methods:{
        archive(idClient){


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: "http://localhost:8000/api/client/archive",
                type: "POST",
                context: this,
                data: {idclient:idClient},
                success:function(data){


                    this.$emit('updateUsers')



                }

            });

        },
        delette(idClient){


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: "http://localhost:8000/api/client/delete",
                type: "POST",
                context: this,
                data: {idclient:idClient},
                success:function(data){


                    // this.$emit('updateUsers')


                    alert(data)



                }

            });

        }
    }
    
}
</script>