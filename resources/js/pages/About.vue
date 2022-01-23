<template>
    <div>
        <div class="columns">
            <div class="column is-3">
            <h2>this is About.vue</h2>
            <div class="video-container">
<iframe width="576" height="315" src="https://www.youtube.com/embed/0ohtVzCSHqs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            </div>
            <div class="column is-9">
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
        </div>


            <h2 class="has-text-centered title">this is another video</h2>
            <div class="video-container">
                <iframe width="560" height="315" 
                    src="https://www.youtube.com/embed/VQraviuwbzU" 
                    title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; 
                    encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
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
