<template>
    <div>
        <h2>Logout page</h2>
    </div>
</template>
<script>
export default{
    name:"LogoutPage",
    data(){
        return{
            user:''
        }
    },
    mounted(){
        this.checkUserPassport()
    },
    methods:{
        checkUserPassport(){
            let url = `/api/checkuserpassport`
            axios.post(url)
                .then(res=>{
            //        console.log(res.data)
                    setTimeout(()=>{
                        this.logout()
                    },2300)
                })
        },
        logout(){
            let url = `/api/member/logout`
            axios.delete(url)
                .then(res=>{
                    let r_url = res.data.url
                    location.href = r_url
            })
        },
    },
}
</script>
