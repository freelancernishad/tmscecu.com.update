<template>




    <div class="col-lg-3 my-3">


        <!-- Notice and Facebook  -->
        <section class="">
            <div class="row">

                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="pb-2">
                        <div class="section_title">
                            <h4 class="bg-primary p-2 mb-0 text-light">প্রধান শিক্ষক</h4>
                        </div>
                        <div class="py-2 text-center">

                      <img :src="$asseturl+schoolSettings.PRINCIPALS_IMGAGE" alt="">
<br>
                      <h3 class="mt-3">{{ schoolSettings.Principals_name }}</h3>
                      <h3>প্রধান শিক্ষক</h3>
                      <h3>{{ schoolSettings.SCHOLL_NAME }}</h3>


                        </div>
                    </div>
                </div>



                <!-- Notice Board -->
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="pb-2">
                        <div class="section_title">
                            <h4 class="bg-primary p-2 mb-0 text-light">নোটিশ বোর্ড</h4>
                        </div>
                        <div class="custom_bg py-2">
                            <ul style="padding-left:0">

                                <li class="ps-3 pb-3" v-for="notice in notices"><router-link class="text-black" style="color: #160089;"  :to="{name:'noticesingle',params:{id:notice.id,title:notice.title}}"> <i class="fas fa-angle-double-right"></i> {{ notice.title.slice(0, 30)+'...' }}</router-link></li>

                            </ul>
                            <router-link style="    padding: 2px 9px;float: right;background: #545454;margin-bottom: 8px;color: white;border-radius: 3px;" :to="{name:'frontnotice'}">সকল নোটিশ দেখুন</router-link>
                        </div>
                    </div>
                </div>

                <!-- Facebook Page -->
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="pb-2">
                        <div class="section_title">
                            <h4 class="bg-primary p-2 mb-0 text-light">আমাদের ফেসবুক পেজ</h4>
                        </div>
                        <div class="py-2 text-center">

                            <div class="fb-page"
                            :data-href="schoolSettings.facebook_page"
                            data-width="380"
                            data-hide-cover="false"
                            data-show-facepile="true"></div>



                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Link Section -->
        <section class="">
            <div class="row">
                <!-- Official Link -->
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="pb-2">
                        <div class="section_title">
                            <h4 class="bg-primary p-2 mb-0 text-light">অফিসিয়াল লিঙ্ক</h4>
                        </div>
                        <div class="custom_bg py-2">
                            <ul class="list-unstyled" style="padding-left:0">
                                <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="http://www.moedu.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> শিক্ষা মন্ত্রণালয়</a></li>

                                <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="http://www.dshe.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> মাধ্যমিক ও উচ্চ শিক্ষা অধিদপ্তর</a></li>

                                <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="https://dhakaeducationboard.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> ঢাকা শিক্ষাবোর্ড</a></li>


                                <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="http://www.dinajpureducationboard.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> দিনাজপুর শিক্ষাবোর্ড</a></li>


                                <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="https://dinajpurboard.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> শিক্ষাবোর্ড,দিনাজপুর</a></li>


                                <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="http://www.educationboardresults.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> বোর্ড রেজাল্ট</a></li>


                                <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="http://www.banbeis.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> ব্যানবেইজ</a></li>
                                <!-- <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="http://www.nctb.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> এনসিটিবি</a></li> -->


                                <!-- <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="https://www.teachers.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> শিক্ষক বাতায়ন</a></li> -->

                                <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="http://www.panchagarh.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> পঞ্চগড় জেলা</a></li>

                                <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="http://debiganj.panchagarh.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> দেবীগঞ্জ উপজেলা</a></li>

                                <li class="ps-3 pb-1"><a class="text-black" style="color: #160089;"  href="https://tepriganj.uniontax.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> টেপ্রীগঞ্জ ইউনিয়ন</a></li>


                            </ul>


                        </div>
                    </div>
                </div>

                <!-- Importent Link -->
                <!-- <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="pb-2">
                        <div class="section_title">
                            <h4 class="bg-primary p-2 mb-0 text-light">গুরুত্বপূর্ণ লিঙ্ক</h4>
                        </div>
                        <div class="custom_bg py-2">
                            <p class="ps-3"> <i class="fas fa-angle-double-right"></i> এইখানে লিঙ্ক থাকবে</p>
                            <p class="ps-3"> <i class="fas fa-angle-double-right"></i> এইখানে লিঙ্ক থাকবে</p>
                            <p class="ps-3"> <i class="fas fa-angle-double-right"></i> এইখানে লিঙ্ক থাকবে</p>
                            <p class="ps-3"> <i class="fas fa-angle-double-right"></i> এইখানে লিঙ্ক থাকবে</p>
                            <p class="ps-3"> <i class="fas fa-angle-double-right"></i> এইখানে লিঙ্ক থাকবে</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
<!-- <div id="fb-customer-chat" class="fb-customerchat" page_id="102971874915985" attribution="biz_inbox" ></div> -->
    </div>



</template>

<script>


export default {

created(){

this.ASSETURL = ASSETURL
},

data () {
return {
    schooldetails:{},
    notices:{},

     ASSETURL: '',

}
},

methods: {
    async noticeFun(){
        var res = await this.callApi('get',`/api/notice?sidebar=5`,[]);
        this.notices = res.data.data
    },

getSchoolData(){
    axios.get(`/api/school/settings?school_id=${this.school_id}&front=front`)
        .then(({ data }) => {
            this.schooldetails = data;
        })
        .catch()




},


},
mounted(){
// this.getSchoolData()
// this.schoolDetial('front');
this.noticeFun()











}
}
</script>
