<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
        <form @submit.stop.prevent="Search">

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Trx Id</label>
                        <input type="text" v-model="form.trnx_id" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Trx date</label>
                        <input type="date" v-model="form.trans_date" class="form-control">
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-info">Search</button>
        </form>



        <h1 class="text-center"> My Server</h1>
        <pre v-html="result.myserver"></pre>
        <h1 class="text-center">Akpay</h1>
        <pre v-html="result.akpay"></pre>



        <button v-if="result" @click="ReCallIpn" class="btn btn-danger">Recall IPN</button>


    </div>
</template>

<script>
export default {
    data(){
        return {
            preLooding:false,
            form:{
                trnx_id:'',
                trans_date:'',
            },
            result:{}
        }
    },
    methods: {

        async Search(){
            this.preLooding = true
            var res = await this.callApi('post',`/api/check/payments/ipn`,this.form);
            this.result = res.data
            this.preLooding = false
        },
        async ReCallIpn(){
            this.preLooding = true
            var res = await this.callApi('post',`/api/re/call/ipn`,this.form);
            if(res.status==200){
                Notification.customSuccess('IPN sent success');
                this.Search();

            }else{
                Notification.customError('Something want wrong');

            }

            this.preLooding = false

        }



    },
}
</script>
