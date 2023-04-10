<template>
    <option :value="price">{{ price }}</option>
</template>
<script>
export default{
    name: 'budget',
    props:{
        price:{
            type:Number
        }
    }
}
</script>