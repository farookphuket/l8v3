<template>
    <div style="margin-top:75px;" 
        class="">
        <p>now is {{moment("2003-10-10 14:23:23")}} is 
            {{moment("2003-10-10 14:23:23").fromNow()}}</p>
    </div>
</template>
<script>
var moment = require('moment')
export default{
    name:"Home",
    data(){return{
        ck1:'',
        moment:moment,
    }},
    mounted(){
       // console.log(this.$cookies.keys())
    },
}
</script>
