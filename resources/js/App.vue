<template>
    <div class="container-fluid bg-white"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Teams List</router-link>
                    <router-link to="/historic" class="nav-item nav-link">Historical Teams Database</router-link>
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>
