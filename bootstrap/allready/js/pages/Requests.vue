<template>

</template>
<script>
import axios from 'axios';

export default{
    name: 'Requests',
    methods:{
        fetchRequests()
        {
            axios.get('/requests');
        }
    },
    mounted()
    {
        this.fetchRequests();
    }
}
</script>
<style>
</style>