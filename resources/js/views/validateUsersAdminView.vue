<template>
    <div class="w-full overflow-x-scroll border border-cyan-50 shadow-md">
      <table class="w-full border-collapse bg-cyan-50 bg-opacity-25 text-left">
        <thead>
          <tr>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Nom</th>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Inscrit le</th>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Offres</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-blue-700 border-opacity-20">
            <userToValidate @updateUsers="updateUsers" v-for="annonceur in annonceurs" :name="annonceur.name" :id="annonceur.id" :created_at="annonceur.created_at" />
        </tbody>
      </table>
    </div>
    
</template>

<script>

import userToValidate from '../components/userToValidate.vue'

export default {

    name:'validateUsersAdminView',
    components:{
        userToValidate
    },
    data (){

        return{
            annonceurs: []
        }

    },
    created(){
        axios
          .get('http://localhost:8000/api/tovalidate',
          {
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                }
          })
          .then(response => this.annonceurs = response.data)
    
    },
    methods:{

        updateUsers(){


            axios
          .get('http://localhost:8000/api/tovalidate',
          {
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                }
          })
          .then(response => this.annonceurs = response.data)


        }


    }

}
</script>
