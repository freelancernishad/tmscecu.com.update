<template>
    <div>

            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>

<section class="inner-header divider layer-overlay overlay-theme-colored-7" >
<div class="container">
    <!-- Section Content -->
    <div class="section-content">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-theme-colored2 font-36"> অধ্যয়নরত শিক্ষার্থীর সংখ্যা</h1>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="">Home</a></li>
                    <li class="active">student_at_a_glance</li>
                </ol>
            </div>
        </div>
    </div>
</div>
</section>


 <!-- Main Start -->
    <main class="container-fluid">
        <div class="row">
            <!-- Left Main -->
            <div class="col-lg-9 my-3">
            <div class="container">

    <table cellpadding="3" cellspacing="0" style="margin: 0 auto;margin-top: 22px;" width="100%">

        <tr>
            <td class="columnStyleLeft">
                <div>
                    <table cellspacing="0" cellpadding="3" id="ContentPlaceHolder1_grdvTeachers" style="font-family:Noto Sans Bengali;font-size:11pt;border-collapse:collapse;margin: 0 auto;width:100%">
                        <tr align="center" valign="middle" style="color:#0C090A;background-color:#F2F2F2;border-color:#CCCCCC;border-width:1px;border-style:Solid;font-family:Noto Sans Bengali;font-size:9pt;">
                            <td colspan="1" style="border-width:0px;"></td>
                            <td colspan="3" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-weight:bold;">শিক্ষার্থী</td>
                            <td colspan="3" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-weight:bold;">বিভাগ</td>
                        </tr>
                        <tr align="center" valign="middle" style="color:#0C090A;background-color:#F2F2F2;border-color:#CCCCCC;border-width:1px;border-style:Solid;font-family:Noto Sans Bengali;font-size:9pt;">
                            <th align="left" valign="middle" scope="col">শ্রেণি</th>
                            <th align="center" valign="middle" scope="col" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;">ছেলে</th>
                            <th align="center" valign="middle" scope="col" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;">মেয়ে</th>
                            <th align="center" valign="middle" scope="col" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;">মোট</th>
                            <th align="center" valign="middle" scope="col" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;">বিজ্ঞান</th>
                            <th align="center" valign="middle" scope="col" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;">ব্যব.শি</th>
                            <th align="center" valign="middle" scope="col" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;">মানবিক</th>
                        </tr>

                        <tr v-for="(student,key) in students.data">
                            <td align="left" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-family:Century Gothic;font-size:9pt;font-weight:bold;width:75px;">{{ key }}</td>
                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;font-weight:bold;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txtmale_0">{{ student.maleStudent }}</span>
                            </td>
                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;font-weight:bold;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txtfemale_0">{{ student.FemaleStudent }}</span>
                            </td>
                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;font-weight:bold;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txttotal_0">{{ student.totalStudent }}</span>
                            </td>
                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;font-weight:bold;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txtmuslim_0">{{ student.scienceStudent }}</span>
                            </td>
                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;font-weight:bold;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txthindu_0">{{ student.CommerceStudent }}</span>
                            </td>
                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;font-weight:bold;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txtbouddho_0">{{ student.HumanitiesStudent }}</span>
                            </td>
                        </tr>

                    </table>
                </div>
                <div>
                    <table cellspacing="0" cellpadding="0" id="ContentPlaceHolder1_grdvTotal" style="border-collapse:collapse;margin: 0 auto;">
                        <tr>
                            <td scope="col">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <table cellpadding="2" cellspacing="0">



                                    <tr  v-for="(student,key) in students.countdata">
                                        <td class="firstColumn" style="border-top: 1px solid #CCCCCC;">
                                            {{ key }}
                                        </td>
                                        <td colspan="3" class="secondColumn" style="border-top: 1px solid #CCCCCC;">
{{ student }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

</div>
            </div>

    <rightsidebar/>


        </div>
    </main>
    <!-- Main End -->


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
            students: {},
            school_id:null,
            ASSETURL: '',
            preloader: true,
		}
	},

	methods: {

        getstudentsData(){
            axios.get(`/api/student_at_a_glance?school_id=${this.school_id}&front=front`)
                .then(({ data }) => {
                    this.students = data;
                     this.preloader = false;
                })
                .catch()
        },



	},
	mounted(){

this.getstudentsData()

	}
}
</script>

<style>



.mini-profile-widget .image-container .avatar {
    width: 180px;
    height: 180px;
    display: block;
    margin: 0 auto;
    border-radius: 50%;
    background: white;
    padding: 4px;
    border: 1px solid #dddddd;
}


</style>
