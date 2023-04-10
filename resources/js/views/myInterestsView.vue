<template>
    <div class="w-full overflow-x-scroll border border-cyan-50 shadow-md">
      <popup v-if="showModal">
        <table class="w-full border-collapse bg-white text-left">
        <thead>
          <tr @click="close_popup" class="cursor-pointer">X</tr>
          <tr>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Username</th>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Name</th>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">E-mail</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-blue-700 border-opacity-20">
         <selectedUser v-for="selectedUser in selectedUsers" :username="selectedUser.username" :name="selectedUser.name" :email="selectedUser.email" />
        </tbody>
        </table>
      </popup>
      <table class="w-full border-collapse bg-cyan-50 bg-opacity-25 text-left">
        <thead>
          <tr>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Titre</th>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Date</th>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Etat</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-blue-700 border-opacity-20">
          <myInterestDashboard :idclient="idUser" @showInfos="showInfos" @updateInterests="updateInterests" v-for="interest in interests" :title="interest.title" :created_at="interest.created_at" :id="interest.id" :state="interest.state" />
        </tbody>
      </table>
    </div>
    
    </template>
    
    <script>

import myInterestDashboard from '../components/myInterestDashboard.vue'
import selectedUser from '../components/selectedUser.vue'
import popup from '../components/popup.vue'


export default{
    name: 'myInterestsView',
    props:{

      idUser:{

        type:Number

      }

    },
    components:{

      myInterestDashboard,
      selectedUser,
      popup

    },
    data(){

        return {
            interests: [],
            selectedUsers: [],
            showModal: false
        }

    },
    created(){
        axios
          .get('http://localhost:8000/api/myinterests?idUser='+this.idUser,
          {
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                }
          })
          .then(response => this.interests = response.data)
    
    },
    methods:{

      updateInterests(){

        axios
          .get('http://localhost:8000/api/myinterests?idUser='+this.idUser,
          {
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                }
          })
          .then(response => this.interests = response.data)

      },
      showInfos(payload){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "http://localhost:8000/api/interest/showinfos",
            type: "POST",
            context: this,
            data: {idoffer:payload.idoffer,idclient:this.idUser},
            success:function(selectedUsers){

              this.selectedUsers = selectedUsers

              this.showModal = true
              
            }
        });

      },
      close_popup(){

        this.showModal = false

      }

    }
}
</script>