<template>
    <div>
        <div class="navbar-nav">
                    <router-link to="/" 
                        class="nav-item nav-link">Home</router-link>
                    <router-link to="/about" 
                        class="nav-item nav-link">About</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>
<script>
export default{
    name:"App",
}
</script>
