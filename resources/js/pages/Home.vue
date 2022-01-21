<template>
    <div>
        <h2>this is Home.vue</h2>
        <div class="columns">
            <div class="column">
                <div class="field is-pulled-right">
                    <button class="button is-primary is-rounded is-outlined">
                        <font-awesome-icon icon="lock"></font-awesome-icon>
                    </button>
                </div>
            </div>
        </div>
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
        console.log(this.$cookies.keys())
    },
}
</script>
