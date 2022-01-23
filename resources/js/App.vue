<template>
    <div>
        <pub-nav></pub-nav>
        <div class="body-content">
            <router-view></router-view>
        </div>
    </div>
</template>


<script>
import PubNav from './pages/_include/pub_nav.vue'
export default{
    name:"App",
    components:{
        PubNav,
    },
}
</script>
