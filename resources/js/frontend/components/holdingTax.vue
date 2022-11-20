<template>



    <div class="row">
        <div class="mainBody col-md-9 mt-3">
            <form  @submit.prevent="formSubmit">


                <div class="form-group">
                    <label for=""></label>
                    <div class="d-flex">
                        <input type="text" v-model="form.userdata" id="userdata" class="form-control"
                            placeholder="এখানে আপনার হোল্ডিং নং/নাম/জাতীয় পরিচয় পত্র নম্বর/মোবাইল নম্বর (যে কোন একটি তথ্য) এন্ট্রি করুন"
                            required="">


                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="button" disabled class="btn btn-info text-center" v-if="isSending">Wait...</button>
                    <button type="submit" class="btn btn-info text-center" v-else>খুঁজুন</button>

                </div>

            </form>



            <table class="table">
                <thead>
                    <tr>
                        <th>হোল্ডিং নাম্বার</th>
                        <th>নাম</th>
                        <th>এন আইডি নাম্বার</th>
                        <th>মোবাইল নাম্বার</th>

                        <th>আরও তথ্য</th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row,index) in rows">
                        <td>{{ row.holding_no }}</td>
                        <td>{{ row.maliker_name }}</td>
                        <td>{{ row.nid_no }}</td>
                        <td>{{ row.mobile_no }}</td>
                        <td>
                            <span size="sm" v-if="buttonLoader" class="btn btn-info mr-1 mt-1"><img width="20px"
                                    src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif"
                                    alt=""></span>

                            <router-link :to="{name:'holdingTaxSingle',params:{id:row.id}}" class="btn btn-success"
                                v-else>View</router-link>





                            <!-- <a class="btn btn-success" href="">Edit</a> -->

                            <!-- <a class="btn btn-danger" href="">Delete</a> -->


                        </td>
                    </tr>
                </tbody>
            </table>




        </div>



        <side-bar></side-bar>




    </div>

</template>

<script>
export default {
    data() {
        return {
            contact: {

                name: '',
                subject: '',
                email: '',
                message: '',
            },
            form:{
                userdata:'',
            },
            rows: {},

            isSending: false
        }

    },
    created() {
        setTimeout(() => {

            // this.list();
        }, 3000);
    },
    methods: {

        async list() {




            var res = await this.callApi('get', `/api/holding/tax/list?union=${this.getUnion}`, []);
            this.rows = res.data;
        },



        async formSubmit(){
            this.isSending = true
            var res = await this.callApi('post',`/api/holding/tax/search`,this.form);
            this.rows = res.data;
            this.isSending = false
        }





    }

}
</script>
<style>
.contact-form {
    font-family: 16px;
    margin: 0 auto;
    max-width: 600px;
    width: 100%;
}

.contact-form .separator {
    border-bottom: solid 1px #ccc;
    margin-bottom: 15px;
}

.contact-form .form {
    display: flex;
    flex-direction: column;
    font-size: 16px;
}

.contact-form_title {
    color: #333;
    text-align: left;
    font-size: 28px;
}


.contact-form textarea {
    resize: none;
}

.contact-form .button {
    background: #da552f;
    border: solid 1px #da552f;
    color: white;
    cursor: pointer;
    padding: 10px 50px;
    text-align: center;
    text-transform: uppercase;
}

.contact-form .button:hover {
    background: #ea532a;
    border: solid 1px #ea532a;
}

.contact-form input[type="email"],
.contact-form input[type="text"],
.contact-form textarea,
.contact-form .button {
    font-size: 15px;
    border-radius: 3px
}
</style>
