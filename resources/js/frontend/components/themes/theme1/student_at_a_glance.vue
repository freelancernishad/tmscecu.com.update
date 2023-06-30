<template>
    <div>

        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>




            <section class="container">

<h2 class="ms-2 mt-2"> অধ্যয়নরত শিক্ষার্থীর সংখ্যা </h2>

<table cellpadding="3" cellspacing="0" width="100%" style="margin: 22px auto 0px;">
    <tr>
        <td  class="p-2columnStyleLeft">
            <div class="bg-white p-2 py-4 rounded-1 shadow">
                <table cellspacing="0" cellpadding="3" id="ContentPlaceHolder1_grdvTeachers"
                    style="  margin: 0px auto; width: 100%;">
                    <tr align="center" valign="middle"
                        style="color: rgb(12, 9, 10); background-color: rgb(242, 242, 242); border-color: rgb(204, 204, 204); border-width: 1px;">
                        <td class="p-2" colspan="1" style="border-width: 0px; text-align: center;">
                            শ্রেণী</td>
                        <td class="p-2" colspan="3"
                            style="border-color: rgb(204, 204, 204); border-width: 1px; border-style: solid; text-align: center;">
                            শিক্ষার্থী</td>
                        <td class="p-2" colspan="3"
                            style="border-color: rgb(204, 204, 204); border-width: 1px; border-style: solid; text-align: center;">
                            বিভাগ</td>
                    </tr>
                    <tr align="center" valign="middle"
                        style="border-color: rgb(204, 204, 204); border-width: 1px; border-style: solid; ">
                        <td class="p-2 border"  align="left" valign="middle" scope="col"></td>
                        <td class="p-2 border"  align="center" valign="middle" scope="col">
                            ছাত্র</td>
                        <td class="p-2 border"  align="center" valign="middle" scope="col">
                            ছাত্রী</td>
                        <td class="border p-2"  align="center" valign="middle" scope="col">
                            মোট</td>
                        <td  class="p-2 border"  align="center" valign="middle" scope="col">
                            বিজ্ঞান</td>
                        <td class="p-2 border"  align="center" valign="middle" scope="col">
                            মানবিক</td>
                    </tr>
                    <tr v-for="(student,key) in students.data">
                            <td align="center" class="p-2" style="border-color: rgb(204, 204, 204); border-width: 1px; border-style: solid;    width: 30px;">{{ key }}</td>
                            <td align="center" class="p-2" style="border-color: rgb(204, 204, 204); border-width: 1px; border-style: solid;    width: 30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txtmale_0">{{ student.maleStudent }}</span>
                            </td>
                            <td align="center" class="p-2" style="border-color: rgb(204, 204, 204); border-width: 1px; border-style: solid;    width: 30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txtfemale_0">{{ student.FemaleStudent }}</span>
                            </td>
                            <td align="center" class="p-2" style="border-color: rgb(204, 204, 204); border-width: 1px; border-style: solid;    width: 30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txttotal_0">{{ student.totalStudent }}</span>
                            </td>
                            <td align="center" class="p-2" style="border-color: rgb(204, 204, 204); border-width: 1px; border-style: solid;    width: 30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txtmuslim_0">{{ student.scienceStudent }}</span>
                            </td>

                            <!-- <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txthindu_0">{{ student.CommerceStudent }}</span>
                            </td> -->

                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txtbouddho_0">{{ student.HumanitiesStudent }}</span>
                            </td>
                        </tr>
                </table>
            </div>
            <div>
                        <table cellspacing="0" cellpadding="0" id="ContentPlaceHolder1_grdvTotal"
                            style="background: white; border-collapse: collapse; margin: 0px auto;"
                            class="w-100 bg-body my-2">
                            <tr>
                                <td class="p-2" scope="col">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="p-2">
                                    <table width="100%" cellpadding="2" cellspacing="0">




                                        <tr style="background: #e2e2e252 ;" v-for="(student,key) in students.countdata">
                                            <td  class="p-2 firstColumn"
                                                style="border-top: 1px solid rgb(204, 204, 204);">
                                                {{ key }} :
                                            </td>
                                            <td  colspan="3" class="p-2 secondColumn"
                                                style="border-top: 1px solid rgb(204, 204, 204);">
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


</section>



























    </div>
</template>

<script>


export default {

	created(){

  this.ASSETURL = ASSETURL
	},

	data () {
		return {
            students: {},

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
