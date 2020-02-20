<template>
    <h1>{{welcome}}</h1>
</template>

<script>
    export default {
        name:'home-app',
        computed:{
            welcome(){
                return this.$store.getters.welcome
            }
        }

    }
</script>
