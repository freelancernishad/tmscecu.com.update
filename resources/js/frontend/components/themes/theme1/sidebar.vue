<template>




            <div class="col-lg-3 my-3">


                <!-- Notice and Facebook  -->
                <section class="">
                    <div class="row">
                        <!-- Notice Board -->
                        <!-- <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="pb-2">
                                <div class="section_title">
                                    <h4 class="bg-primary p-2 mb-0 text-light">নোটিশ বোর্ড</h4>
                                </div>
                                <div class="custom_bg py-2">
                                    <ul style="padding-left:0">
                                        @foreach ($noticeList as $noList)
                                        <li class="ps-3 pb-3"><a class="text-black"  href=""> <i class="fas fa-angle-double-right"></i> </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- Facebook Page -->
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="pb-2">
                                <div class="section_title">
                                    <h4 class="bg-primary p-2 mb-0 text-light">আমাদের ফেসবুক পেজ</h4>
                                </div>
                                <div class="py-2 text-center">

                                    <div class="fb-page"
                                    :data-href="schooldetails.facebook_page"
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
                                    <ul style="padding-left:0">
                                        <li class="ps-3 pb-3"><a class="text-black"  href="http://www.moedu.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> শিক্ষা মন্ত্রণালয়</a></li>
                                        <li class="ps-3 pb-3"><a class="text-black"  href="http://www.dshe.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> মাধ্যমিক ও উচ্চ শিক্ষা অধিদপ্তর</a></li>
                                        <li class="ps-3 pb-3"><a class="text-black"  href="http://www.banbeis.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> ব্যানবেইজ</a></li>
                                        <li class="ps-3 pb-3"><a class="text-black"  href="http://www.nctb.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> এনসিটিবি</a></li>
                                        <li class="ps-3"><a class="text-black"  href="https://www.teachers.gov.bd/" target="_blank"> <i class="fas fa-angle-double-right"></i> শিক্ষক বাতায়ন</a></li>
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
  this.school_id = getschoolid
  this.ASSETURL = ASSETURL
	},

	data () {
		return {
            schooldetails:{


            },
             school_id:null,
             ASSETURL: '',

		}
	},

	methods: {

        getSchoolData(){
            axios.get(`/api/school/settings?school_id=${this.school_id}&front=front`)
                .then(({ data }) => {
                    this.schooldetails = data;
                })
                .catch()
        },


	},
	mounted(){
this.getSchoolData()











	}
}
</script>
