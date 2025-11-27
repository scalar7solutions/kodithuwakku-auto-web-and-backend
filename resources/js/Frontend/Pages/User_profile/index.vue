<template>
<AppLayout>

    <UserLayout />
    <!-- <Profile/>
    <ManagePassword/>
    <Orders/>
    <Affiliate/> -->


</AppLayout>
</template>

<script>
import AppLayout from '@@/Layouts/AppLayout.vue';
import UserLayout from './Partials/UserLayout.vue';
import Profile from './Modals/Profile.vue';
import ManagePassword from './Modals/ManagePassword.vue';
import Orders from './Modals/Orders.vue';
import Affiliate from './Modals/Affiliate.vue';


export default {
    components:{
        UserLayout,
        AppLayout,
        Profile,
        ManagePassword,
        Orders,
        Affiliate

    }
   
}
</script>

<style>

</style>