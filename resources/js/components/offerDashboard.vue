<template>

    <tr class="font-light text-sm text-blue-700 hover:bg-opacity-100">
            <td class="px-6 py-4">
                <div>{{ title }}</div>
            </td>
            <td class="px-6 py-4">
                {{ created_at }}
            </td>
            <td class="px-6 py-4">
              <div class="flex justify-end">
                <a x-data="{ tooltip: 'Edite' }" @click="unarchive(id)">
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
                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                    />
                  </svg>
                </a>
              </div>
            </td>
    </tr>
    
    </template>
    
    <script>
    export default{
        name:'offerDashboard',
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
        methods:{
            
            unarchive(idOffer){
    
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
    
                url: "http://localhost:8000/api/offer/unarchive",
                type: "POST",
                context: this,
                data: {idoffer:idOffer},
                success:function(){

                    this.$emit('updateOffers')
    
                }
    
            });
    
    
            }
            
        }
    }
    </script>