<template>

<li class="flex items-center">
                <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                  <img src="https://randomuser.me/api/portraits/men/82.jpg" alt="Annette Watson profile picture">
                </div>
                <span class="text-blue-600">{{ name }}</span>
                <span class="ml-auto font-semibold">{{ nbrAnnonces }}</span>
</li>

</template>

<script>
export default{
    name:'bestAnnonceur',
    props:{
        name:{
            type:String
        },
        nbrAnnonces:{

            type:Number

        }

    }
}
</script>