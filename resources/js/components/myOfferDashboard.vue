<template>

<tr class="font-light text-sm text-blue-700 hover:bg-opacity-100">
        <td class="px-6 py-4">
            <div @click="showUpdateForm(id)" class="cursor-pointer">{{ title }}</div>
        </td>
        <td class="px-6 py-4">
            {{created_at}}
        </td>
        <td class="px-6 py-4 cursor-pointer" @click="showInterests(id)">{{ nbrInterests }}</td>
        <td class="px-6 py-4">
          <div class="flex justify-end gap-4">
            <a x-data="{ tooltip: 'Delete' }" class="cursor-pointer" @click="showPhotos(id)">
              <svg class="h-4 w-4 text-blue-700" fill="#00458B" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><title>Photos</title><path d="M43.5,37h-33A4.5,4.5,0,0,1,6,32.5V7.5A4.5,4.5,0,0,1,10.5,3h33A4.5,4.5,0,0,1,48,7.5v25A4.5,4.5,0,0,1,43.5,37ZM10.5,4A3.5,3.5,0,0,0,7,7.5v25A3.5,3.5,0,0,0,10.5,36h33A3.5,3.5,0,0,0,47,32.5V7.5A3.5,3.5,0,0,0,43.5,4h-33Z"/><path d="M40.52,28.25H12a0.72,0.72,0,0,1-.65-0.39,0.71,0.71,0,0,1,0-.74L17.76,19a0.73,0.73,0,0,1,1.17,0l4,4.42,7.27-9.86a0.77,0.77,0,0,1,1.2,0l9.75,13.55h0a0.71,0.71,0,0,1,0,.73A0.72,0.72,0,0,1,40.52,28.25Zm-28-1H40L30.76,14.44l-7.25,9.82a0.72,0.72,0,0,1-.58.3,0.79,0.79,0,0,1-.6-0.3l-4-4.43Zm10.17-3.58,0,0Zm0.38,0,0,0Zm-4.94-4v0Zm0.41,0,0,0Zm12-5.43h0Zm0.44,0,0,0Z"/><path d="M23,16a3,3,0,1,1,3-3A3,3,0,0,1,23,16Zm0-5a2,2,0,1,0,2,2A2,2,0,0,0,23,11Z"/><path d="M42,44.5H5A4.5,4.5,0,0,1,.5,40V11a0.5,0.5,0,0,1,1,0V40A3.5,3.5,0,0,0,5,43.5H42A0.5,0.5,0,0,1,42,44.5Z"/><rect fill="#00458B"/></svg>
            </a>
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
              <svg v-if="!userarchived" fill="#00458B" class="h-4 w-4" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" id="memory-archive"><path d="M2 2H20V8H19V20H3V8H2V2M17 18V8H5V18H17M4 4V6H18V4H4M7 10H15V12H7V10Z" /></svg>
              <svg v-if="userarchived" class="w-4 h-4" fill="#00458B" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>unarchive-line</title> <path d="M29,32H7V22H5V32a2,2,0,0,0,2,2H29a2,2,0,0,0,2-2V22H29Z" class="clr-i-outline clr-i-outline-path-1"></path><path d="M14,24a1,1,0,0,0,1,1h6a1,1,0,0,0,0-2H15A1,1,0,0,0,14,24Z" class="clr-i-outline clr-i-outline-path-2"></path><path d="M15,18H6V14h9V12H5.5A1.5,1.5,0,0,0,4,13.5V20H15.78A3,3,0,0,1,15,18Z" class="clr-i-outline clr-i-outline-path-3"></path><path d="M30.5,12H21v2h9v4H21a3,3,0,0,1-.78,2H32V13.5A1.5,1.5,0,0,0,30.5,12Z" class="clr-i-outline clr-i-outline-path-4"></path><path d="M13,9.55,17,5.6V18a1,1,0,1,0,2,0V5.6l4,3.95a1,1,0,1,0,1.41-1.42L18,1.78,11.61,8.13A1,1,0,0,0,13,9.55Z" class="clr-i-outline clr-i-outline-path-5"></path> <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect> </g></svg>
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
        },
        userarchived:{
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

            url: "http://localhost:8000/api/offer/userarchive",
            type: "POST",
            context: this,
            data: {idoffer:idOffer},
            success:function(){

              this.$emit('updateOffers')

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

        },
        showUpdateForm(id){

          this.$emit('showUpdateForm',{'idoffer':id})


        },
        showPhotos(idOffer){
          this.$emit('showPhotos',{'idoffer':idOffer})
        }
    }
}
</script>