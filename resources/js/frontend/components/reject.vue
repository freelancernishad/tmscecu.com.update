<template>
    <div>

<!-- <div class="row"> -->
<!-- <div class="mainBody col-md-9 mt-3"> -->

        <div class="card">
            <div class="card-body">
                <h3 class="text-center">{{ row.applicant_name }} এর সনদ বাতিল হওয়ার কারন</h3>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <p>{{ reasons.reson }}</p>
            </div>
        </div>

    <!-- </div> -->
<!-- <side-bar></side-bar> -->

    <!-- </div> -->
    </div>
</template>
<script>

export default {
    created() {

    },

    data() {
        return {
             row:{},
             reasons:{},
        };
    },
    mounted() {
         this.sonodVerifiy()
    },
    methods: {
       async sonodVerifiy(){
             var id =  this.$route.params.id;
            var res = await this.callApi('get',`/api/sonod/single/${id}`,[])
            var reason = await this.callApi('get',`/api/reject/${id}`,[])

            this.row = res.data
            this.reasons = reason.data
        }

    },
};
</script>
<style lang="css" scoped>
a.prev {
    display: none !important;
}
a.next {
    display: none !important;
}
</style>
