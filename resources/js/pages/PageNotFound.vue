<template>
    <div>
        <h2 class="title has-text-centered">Error 404</h2>
        <div class="box">
            <p>Sorry,page not found</p>
        </div>
    </div>
</template>
<script>


export default{
    name:"PageNotFound",
    mounted(){
        document.title = "Error 404 page not found"
    },
}
</script>
