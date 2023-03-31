<template>
                    <table class="min-w-max w-full">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Nombre d'annonces</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <client v-for="annonceur in annonceurs" :name="annonceur.name" />
                        </tbody>
                    </table>        
</template>
<script>

import client from '../components/client.vue'

export default {

    name:'usersAdminView',
    components:{
        client
    },
    data (){

        return{
            annonceurs: []
        }

    },
    created(){
        axios
          .get('http://localhost:8000/api/annonceurs',
          {
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                }
          })
          .then(response => this.annonceurs = response.data)
    
    }

}
</script>