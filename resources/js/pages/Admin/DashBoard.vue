<template>
    <div>
        <h2>admin dashboard</h2>
    </div>
</template>
<script>
export default{
    name:"AdminDashBoard",
    mounted(){
        this.checkUserPassport()
    },
    methods:{
        checkUserPassport(){
            let u_pass = null
            let url = `/api/checkuserpassport`
            axios.post(url)
                .then(res=>{
                    u_pass = res.data.user         
                    //console.log(u_pass)
                    if(u_pass == null){
                        location.href = '/login'
                    }
                    if(u_pass.is_admin == 0){
                        location.href='/member'
                    }
                })
        },
    },
}
</script>
