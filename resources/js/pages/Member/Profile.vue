<template>
    <div>
        <div class="columns">
            <div class="column">

                <h2 class="title has-text-centered">
                    {{user.name}}'s profile</h2>
                <div class="box">
                    <ul>
                        <li v-for="ro in role">{{ro.role_name}}</li>
                        <li>{{user.email}}</li>
                        <li>
                            since 
                            <span class="tag is-info">
                                {{moment(user.created_at)}}
                            </span>

                            <span class="ml-2 tag is-info">
                                {{moment(user.created_at).fromNow()}}
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="field">
                    <h2 class="title has-text-centered has-text-danger">
                        Danger zone
                    </h2>
                    <div class="box">
                        <p class="mb-4">if you click the "delete account" 
                            all of your content that you have created on this 
                            website will be gone forever!
                        </p>
                        <span class="button is-danger is-outlined is-rounded 
                            is-block mt-4" 
                            @click.prevent="commandToDeleteAccount">
                            <font-awesome-icon icon="trash"></font-awesome-icon>
                            <span class="ml-2">Delete My Account</span>
                        </span>
                    </div>
                </div>
            </div><!-- end of user info -->



            <div class="column">
                <form action="">
                    <div class="field">
                        <label class="label" for="">name</label>
                        <div class="control">
                            <input v-model="uForm.name" class="input" 
                            type="text" ref="name">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="">email</label>
                        <div class="control">
                            <input v-model="uForm.email" class="input" 
                            type="email" ref="email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="">new password</label>
                        <div class="control">
                            <input v-model="uForm.new_pass" class="input" 
                            type="text" ref="new_pass" 
                            placeholder="~~~~">
                            <p class="help mb-2 has-text-info">
                                use the current password! leave this blank 
                            </p>
                        </div>
                    </div>
                    <div class="field is-pulled-left">
                        <div v-html="res_status"></div>
                    </div>
                    <!-- button START -->
                    <div class="field is-pulled-right">
                        <button type="submit" 
                                @click.prevent="commandToUpdateUser"
                            class="button is-primary is-outlined is-rounded">
                            <font-awesome-icon icon="check"></font-awesome-icon>
                            <span class="mr-2">Update</span>
                        </button>
                    </div>
                    <!-- button END -->
                </form>
            </div><!-- div.column show form END -->

        </div><!-- div.columns END -->

        <!-- modal confirm form START -->
        <div class="modal" 
            ref="confirmBox" 
            :class="{'is-active':isModalShow}">
            <div class="modal-background"></div>
            <div class="modal-content">
                <!-- Any other Bulma elements you want -->
                <h2 class="title has-text-centered 
                    has-text-warning">
                    Warning!
                </h2>
                <div class="box">
                    <p class="subtitle">
                        please do not refresh page.
                    </p>
                    <p class="mt-2 mb-2">
                        you have see this confirm box is because the command 
                        that you about to do now will be completely change or 
                        delete your info data so we need you to confirm.
                    </p>
                    <p class="mb-4">
                        please enter your current password then hit enter 
                        to confirm.
                    </p>

                    <p class="mt-2 mb-2">
                        กรุณาใส่รหัสผ่านของท่านเพื่อยืนยันการทำรายการ หรือกด "Cancel" 
                        เพื่อยกเลิก
                    </p>
                    <p class="mb-4">
                        กรุณาทำรายการอีกครั้ง เมื่อหน้าต่างนี้ปิดลง
                    </p>
                    <form action="" class="pb-6">
                        <div class="field">
                            <div class="control">
                                <input v-model="uForm.conf_pass" class="input" 
                                type="text" ref="conf_pass" 
                                @keydown.enter.prevent="sendConfirm">
                            </div>
                        </div>

                        <!-- show status START -->
                        <div class="field is-pulled-left pb-4">
                            <div v-html="res_status"></div>
                        </div>
                        <!-- show status end -->
                        <!-- button START -->
                        <div class="field is-pulled-right">
                            <button class="button is-rounded is-primary 
                                    is-outlined" 
                                type="submit" @click.prevent="sendConfirm">
                                <font-awesome-icon icon="check"></font-awesome-icon>
                                <span class="ml-2">Confirm</span>
                            </button>
                            <button class="button is-rounded is-danger 
                                is-outlined" @click.prevent="isModalShow = ''">
                                <font-awesome-icon icon="power-off"></font-awesome-icon>
                                <span class="ml-2">Cancel</span>
                            </button>
                        </div>
                        <!-- button END -->
                    </form>
                </div>
            </div>
            <button class="modal-close is-large" 
              @click.prevent="isModalShow = ''"  aria-label="close"></button>
        </div>
        <!-- modal confirm form END -->
    </div>
