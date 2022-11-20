<template>
<div class="d-flex justify-content-between align-items-center">
                        <select class='searchFrom form-control' name="division" id="division" v-model="division" @change="getdistrictFun" >
                            <option value="">বিভাগ নির্বাচন করুন</option>
                                <option v-for="div in getdivisions" :key="div.id" :value="div.id">{{ div.bn_name }}</option>
                        </select>
                        <select   class='searchFrom form-control' name="district" id="district" v-model="district" @change="getthanaFun" >
                            <option value="">জেলা নির্বাচন করুন</option>
                            <option v-for="dist in getdistricts" :key="dist.id" :value="dist.id">{{ dist.bn_name }}</option>
                        </select>
                        <select  class='searchFrom form-control' name="thana" id="thana" v-model="thana" @change="getuniounFun" >
                            <option value="">উপজেলা নির্বাচন করুন</option>
                            <option v-for="thana in getthanas" :key="thana.id" :value="thana.id">{{ thana.bn_name }}</option>
                        </select>

                        <select  @change="changeunioun"  class='searchFrom form-control' v-model="unioun" id="unioun">
                            <option value="">ইউনিয়ন নির্বাচন করুন</option>

                           <!-- <option value="">ইউনিয়ন</option> -->
                           <option v-for="union in getuniouns" :key="union.id" :value="union.url">{{ union.bn_name }}</option>
                        </select>
<!--
                        <select  @change="changeunioun()"  class='searchFrom form-control' v-model="unioun" id="unioun">
                           <option value="">ইউনিয়ন</option><option value="Chilahati">চিলাহাটি</option><option value="Shaldanga">শালডাঙ্গা</option><option value="Debiganj Sadar">দেবীগঞ্জ সদর</option><option value="Pamuli">পামুলী</option><option value="Sundardighi">সুন্দরদিঘী</option><option value="Sonahar Mollikadaha">সোনাহার মল্লিকাদহ</option><option value="Tepriganj">টেপ্রীগঞ্জ</option><option value="Dandopal">দন্ডপাল</option><option value="Debiduba">দেবীডুবা</option><option value="Chengthi Hazra Danga">চেংঠী হাজরা ডাঙ্গা</option>
                        </select> -->


</div>
</template>
<script>
export default {
    props: {
        CustomUrl:{
            type:String,
            default:''
        }
    },
    data(){
        return {

            division:'',
            district:'',
            thana:'',
            unioun:'',

            getdivisions:{},
            getdistricts:{},
            getthanas:{},
            getuniouns:{},




        }
    },
    methods: {


       async getdivisionFun(){
         var res = await this.callApi('get',`/api/getdivisions`,[]);
         this.getdivisions = res.data;
        },

       async getdistrictFun(){

         var res = await this.callApi('get',`/api/getdistrict?id=${this.division}`,[]);
         this.getdistricts = res.data;
        },

       async getthanaFun(){
         var res = await this.callApi('get',`/api/getthana?id=${this.district}`,[]);
         this.getthanas = res.data;
        },

       async getuniounFun(){
         var res = await this.callApi('get',`/api/getunioun?id=${this.thana}`,[]);
         this.getuniouns = res.data;
        },


        changeunioun(){





                window.location.href = this.unioun+this.CustomUrl
                // console.log(this.unioun+this.CustomUrl)



        //     var url =  this.$appUrl.split("//");

        //    var redirect = url[0]+'//'+this.unioun.replaceAll(' ', '_').toLowerCase()+'.'+url[1]+''+this.CustomUrl;
        //    window.location.href= redirect;
        }
    },
    mounted() {
        this.getdivisionFun();
    },
}
</script>
<!--

