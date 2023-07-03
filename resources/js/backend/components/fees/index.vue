<template>
    <div>
        <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <div class="breadcrumbs-area">
            <h3>Fees</h3>
            <ul>
                <li>
                    <router-link to="/dashboard">Home</router-link>
                </li>
                <li>Fees</li>
            </ul>
        </div>




        <div class="card" v-for="(feeData,index) in feeDatas" :key="'feeMain'+index">
            <div class="card-body">
                <div class="card-head"><h2 class="text-center">{{ class_en_to_bn(feeData[0].class) }}</h2></div>
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th>ক্রমিক নং</th>
                            <!-- <th>শ্রেণি</th> -->
                            <th>নাম</th>
                            <th>ফি এর পরমান</th>
                            <th>স্ট্যাটাস</th>
                            <th>অ্যাকশান</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(fee,index2) in feeData" :key="fee.class+fee.id">
                            <td>{{ int_en_to_bn(index2+1) }}</td>
                            <!-- <td>{{ class_en_to_bn(fee.class) }}</td> -->
                            <td v-if="fee.type=='exam_fee'">{{ ex_fee_name(fee.sub_type) }}</td>
                            <td v-else>{{ feesconvert(fee.type) }}</td>

                            <td>{{ fee.fees }}</td>
                            <td v-html="feeStatusText(fee.status)"></td>
                            <td><router-link :to="{name:'feesedit',params:{id:fee.id}}" class="btn btn-info">Edit</router-link> </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>






    </div>
</template>

<script>
export default {
    data () {
        return {
            feeDatas:{
                'Six':{},
                'Seven':{},
                'Eight':{},
                'Nine':{},
                'Ten':{},
            },
            form:{
                class:{},
            },
            preloader:false,
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                this.getExamFees();
            },
            deep: true
        }
    },
    methods: {
        async getExamFees(){
            this.preloader = true
            var res = await this.callApi('get',`/api/school/fees?type=${this.$route.params.name}`);


            var datas = [];
            res.data.classes.forEach(className => {

                this.feeDatas[className] = res.data.fees.filter(fee => fee.class == className);
            });
this.preloader = false







        }
    },
    mounted() {
        this.getExamFees();
    },
}
</script>
