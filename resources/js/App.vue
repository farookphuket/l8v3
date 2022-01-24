<template>
    <div>
        <pub-nav v-show="!isLoginUser"></pub-nav>
        <admin-nav v-show="isAdminUser"></admin-nav>
        <member-nav v-show="isMemberUser"></member-nav>
        <div class="body-content">
            <router-view></router-view>
        </div>

        <div class="stick_bottom">
            <ul>
                <li>
                    stack 1
                </li>

                <li>
                    stack 2
                </li>
            </ul>
        </div>
    </div>
</template>


<script>
import PubNav from './pages/_include/pub_nav.vue'
import AdminNav from './pages/_include/admin_nav.vue'
import MemberNav from './pages/_include/member_nav.vue'
export default{
    name:"App",
    components:{
        PubNav,
        AdminNav,
        MemberNav,
    },
    data(){return{
        tk:'',
        isLoginUser:false,
        isAdminUser:false,
        isMemberUser:false,
    }},
    mounted(){
        this.checkUserPassport()

    },
    methods:{
        checkUserPassport(){
            this.tk = null
            this.isLoginUser = false
            this.isMemberUser = false
            this.isAdminUser = false
            let url = `/api/checkuserpassport`
            axios.post(url)
                .then(res=>{
                    let u_data = res.data.user
                    if(u_data != null){
                        this.isLoginUser = true
                        this.isMemberUser = true
                        if(u_data.is_admin != 0){
                            this.isAdminUser = true
                            this.isMemberUser = false
                        }
                    }
                 //   console.log(u_data)
                })
        }
    },
}
</script>
