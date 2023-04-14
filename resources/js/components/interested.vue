<template>

    <tr :class="selected+' font-light text-sm text-blue-700 hover:bg-opacity-100'">
            <td class="px-6 py-4">
                <div>{{ username }}</div>
            </td>
            <td class="px-6 py-4">
                <div>{{ name }}</div>
            </td>
            <td class="px-6 py-4">
                <div>1</div>
            </td>
            <td class="px-6 py-4">
              <div class="flex justify-end gap-4">
                <a x-data="{ tooltip: 'Delete' }" @click="reject(idoffer,id)" class="cursor-pointer">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-4 w-4 text-red-700"
                    x-tooltip="tooltip"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                    />
                  </svg>
                </a>
                <a x-data="{ tooltip: 'Edite' }" @click="accept(idoffer,id)" class="cursor-pointer">
                  <svg class="h-4 w-4" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#00458B"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="layer1"> <path d="M 18.837891 3.2832031 L 6.8183594 15.302734 L 1.1621094 9.6464844 L 0.453125 10.353516 L 6.8183594 16.716797 L 19.546875 3.9902344 L 18.837891 3.2832031 z " style="fill:#00458B; fill-opacity:1; stroke:none; stroke-width:0px;"></path> </g> </g></svg>
                </a>
              </div>
            </td>
    </tr>
    
    </template>
<script>
export default{
    name: 'interested',
    data(){

        return {
            selected:''
        }

    },
    props:{
        username:{
            type:String
        },
        name:{
            type:String
        },
        id:{
            type:Number
        },
        idoffer:{
            type:Number
        },
        state:{
            type:Number
        }
    },
    created(){

        if(this.state==1){

            this.selected='bg-green-100'

        }else{

            this.selected=''

        }

    },
    methods:{

        accept(idoffer,id){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "http://localhost:8000/api/offer/interest/accept",
                type: "POST",
                context: this,
                data: {idoffer:idoffer,idclient:id},
                success:function(){

                    this.selected='bg-green-100'

                
                }
            });

        },
        reject(idoffer,id){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "http://localhost:8000/api/offer/interest/reject",
                type: "POST",
                context: this,
                data: {idoffer:idoffer,idclient:id},
                success:function(){

                    this.selected=''

                
                }
            });
       }

    }
}
</script>