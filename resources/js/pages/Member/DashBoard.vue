<template>
    <div>
        <h2>member dashboard</h2>
    </div>
</template>
<script>
export default{
    name:"MemberDashBoard",
    data(){return{
        user:''
    }},
    mounted(){
        this.getUser()
        this.user = this.$cookies.get("token")
    },
    methods:{
        getUser(){
            let url = `/api/member/dashboard`
            axios.get(url)
                .then(res=>{
                    console.log(res.data)
                })
        },
    },
}
</script>
