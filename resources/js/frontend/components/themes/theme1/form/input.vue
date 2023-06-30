<template>
    <div>

        <div class="form-group">
            <label for="">{{ lebel }}</label>
            <input :type="type" :value="value" class="form-control" :class="customclass" :style="customstyles"
                @keyup="updateValue($event.target.value)" :required="required" @focus="updateValue($event.target.value)" @blur="updateValue($event.target.value)" />
            <small v-if="error != ''" style="color:red">{{ error }}</small>
        </div>





        <!-- <input type="text" ref="dayPicker" placeholder="Day" :value="splitdate.day" :required="required" @input="updateDate()"> -->
        <!-- <input type="text" ref="monthPicker" placeholder="Month" :value="splitdate.month" @input="updateDate()">
    <input type="text" ref="yearPicker" placeholder="Year" :value="splitdate.year" @input="updateDate()"> -->


    </div>

</template>

<script>
export default {
    created(){

    },
    props: {
        'lebel': '',
        'type': {
            type: String,
            default: ''
        },
        'value': '',
        'required': '',
        'customclass': '',

        'errortext': {
            type: String,
            default: 'Field is Required'
        }
    },
    data() {

        return {
            error: '',
            customstyles: '',

        }

    },

    methods: {

        updateValue(value) {

            this.$emit("input", value)
setTimeout(() => {
                if (this.required == 'required') {
                if (this.value == '') {

                    this.error = this.errortext;
                    this.customstyles = 'border:1px solid red'
                } else {
                    this.error = '';
                        this.customstyles = ''
                }

            } else {
                this.error = '';
                    this.customstyles = ''
            }

}, 300);









        }




    }



    //   props: ['value','required'],
    //   computed:{
    //     splitdate(){
    //         var splitValue = this.value.split('/')

    //         return{
    //  day:splitValue[0],
    //         month:splitValue[1],
    //         year:splitValue[2],
    //         }

    //     }
    //   },
    //   methods: {
    // updateDate(){
    //     this.$emit("input",`${this.$refs.dayPicker.value}/${this.$refs.monthPicker.value}/${this.$refs.yearPicker.value}`)

    // }
    //   },
}
</script>
