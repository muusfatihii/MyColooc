<template>

    <tr class="font-light text-sm text-blue-700 hover:bg-opacity-100">
            <td class="px-6 py-4">
                <div class="cursor-pointer" @click="showdetails(id)">{{ title }}</div>
            </td>
            <td class="px-6 py-4">
                {{ created_at }}
            </td>
            <td class="px-6 py-4">
              <div class="flex justify-end">
                <a x-data="{ tooltip: 'Edite' }" class="cursor-pointer">
                  <svg class="w-4 h-4" fill="#00458B" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>unarchive-line</title> <path d="M29,32H7V22H5V32a2,2,0,0,0,2,2H29a2,2,0,0,0,2-2V22H29Z" class="clr-i-outline clr-i-outline-path-1"></path><path d="M14,24a1,1,0,0,0,1,1h6a1,1,0,0,0,0-2H15A1,1,0,0,0,14,24Z" class="clr-i-outline clr-i-outline-path-2"></path><path d="M15,18H6V14h9V12H5.5A1.5,1.5,0,0,0,4,13.5V20H15.78A3,3,0,0,1,15,18Z" class="clr-i-outline clr-i-outline-path-3"></path><path d="M30.5,12H21v2h9v4H21a3,3,0,0,1-.78,2H32V13.5A1.5,1.5,0,0,0,30.5,12Z" class="clr-i-outline clr-i-outline-path-4"></path><path d="M13,9.55,17,5.6V18a1,1,0,1,0,2,0V5.6l4,3.95a1,1,0,1,0,1.41-1.42L18,1.78,11.61,8.13A1,1,0,0,0,13,9.55Z" class="clr-i-outline clr-i-outline-path-5"></path> <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect> </g></svg>
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
            
            showdetails(idOffer){

                this.$emit('showdetails',{'idoffer':idOffer})

            }
            
        }
    }
    </script>