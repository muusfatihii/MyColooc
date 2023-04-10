<template>

<div  class="card block rounded-lg p-4 shadow-sm shadow-indigo-100" @click="showDescription(id)">
            <img
                alt="Home"
                :src="'./storage/OfferPics/'+pic"
                class="h-56 w-72 rounded-md object-cover"
            />

            <div class="mt-2">
                <dl>
                <div>
                    <dt class="sr-only">Price</dt>

                    <dd class="text-xs font-medium">{{price}}MDH/Month</dd>
                </div>

                <div>
                    <dt class="sr-only text-blue-700">Address</dt>

                    <dd class="font-medium text-blue-700">{{ address }}</dd>
                </div>
                </dl>

                <div class="mt-6 flex items-center gap-8 text-xs">
                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg
                    class="h-4 w-4 text-blue-700"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"
                    />
                    </svg>

                    <div class="mt-1.5 sm:mt-0">
                    <p class="text-gray-500">Parking</p>

                    <p class="font-medium">2 spaces</p>
                    </div>
                </div>

                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg
                    class="h-4 w-4 text-blue-700"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
                    />
                    </svg>

                    <div class="mt-1.5 sm:mt-0">
                    <p class="text-gray-500">Bathroom</p>

                    <p class="font-medium">2 rooms</p>
                    </div>
                </div>

                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg
                    class="h-4 w-4 text-blue-700"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                    />
                    </svg>

                    <div class="mt-1.5 sm:mt-0">
                    <p class="text-gray-500">Bedroom</p>

                    <p class="font-medium">{{ nbrRooms }} rooms</p>
                    </div>
                </div>
                </div>
            </div>
        </div>

</template>

<script>
export default{
    name:'offer',
    data(){

        return{
            pic : ''
        }

    },
    props:{

        address:{
            type:String
        },
        nbrRooms:{
            type:Number
        },
        price:{
            type:Number
        },
        id:{
            type:Number,
        },
        idClient:{
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

            url: "http://localhost:8000/api/offer/pic",
            type: "POST",
            context: this,
            data: {idoffer:this.id},
            success:function(pic){

                this.pic = pic

            }

        });

    },
    methods:{

        showDescription(){
            this.$emit('showDescription',{'idOffer':this.id})
        }

    }
}
</script>