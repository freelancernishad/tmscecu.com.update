<template>
    <div class="hello">

        <div class="w-full mt-4 p-10">

            <table class="table">
                <tr>
                    <th>নাম</th>
                    <th>সম্পর্ক</th>
                    <th>জন্ম তারিখ</th>
                    <th>জাতীয় পরিচয়পত্র নাম্বার</th>
                    <th><button type="button" class="flex justify-start btn btn-info" @click="addMore()">Add More</button></th>
                </tr>

                <tr v-for="(successor, index) in successors" :key="index">

                    <th><input v-model="successor.w_name" placeholder="enter you course name" class="form-control" /></th>
                    <th><input v-model="successor.w_relation" placeholder="enter you course name" class="form-control" /></th>
                    <th><input v-model="successor.w_age" type="date" placeholder="enter you course name" class="form-control" /></th>
                    <th><input v-model="successor.w_nid" type="number"   @keydown="portKeydown($event)" placeholder="enter you course name" class="form-control" /></th>
                    <th><button type="button" class="ml-2 btn btn-danger" @click="remove(index)" v-show="index != 0">Remove</button></th>

                </tr>
            </table>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "dynamicInput",
    props: {
        msg: String,
    },
    data() {
        return {
            successors: [
                {
                    w_name: "",
                    w_relation: "",
                    w_age: "",
                    w_nid: "",
                },
            ],
        };
    },
    methods: {

    portKeydown(e) {
      if (/^\+$/.test(e.key)) {
        e.preventDefault();
      }
    },
        addMore() {
            this.successors.push({
                    w_name: "",
                    w_relation: "",
                    w_age: "",
                    w_nid: "",
            });
        },
        remove(index) {
            this.successors.splice(index, 1);
        },
    },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
    margin: 40px 0 0;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    display: inline-block;
    margin: 0 10px;
}

a {
    color: #42b983;
}
</style>
