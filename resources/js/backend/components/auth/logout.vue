<template>
<div>

    <form action="/logout" name="logout" method="post">

    </form>

</div>
</template>

<script>
import axios from 'axios';

export default {

	created(){
        User.loggedOut();
        Notification.customSuccess('Logout successfully Complete');
axios.post('/logout').then(()=>{
    if(this.$route.query.redirect){

        window.location.href = '/login?redirect='+this.$route.query.redirect
    }else{

        window.location.href = '/login'
    }


})
	}
}
</script>

<style lang="css" scoped>
</style>
