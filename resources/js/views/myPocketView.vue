<template>
<section class="antialiased bg-white text-blue-700 min-h-screen w-screen p-4">
    <div class="h-full">
            <div class="relative px-4 sm:px-6 lg:px-8 py-8 max-w-lg mx-auto bg-cyan-50">
                <div class="bg-white px-8 py-6 rounded-b shadow-lg">
                    
                    <!-- Card form -->
                    <div>
                        <div class="space-y-4">
                            <!-- Card Number -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="card-nr">Card Number <span class="text-red-500">*</span></label>
                                <input id="card-nr" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="1234 1234 1234 1234" />
                            </div>
                            <!-- Expiry and CVC -->
                            <div class="flex space-x-4">
                                <div class="flex-1">
                                    <label class="block text-sm font-medium mb-1" for="card-expiry">Expiry Date <span class="text-red-500">*</span></label>
                                    <input id="card-expiry" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="MM/YY" />
                                </div>
                                <div class="flex-1">
                                    <label class="block text-sm font-medium mb-1" for="card-cvc">CVC <span class="text-red-500">*</span></label>
                                    <input id="card-cvc" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="CVC" />
                                </div>
                            </div>
                            <!-- Name on Card -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="card-name">Name on Card <span class="text-red-500">*</span></label>
                                <input id="card-name" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="John Doe" />
                            </div>
                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="card-email">Email <span class="text-red-500">*</span></label>
                                <input id="card-email" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="email" placeholder="john@company.com" />
                            </div>

                            <!-- Montant -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="card-email">Montant <span class="text-red-500">*</span></label>
                                <input id="montant" name="montant" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="number" placeholder="10.00" />
                            </div>
                        </div>
                        <!-- Form footer -->
                        <div class="mt-6">
                            <div class="mb-4">
                                <button @click="pay" class="font-medium text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out w-full bg-blue-700 hover:bg-blue-800 text-white focus:outline-none focus-visible:ring-2">Pay</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>
</section>
</template>

<script setup>

import { useAuthStore } from '../stores/auth'

var authStore = useAuthStore()

function pay(){

  const montant = document.getElementById('montant').value

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
    url: "http://localhost:8000/api/client/pocket",
    type: "POST",
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    data: {montant:montant,idclient:authStore.iduser},
    context:this,
    success:function(data){

        swal("Message",'Opération réussie','success',{
                button:true,
                button:"OK",
              });
        
    }
});


}

</script>