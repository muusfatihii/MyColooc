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
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
						clip-rule="evenodd" />
				</svg>
				<input class="pl-2 outline-none border-none" type="text" name="name" id="" placeholder="Votre nom" v-model="name"/>
      </div>
				<div class="flex items-center border-2 px-3  rounded-md mb-4">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
						viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
					</svg>
					<input class="pl-2 outline-none border-none" type="text" name="username" id="" placeholder="Username" v-model="username"/>
      </div>
					<div class="flex items-center border-2 px-3  rounded-md mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
						</svg>
						<input class="pl-2 outline-none border-none" type="text" name="email" id="" placeholder="Email Address" v-model="email"/>
      </div>

	  <div class="flex items-center border-2 px-3  rounded-md mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
						</svg>
						<input class="pl-2 outline-none border-none" type="tel" name="phonenumber" id="" placeholder="Phone Number" v-model="phonenumber"/>
      </div>
						<div class="flex items-center border-2 px-3  rounded-md">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" viewBox="0 0 20 20"
								fill="currentColor">
								<path fill-rule="evenodd"
									d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
									clip-rule="evenodd" />
							</svg>
							<input class="pl-2 outline-none border-none" type="text" name="password" id="" placeholder="Password" v-model="password"/>
      </div>
							<button type="button" v-on:click="register" class="block w-full bg-blue-700 mt-4 py-2  rounded-md text-white font-semibold mb-2">Login</button>
		</form>
	</div>
</div>
    
</template>
<script>

import router from '../router'
import { useCounterStore } from '../stores/counter';

export default {
      name: 'registerView',
	  data(){
		return{

			name:'',
			username:'',
			email:'',
			phonenumber:'',
			password:''

		}
	  },
	  methods:{

		register(){


			// const store = useCounterStore()

			// alert(store.count)

			if(this.name!=''&&this.username!=''&&
			this.email!=''&&this.password!=''&&this.phonenumber!=''){

				$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

				$.ajax({

					url: "http://localhost:8000/api/auth",
					type: "POST",
					context: this,
					data: {name:this.name,username:this.username,email:this.email,phonenumber:this.phonenumber,password:this.password},
					success:function(iduser){

							if(iduser>0){

								this.$router.push('home');
								
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

	  }
}
</script>