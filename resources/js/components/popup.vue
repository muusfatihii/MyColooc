<template>

    <div class="popup">
            <slot />
    </div>

</template>

<script>

export default{

    name:'popup',
    methods:{

        togglepopup(){
            this.$emit('togglepopup')
        }

    }
}
</script>

<style scoped>


.popup{

    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 1000;
    background-color: rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>