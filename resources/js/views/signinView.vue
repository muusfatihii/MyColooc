<template>

    <div class="h-screen md:flex text-blue-600">
        <div
		class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-blue-700 i justify-around items-center hidden">
		<div>
			<h1 class="text-white font-bold text-4xl font-sans">My<span class="text-cyan-400">Coloc</span></h1>
			<p class="text-white mt-1">La meilleure platforme pour une meilleure colocation</p>
		</div>
		<div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
	</div>
        <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
            <form class="bg-white">
                        <div class="flex items-center border-2 px-3 rounded-md mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            <input class="pl-2 outline-none border-none" type="text" name="email" id="email" placeholder="Email Address" v-model="email"/>
          </div>
                            <div class="flex items-center border-2 px-3 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input class="pl-2 outline-none border-none" type="text" name="password" id="password" placeholder="Password" v-model="password"/>
          </div>
                                <button type="button" v-on:click="login();" class="block w-full bg-blue-700 mt-4 py-2 rounded-md text-white font-semibold mb-2">Login</button>
                                <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Forgot Password ?</span>
            </form>
        </div>
    </div>
        
    </template>


<script setup>

import router from '../router'

import { useAuthStore } from '../stores/auth'

const authStore = useAuthStore()




window.onload = function() {


   
}

function login(){

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if(email!=''&&password!=''){

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({

        url: "http://localhost:8000/api/auth/login",
        type: "POST",
        context: this,
        data: {email:email,password:password},
        success:function(user){

                if(user==0){

                    router.push('register')
                    
                }else{

                    

                    authStore.isAuthenticated = true

                    authStore.iduser = user.id

                    authStore.name = user.name
                    authStore.solde = user.solde

                    if(user.isAdmin==0){

                        authStore.isadmin = false

                        router.push('dashboardAnnonceur')

                    }else{

                        authStore.isadmin = true

                        router.push('dashboardadmin')

                    }
                    
                   

                    

                }


        }

    });

    }else{

        swal("Message",'Champs requis vide!!','error',{
                button:true,
                button:"OK",
              });

    }

}










</script>
    

