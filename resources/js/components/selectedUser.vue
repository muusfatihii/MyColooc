<template>
    <tr :class="flag+' font-light text-sm text-blue-700 hover:bg-opacity-100'">
            <td class="px-6 py-4">
                <div>{{username}}</div>
            </td>
            <td class="px-6 py-4">
                {{name}}
            </td>
            <td class="px-6 py-4">
                <div>{{phonenumber}}</div>
            </td>
    </tr>
</template>
<script>

export default{
    name: 'selectedUser',
    data(){

        return{

            flag:''

        }

    
    },
    props:{
        username:{
            type:String
        },
        name:{
            type:String
        },
        phonenumber:{
            type:String
        },
        owner:{
            type:Number
        }
    },
    created(){
        if(this.owner){

            this.flag = 'bg-cyan-100'

        }
    }
}
</script>