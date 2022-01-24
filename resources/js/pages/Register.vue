<template>
    <div>
        <div class="columns">
            <div class="column">
                
                <div class="box">
                    <h2 class="title has-text-centered">
                        No register require here
                    </h2>
                    <div class="content">
                        <p>
                            if you just need to read there is no register 
                            require.
                        </p>
                    </div>
                </div>

            </div>

            <!-- register form START -->
            <div class="column">
                <form action="">

                    <div class="field">
                        <div class="control">
                            <input ref="name" class="input" type="text" 
                            v-model="rForm.name" 
                            placeholder="your name...">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input  class="input" type="email" 
                            v-model="rForm.email" 
                            placeholder="your email...">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input  class="input" type="password" 
                            v-model="rForm.password" 
                            placeholder="~~~~">
                        </div>
                    </div>

                    <!-- respons status START -->
                    <div class="field is-pulled-left">
                        <div v-html="res_status"></div>
                    </div>
                    <!-- respons status END -->
                    <!-- button START -->
                    <div class="field is-pulled-right">
                        <button class="button is-primary is-rounded is-small" 
                            type="submit" 
                            @click.prevent="regis">
                            <font-awesome-icon icon="check"></font-awesome-icon>
                        </button>
                    </div>
                    <!-- button END -->
                </form>
            </div>
            <!-- register form END -->
        </div><!-- end of div.columns wrapper -->

        <!-- modal START -->
        <div class="modal" :class="{'is-active':isModalShow}">
          <div class="modal-background"></div>
          <div class="modal-content">
            <!-- Any other Bulma elements you want -->
            <div class="box">
                <p v-html="res_status">

                </p>
            </div>
          </div>
          <button class="modal-close is-large" 
              @click.prevent="isModalShow = ''" aria-label="close"></button>
        </div>
        <!-- modal END -->
    </div>
</template>
<script>
export default{
    name:"Register",
    data(){return{
        res_status:'',
        isModalShow:'',
        rForm:{
            name:'',
            email:'',
            password:'',
        },
    }},
    methods:{
        regis(){
            this.res_status = 'loading...'
            let fData = new FormData()
            fData.append("name",this.rForm.name)
            fData.append("email",this.rForm.email)
            fData.append("password",this.rForm.password)

            let url = `/api/register`
            axios.post(url,fData)
                .then(res=>{
                    this.isModalShow = 'is-active'
                    this.res_status = res.data.msg

                    setTimeout(()=>{
                        this.getReset()
                    },5200)
                })
                .catch(err=>{
                    this.res_status = `<span class="tag is-medium is-danger">
                        ${Object.values(err.response.data.errors).join()}
                    </span>`
                })

        },
        getReset(){
            this.res_status = ''
            this.isModalShow = ''

            // code from https://stackoverflow.com/questions/41518609/clearing-input-in-vuejs-form
            // on 23 Jan 2022
            Object.keys(this.rForm).forEach((key,index)=>{
                this.rForm[key] = ''
            })
        },
    },
}
</script>
