<template>
    <main class="profile-page">
      <section class="relative block h-52">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
                background-image: url('pics/h1.jpg');
              ">
          <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
      </section>
      <section>
        
        <div class="w-full py-10 md:p-10">
            <div class="flex md:flex-col w-full">

                <div class="flex flex-col md:flex-row md:space-x-1">
                    <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer">Détails</div>
                    <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer border-2 border-b-blue-700">Conditions</div>
                    <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer border-2 border-b-blue-700">Conditions</div>
                </div>

                <div class="py-10 md:p-10 bg-cyan-50 flex flex-col justify-between md:flex-row">

                    <div class="md:w-1/2">
                        <div class="mx-auto w-96">
                        <img src="pics/h2.jpg" class="w-96 h-96">
                        <div>
                            <ul class="flex">
                                <li><img src="pics/h2.jpg" class="w-10 h-10"></li>
                                <li><img src="pics/h2.jpg" class="w-10 h-10"></li>
                                <li><img src="pics/h2.jpg" class="w-10 h-10"></li>
                                <li><img src="pics/h2.jpg" class="w-10 h-10"></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="md:w-1/2 flex flex-col">
                        <h2 class="text-blue-700 text-3xl py-5 text-center">Description</h2>
                        
                        <ul style="color: #616571;" class="px-5 space-y-2">
                            <li>Loyer :  Entre XX et YY $ </li>
                            <li>Rooms  :  3</li>
                            <li>Cuisine : 2</li>
                            <li>Toilet : 2</li>
                        </ul>

                        <h3 class="text-blue-700 text-xl py-5 px-5">Conditions : </h3>

                        <div class="grid grid-cols-2 px-5" style="color: #92570C;">
                            <h4>Max : 4 personnes.</h4>
                            <h4>Max : 4 personnes.</h4>
                            <h4>Max : 4 personnes.</h4>
                            <h4>Max : 4 personnes.</h4>
                            <h4>Max : 4 personnes.</h4>
                            <h4>Max : 4 personnes.</h4>

                        </div>

                        <button style="background-color: #92570C;" class="text-white py-2 px-5 mt-10 mx-auto">Montre votre interet</button>

                    </div>

                </div>

            </div>
        </div>
        
      </section>
    </main>
    
        
</template>
    
    
<script>
export default{
    name: 'offerDescriptionView'
}
</script>