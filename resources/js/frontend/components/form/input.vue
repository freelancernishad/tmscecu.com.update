<template>
    <div class="d-flex">



        <input type="text" class="form-control" ref="dayPicker" placeholder="Day" :value="splitdate.day" :required="required" @input="updateDate()">
        <input type="text" class="form-control" ref="monthPicker" placeholder="Month" :value="splitdate.month" @input="updateDate()">
        <input type="text" class="form-control" ref="yearPicker" placeholder="Year" :value="splitdate.year" @input="updateDate()">


    </div>

</template>

<script>
export default {




      props: ['value','required'],
      computed:{
        splitdate(){
            var splitValue = this.value.split('/')

            return{
            day:splitValue[0],
            month:splitValue[1],
            year:splitValue[2],
            }

        }
      },
      methods: {
    updateDate(){
        this.$emit("input",`${this.$refs.dayPicker.value}/${this.$refs.monthPicker.value}/${this.$refs.yearPicker.value}`)

    }
      },
}
</script>
