<template>

<tr class="font-light text-sm text-blue-700 hover:bg-opacity-100">
        <td class="px-6 py-4">
            <div>{{ title }}</div>
        </td>
        <td class="px-6 py-4">
            {{created_at}}
        </td>
        <td class="px-6 py-4 cursor-pointer" @click="showInterests(id)">{{ nbrInterests }}</td>
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
              <svg fill="#00458B" class="h-4 w-4" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" id="memory-archive"><path d="M2 2H20V8H19V20H3V8H2V2M17 18V8H5V18H17M4 4V6H18V4H4M7 10H15V12H7V10Z" /></svg>
            </a>
          </div>
        </td>
</tr>

</template>

<script>
export default{
    name:'myOfferDashboard',
    data(){

      return{

        nbrInterests: 0,
        interests: []

      }

    },
    props:{

        title:{
            type:String
        },
        id:{
            type:Number
        },
        created_at:{
          type:String
        }

    },
    created(){

          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            url: "http://localhost:8000/api/offer/nbrinterests",
            type: "POST",
            context: this,
            data: {idoffer:this.id},
            success:function(nbrInterests){
              this.nbrInterests = nbrInterests

            }

        });
    },
    methods:{
        delette(idOffer){


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            url: "http://localhost:8000/api/offer/delete",
            type: "POST",
            context: this,
            data: {idoffer:idOffer},
            success:function(data){


                this.$emit('updateOffers')



            }

        });


        },
        archive(idOffer){


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            url: "http://localhost:8000/api/offer/archive",
            type: "POST",
            context: this,
            data: {idoffer:idOffer},
            success:function(data){

            }

        });


        },
        showInterests(idOffer){

          if(this.nbrInterests>0){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "http://localhost:8000/api/offer/interests",
                type: "POST",
                context: this,
                data: {idoffer:idOffer},
                success:function(interests){
                  this.interests = interests

                  this.$emit('showInterestedUsers',{'interests':this.interests,'idoffer':idOffer})

                
                }
            });

          }

        }
    }
}
</script>