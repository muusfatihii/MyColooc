<template>

    <tr class="font-light text-sm text-blue-700 hover:bg-opacity-100">
                <td class="px-6 py-4">
                    <div>{{ name }}</div>
                </td>
                <td class="px-6 py-4">
                    {{created_at}}
                </td>
                <td class="px-6 py-4">{{ nbrOffers }}</td>
                <td class="px-6 py-4">
                  <div class="flex justify-end gap-4">
                    <a x-data="{ tooltip: 'Delete' }" @click="validate(id);" class="cursor-pointer">
                      <svg class="w-6 h-6" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>validate</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Combined-Shape" fill="#00458B" transform="translate(64.000000, 63.999974)"> <path d="M336.9,-1.42108547e-14 L306.419,42.666 L42.6666667,42.6666928 L42.6666667,341.333359 L341.333333,341.333359 L341.333,140.606 L384,80.872 L384,384.000026 L1.42108547e-14,384.000026 L1.42108547e-14,2.61499954e-05 L336.9,-1.42108547e-14 Z M345.307019,24.9336114 L380.026314,49.7331076 L205.714356,293.769849 L65.2539169,159.416386 L94.7460831,128.583667 L199.616,228.885359 L345.307019,24.9336114 Z M357.333333,2.61499954e-05 L357.333,7.308 L347.102,-1.42108547e-14 L357.333333,2.61499954e-05 Z"> </path> </g> </g> </g></svg>
                    </a>
                  </div>
                </td>
              </tr>
    
    </template>
    <script>
    
    export default{
    
        name:'userToValidate',
        props:{
            name:{
                type:String
            },
            id:{
                type:Number
            },
            created_at:{
              type:String
            }
        },
        data(){

          return{

            nbrOffers:0
            
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
            validate(idClient){
    
    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                $.ajax({
    
                    url: "http://localhost:8000/api/client/validate",
                    type: "POST",
                    context: this,
                    data: {idclient:idClient},
                    success:function(data){
    
    
                        this.$emit('updateUsers')
    
    
    
                    }
    
                });
    
            }
        }
        
    }
    </script>