</template>
<script>
var moment = require('moment')
export default{
    name:"Profile",
    data(){
        return{
            moment:moment,
            user:'',
            role:'',
            uForm:new Form({
                name:'',
                email:'',
                new_pass:'',
                conf_pass:''
            }),
            res_status:'',
            isModalShow:'',
            isConfirmed:false,
        }
    },
    mounted(){
        this.getUser()
        this.$cookies.remove("userHasConfirmHisPassword")
    },
    methods:{
        getUser(){
            this.res_status = ''
            this.uForm.reset()
            let url = `/api/member/profile/${window.user_id}`
            axios.get(url)
                .then(res=>{
                    let rData = res.data.user
                    this.user = rData
                    this.role = rData.role

                    // show user data in form
                    this.uForm.name = rData.name
                    this.uForm.email = rData.email
                })
        },
        saveUser(){
            //alert(`this will save user`)
            
            let url = `/api/member/profile/${window.user_id}`
            let uData = new FormData()
            uData.append("name",this.uForm.name)
            uData.append("email",this.uForm.email)
            uData.append("conf_pass",this.uForm.conf_pass)
            uData.append("new_pass",this.uForm.new_pass)
            uData.append("_method","PUT")

            axios.post(url,uData)
                .then(res=>{
                    this.res_status = res.data.msg
                })
                .catch(err=>{
                    this.res_status = `<span class="tag is-medium is-danger">
                        ${Object.values(err.response.data.errors).join()}
                    </span>`
                })

            setTimeout(()=>{
                this.getUser()
            },3200)
        },
        delUser(){
            alert(`this will delete account`)
        },
        commandToUpdateUser(){
            if(this.$cookies.get("userHasConfirmHisPassword") == false 
                || this.isConfirmed == false){
                this.showConfirmBox()
            }else{
                this.saveUser()
            }
        },
        commandToDeleteAccount(){
            if(this.$cookies.get("userHasConfirmHisPassword") == false 
                || this.isConfirmed == false){
                this.showConfirmBox()
            }else{
                this.delUser()
            }
        },
        showConfirmBox(){
            this.res_status = ''
            this.isModalShow = 'is-active'
            setTimeout(()=>{
                this.$refs.conf_pass.focus()
            },1000)
        },
        sendConfirm(){
            this.isConfirmed = false
            let url = `/api/member/confirm-password`
            let confData = new FormData()
            confData.append("conf_pass",this.uForm.conf_pass)
            axios.post(url,confData)
                .then(res=>{
                    this.res_status = res.data.msg
                    this.isConfirmed = res.data.confirmed

                    if(this.isConfirmed == true){
                        this.$cookies.set("userHasConfirmHisPassword",true)
                        setTimeout(()=>{
                            this.isModalShow = ''
                            this.res_status = ''
                        },3200)
                    }else{
                        setTimeout(()=>{
                            this.showConfirmBox()
                        },3200)
                    }

                })
                .catch(err=>{
                    this.res_status = `<span class="tag is-danger is-medium">
                        ${Object.values(err.response.data.errors).join()}
                        </span>`
                    this.isConfirmed = false
                    this.$cookies.remove("userHasConfirmHisPassword")
                    setTimeout(()=>{
                        this.showConfirmBox()
                    },3200)
                })
            return this.isConfirmed
        },
    },
}
</script>