UPDATE `unions` SET `url`='https://www.amarkhana.uniontax.gov.bd' WHERE `id`='3650';
UPDATE `unions` SET `url`='https://www.haribhasa.uniontax.gov.bd' WHERE `id`='3651';
UPDATE `unions` SET `url`='https://www.chaklahat.uniontax.gov.bd' WHERE `id`='3652';
UPDATE `unions` SET `url`='https://www.hafizabad.uniontax.gov.bd' WHERE `id`='3653';
UPDATE `unions` SET `url`='https://www.kamatkajoldighi.uniontax.gov.bd' WHERE `id`='3654';
UPDATE `unions` SET `url`='https://www.dhakkamara.uniontax.gov.bd' WHERE `id`='3655';
UPDATE `unions` SET `url`='https://www.magura.uniontax.gov.bd' WHERE `id`='3656';
UPDATE `unions` SET `url`='https://www.garinabari.uniontax.gov.bd' WHERE `id`='3657';
UPDATE `unions` SET `url`='https://www.chilahati.uniontax.gov.bd' WHERE `id`='3658';
UPDATE `unions` SET `url`='https://www.shaldanga.uniontax.gov.bd' WHERE `id`='3659';
UPDATE `unions` SET `url`='https://www.debiganjsadar.uniontax.gov.bd' WHERE `id`='3660';
UPDATE `unions` SET `url`='https://www.pamuli.uniontax.gov.bd' WHERE `id`='3661';
UPDATE `unions` SET `url`='https://www.sundardighi.uniontax.gov.bd' WHERE `id`='3662';
UPDATE `unions` SET `url`='https://www.sonaharmollikadaha.uniontax.gov.bd' WHERE `id`='3663';
UPDATE `unions` SET `url`='https://www.tepriganj.uniontax.gov.bd' WHERE `id`='3664';
UPDATE `unions` SET `url`='https://www.dandopal.uniontax.gov.bd' WHERE `id`='3665';
UPDATE `unions` SET `url`='https://www.debiduba.uniontax.gov.bd' WHERE `id`='3666';
UPDATE `unions` SET `url`='https://www.chengthihazradanga.uniontax.gov.bd' WHERE `id`='3667';

UPDATE `unions` SET `url`='https://www.jholaishalshiri.uniontax.gov.bd' WHERE `id`='3668';
UPDATE `unions` SET `url`='https://www.moidandighi.uniontax.gov.bd' WHERE `id`='3669';
UPDATE `unions` SET `url`='https://www.banghari.uniontax.gov.bd' WHERE `id`='3670';
UPDATE `unions` SET `url`='https://www.kajoldighikaligonj.uniontax.gov.bd' WHERE `id`='3671';
UPDATE `unions` SET `url`='https://www.boroshoshi.uniontax.gov.bd' WHERE `id`='3672';
UPDATE `unions` SET `url`='https://www.chandanbari.uniontax.gov.bd' WHERE `id`='3673';
UPDATE `unions` SET `url`='https://www.mareabamonhat.uniontax.gov.bd' WHERE `id`='3674';
UPDATE `unions` SET `url`='https://www.boda.uniontax.gov.bd' WHERE `id`='3675';
UPDATE `unions` SET `url`='https://www.sakoa.uniontax.gov.bd' WHERE `id`='3676';
UPDATE `unions` SET `url`='https://www.pachpir.uniontax.gov.bd' WHERE `id`='3677';
UPDATE `unions` SET `url`='https://www.mirgapur.uniontax.gov.bd' WHERE `id`='3678';
UPDATE `unions` SET `url`='https://www.radhanagar.uniontax.gov.bd' WHERE `id`='3679';

UPDATE `unions` SET `url`='https://www.toria.uniontax.gov.bd' WHERE `id`='3680';

UPDATE `unions` SET `url`='https://www.balarampur.uniontax.gov.bd' WHERE `id`='3681';
UPDATE `unions` SET `url`='https://www.alowakhowa.uniontax.gov.bd' WHERE `id`='3682';
UPDATE `unions` SET `url`='https://www.dhamor.uniontax.gov.bd' WHERE `id`='3683';



UPDATE `unions` SET `url`='https://www.banglabandha.uniontax.gov.bd' WHERE `id`='3684';
UPDATE `unions` SET `url`='https://www.bhojoanpur.uniontax.gov.bd' WHERE `id`='3685';
UPDATE `unions` SET `url`='https://www.bhojoanpur.uniontax.gov.bd' WHERE `id`='3686';
UPDATE `unions` SET `url`='https://www.buraburi.uniontax.gov.bd' WHERE `id`='3687';
UPDATE `unions` SET `url`='https://www.debnagar.uniontax.gov.bd' WHERE `id`='3688';
UPDATE `unions` SET `url`='https://www.salbahan.uniontax.gov.bd' WHERE `id`='3689';
UPDATE `unions` SET `url`='https://www.tentulia.uniontax.gov.bd' WHERE `id`='3690';
UPDATE `unions` SET `url`='https://www.tirnaihat.uniontax.gov.bd' WHERE `id`='3691';
 -->
