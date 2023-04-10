<template>
    <tr class="font-light text-sm text-blue-700 hover:bg-opacity-100">
            <td class="px-6 py-4">
                <div>{{username}}</div>
            </td>
            <td class="px-6 py-4">
                {{name}}
            </td>
            <td class="px-6 py-4">
                <div>{{email}}</div>
            </td>
    </tr>
</template>
<script>

export default{
    name: 'selectedUser',
    props:{
        username:{
            type:String
        },
        name:{
            type:String
        },
        email:{
            type:String
        }
    }
}
</script>