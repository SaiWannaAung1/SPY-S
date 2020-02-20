<template>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link class="navbar-brand" to="/vuehome">Navbar</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <router-link class="nav-item nav-link active" to="/vuehome">Home <span class="sr-only">(current)</span></router-link>
                <router-link class="nav-item nav-link" to="/vueabout">About</router-link>
                <router-link class="nav-item nav-link" to="/vuecontact">Contact</router-link>
            </div>
        </div>
    </nav>
</div>
</template>

<script>
    export default {
        name: "Header"
    }
</script>

<style scoped>

</style>
