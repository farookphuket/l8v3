<template>
    <div>
        <div class="columns is-mobile">
            <div class="column">
                <div class="container">
                    <h2 class="title has-text-centered">
                        user info
                    </h2>
                    <div class="box">
                        <ul>
                            <li v-for="ro in role">
                                {{ro.role_name}}
                            </li>
                            <li>
                                {{user.name}}
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="column">
                <form action="">
                    <div class="field">
                        <div class="control">
                            <input v-model="uForm.name" class="input" 
                            type="text" name="" ref="name">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input v-model="uForm.email" class="input" 
                            type="text" name="">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input v-model="uForm.new_pass" class="input" 
                            type="password" name="" 
                            placeholder="~~~~">
                            <p class="help">
                                change the password here
                            </p>
                        </div>
                    </div>

                    
                    <!-- button START -->
                    <div class="field is-pulled-right">
                        <button class="button is-primary is-rounded is-outlined" 
                            @click.prevent="saveU">
                            <font-awesome-icon icon="check"></font-awesome-icon>
                        </button>
                    </div>
                    <!-- button END -->
                </form>
            </div>
        </div><!-- div.columns END -->
    </div>
</template>
<script>
export default{
    name:"MemberDashBoard",
    data(){return{
        user:'',
        role:'',
        uForm:new Form({
            name:'',
            email:'',
            new_pass:'',
            conf_pass:''
        }),
    }},
    mounted(){
        this.getUser()
    },
    methods:{
        getUser(){
            let url = `/api/member/dashboard`
            axios.get(url)
                .then(res=>{
                    let rData = res.data.user
                    this.uForm.name = rData.name
                    this.uForm.email = rData.email
                    this.role = rData.role
                    this.user = rData
                    //console.log(res.data)
                    document.title = `${rData.name}'s profile`
                })
                .catch(err=>{
                    let e_return = err.response
                    if(e_return.status == 401){
                     //   alert(`the code is ${e_return.status}`)
                        location.href='/login'
                    }
                    //console.log(err.response.status)
                })
        },
    },
}
</script>
