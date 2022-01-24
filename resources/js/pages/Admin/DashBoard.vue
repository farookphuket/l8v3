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
            let url = `/api/checkuserpassport`
            axios.post(url)
                .then(res=>{
                    console.log(res.data)
                })
        },
    },
}
</script>
