<template>

<li @click="selectPic"><img :src="'./storage/OfferPics/'+src" class="mr-1 w-10 h-10"></li>

</template>


<script>
export default{

    name: 'pic',
    props:{
        src:{
            type:String
        }
    },
    methods:{

        selectPic(){
            this.$emit('selectPic',{'picSrc':this.src})
        }

    }


}
</script>