<template>
    <div>
        <h2>this is About.vue</h2>
        <div class="box">
            <form action="">
                <div class="field">
                    <div class="control">
                       <jodit-editor 
                           v-model="tForm" 
                           ></jodit-editor>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import {JoditEditor} from 'jodit-vue3'
export default{
    name:"About",
    data(){return{
        tForm:'uste'
    }},
}
</script>
