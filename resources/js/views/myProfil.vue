<template>
      <div class="my-10 mx-auto container max-w-2xl md:w-3/4 shadow-md">
        <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounded-t">
          <div class="max-w-sm mx-auto md:w-full md:mx-0">
            <div class="inline-flex items-center space-x-4">
              <img
                class="w-10 h-10 object-cover rounded-full"
                alt="User avatar"
                src="https://avatars3.githubusercontent.com/u/72724639?s=400&u=964a4803693899ad66a9229db55953a3dbaad5c6&v=4"
              />

              <h1 class="text-blue-600">{{ myProfil.username }}</h1>
            </div>
          </div>
        </div>
        <div class="bg-white space-y-6">
          <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-blue-500 items-center">
            <h2 class="md:w-1/3 max-w-sm mx-auto">Compte</h2>
            <div class="md:w-2/3 max-w-sm mx-auto">
              <label class="text-sm text-blue-400">Email</label>
              <div class="w-full inline-flex border">
                <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                  <svg
                    fill="none"
                    class="w-6 text-blue-400 mx-auto"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                    />
                  </svg>
                </div>
                <input
                  type="email"
                  v-model="myProfil.email"
                  class="w-11/12 focus:outline-none focus:text-blue-600 p-2"
                  placeholder="email"
                  disabled
                />
              </div>
            </div>
          </div>

          <hr />
          <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-blue-500 items-center">
            <h2 class="md:w-1/3 mx-auto max-w-sm">Infos personnelles</h2>
            <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
              <div>
                <label class="text-sm text-blue-400">Full name</label>
                <div class="w-full inline-flex border">
                  <div class="w-1/12 pt-2 bg-gray-100">
                    <svg
                      fill="none"
                      class="w-6 text-blue-400 mx-auto"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                      />
                    </svg>
                  </div>
                  <input
                    type="text"
                    v-model="myProfil.name"
                    class="w-11/12 focus:outline-none focus:text-blue-600 p-2"
                    placeholder="Full name"
                  />
                </div>
              </div>
              <div>
                <label class="text-sm text-blue-400">Phone number</label>
                <div class="w-full inline-flex border">
                  <div class="pt-2 w-1/12 bg-gray-100">
                    <svg
                      fill="none"
                      class="w-6 text-blue-400 mx-auto"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                      />
                    </svg>
                  </div>
                  <input
                    type="tel"
                    v-model="myProfil.phonenumber"
                    class="w-11/12 focus:outline-none focus:text-blue-600 p-2"
                    placeholder="0600000000"
                  />
                </div>
              </div>
              <div>
                <label class="text-sm text-blue-400">Solde</label>
                <div class="w-full inline-flex border">
                  <div class="pt-2 w-1/12 bg-gray-100">
                    <svg
                      fill="none"
                      class="w-6 text-blue-400 mx-auto"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                      />
                    </svg>
                  </div>
                  <input
                    type="number"
                    disabled
                    v-model="myProfil.solde"
                    class="w-11/12 focus:outline-none focus:text-blue-600 p-2"
                    placeholder="0"
                  />
                </div>
              </div>
            </div>
          </div>

          <hr />
          <div class="md:inline-flex w-full space-y-4 md:space-y-0 p-8 text-blue-500 items-center">
            <h2 class="md:w-4/12 max-w-sm mx-auto">Changez le mot de passe</h2>

            <div class="md:w-5/12 w-full md:pl-9 max-w-sm mx-auto space-y-5 md:inline-flex pl-2">
              <div class="w-full inline-flex border-b">
                <div class="w-1/12 pt-2">
                  <svg
                    fill="none"
                    class="w-6 text-blue-400 mx-auto"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                    />
                  </svg>
                </div>
                <input
                  v-model="newPSW"
                  type="password"
                  class="w-11/12 focus:outline-none focus:text-blue-600 p-2 ml-4"
                  placeholder="New"
                />
              </div>
            </div>

            <div class="md:w-3/12 text-center md:pl-6">
              <button @click="updateProfil" class="text-white w-full mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-right">
                <svg
                  fill="none"
                  class="w-4 text-white mr-2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                  />
                </svg>
                Update
              </button>
            </div>
          </div>

          <hr v-if="!myProfil.validated" />
          <div v-if="!myProfil.validated" class="w-full p-4 text-right text-blue-500">
            <button @click="askAccountValidation" class="inline-flex items-center focus:outline-none mr-4">
              Demander la validation de compte
            </button>
          </div>
        </div>
      </div>
</template>

<script>

export default{

    name:'myProfil',
    data(){

        return {

            myProfil: {},
            newPSW: ''

        }

    },
    props:{
        idUser:{
            type:Number
        }
    },
    created(){

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({

          url: "http://localhost:8000/api/client/profil",
          type: "POST",
          context: this,
          data: {idclient:this.idUser},
          success:function(myProfil){

              this.myProfil = myProfil


          }

      });

    },
    methods:{

        updateProfil(){


            if(this.newPSW!=''){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({

                        url: "http://localhost:8000/api/client/profil/update",
                        type: "POST",
                        context: this,
                        data: {idclient:this.idUser,newpsw:this.newPSW,phonenumber:this.myProfil.phonenumber,name:this.myProfil.name},
                        success:function(){


                          swal("Message",'Votre Profile à été modifié','success',{
                            button:true,
                            button:"OK",
                          });



                        }

                    });



            }else{

                alert('Champs vide')
            }



        },
        askAccountValidation(){

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
         });

        $.ajax({

            url: "http://localhost:8000/api/client/profil/tovalidate",
            type: "POST",
            context: this,
            data: {idclient:this.idUser},
            success:function(data){


              switch(data){

                    case '-1':
                      swal("Message",'Votre solde ne suffit pas','success',{
                        button:true,
                        button:"OK",
                      });
                      break
                    case '0':
                      swal("Message",'Demande déjà envoyée','success',{
                        button:true,
                        button:"OK",
                      });
                      break
                    case '1':
                      swal("Message",'Demande envoyée','success',{
                        button:true,
                        button:"OK",
                      });
                    default:
                      break

              }


                

            }

        });

        }

    }
    
}


</script>