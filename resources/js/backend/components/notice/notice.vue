<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
<div class="breadcrumbs-area">
    <h3>Notice</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Notice</li>
    </ul>
</div>
<div class="card height-auto">
    <div class="card-header text-right">
        <router-link :to="{name:'noticeCreate'}" class="btn btn-info">Create New</router-link>
    </div>
    <div class="card-body">

		<div class="db-student-list mt-5" id="search">
            <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>

                            <tr>
                                <th>ক্রমিক নং</th>
                                <th class="tablecolhide" >শিরোনাম</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(notice,index) in notices" >

                                 <td>{{ index+1 }}</td>
                                <td class="tablecolhide">{{ notice.title }}</td>
                                <td class="tablecolhide"><router-link :to="{name:'noticeEdit',params:{id:notice.id}}" class="btn btn-info btn-sm">Edit</router-link></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
		</div>
	</div>
    <div class="card-footer">
        <Pagination :total-rows="TotalRows" route-name="notice" :total-page="Totalpage"></Pagination>
    </div>
	</div>
    </div>
</template>
<script>

export default {
    created() {
    },
    data() {
        return {
            preloader: false,
            message: {},
            notices: {},

            PerPageData: '20',
            TotalRows: '1',
            Totalpage: [],
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {

                this.noticeList('page');
            },
            deep: true
        }
    },
    methods: {

        async noticeList(type=''){
            if(type=='page')this.preloader=true

            var page = 1;
            if (this.$route.query.page) page = this.$route.query.page;



            var res = await this.callApi('get',`/api/notice?page=${page}`,[]);
            this.notices = res.data.data
            this.TotalRows = `${res.data.total}`;
            this.PerPageData = `${res.data.per_page}`;
            this.Totalpage = res.data.links
            if(type=='page')this.preloader=false
        },



    },
    mounted() {

        this.noticeList();

    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
