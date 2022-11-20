<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Gallery</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Gallery</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->
        <!-- Student Table Area Start Here -->
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <router-link class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                            v-if="$routerHistory.hasPrevious()" :to="{ path: $routerHistory.previous().path }">
                            GO BACK
                        </router-link>
                    </div>
                    <div class="dropdown">
                    </div>
                </div>
                <form class="row g-3" method="post" v-on:submit.prevent="formsubmit" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label for="">Title</label>
                        <input type="text" v-model="form.title" id="title" class="form-control"
                            placeholder="Enter Gallery Title">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Slug</label>
                        <input type="text" v-model="form.slug" id="title" class="form-control"
                            placeholder="Enter Gallery Slug">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Description</label>
                        <textarea v-model="form.description" class="form-control" id="description" cols="30"
                            rows="4"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Category</label>
                        <select v-model="form.category" id="category" class="form-control">
                            <option value="">Select</option>
                            <option v-for="category in categorys.data" :value="category.slug">{{ category.name }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Image</label>
                        <vue-upload-multiple-image @upload-success="uploadImageSuccess" @before-remove="beforeRemove"
                            @edit-image="editImage" :show-edit="showEdit" :data-images="form.images" dragText="Drag images (multiple)"
                            browseText="(or) Select" primaryText="Default" markIsPrimaryText="Set as default"
                            popupText="This image will be displayed as default" dropText="Drop your files here..."
                            :maxImage="maxImage"></vue-upload-multiple-image>
                    </div>
                    <div class="col-12">
                        <button type="submit"
                            class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark px-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {
       this.school_id = getschoolid
       this.form.school_id = getschoolid
    },
    data() {
        return {
            categorys: {},
            gallerys: {},
            images: [],
            school_id: '',
            maxImage: 20,
            showEdit: false,
            preloader: true,
            form: {
                id: '',
                school_id: null,
                title: null,
                slug: null,
                description: null,
                category: null,
                images: []
            },
        }
    },
    methods: {
        uploadImageSuccess(formData, index, fileList) {
            //   console.log('data', formData, index, fileList)
            console.log(fileList)
            this.form.images = fileList
        },
        beforeRemove(index, done, fileList) {
            //   console.log('index', index, fileList)
            var r = confirm("remove image")
            if (r == true) {
                done()
                this.form.images = fileList
            } else {
            }
        },

        editImage(formData, index, fileList) {
            //   console.log('edit data', formData, index, fileList)
             console.log(fileList)
            this.form.images = fileList
        },



        categorysfun() {
            axios.get(`/api/gallery_category?filter[school_id]=${this.school_id}`)
                .then(({ data }) => {
                    this.categorys = data;

                })
                .catch()
        },



        galleryfun() {
            this.timeout = setTimeout(() => {
                axios.get(`/api/gallery/edit?filter[id]=${this.$route.params.id}`)
                    .then(({ data }) => {
                        this.form = data;
                        this.preloader = false;
                    })
                    .catch()
            }, 300);
        },



        formsubmit() {
            this.preloader = true;
            axios.post(`/api/gallery/submit`, this.form)
                .then(({ data }) => {
                    if (data[0].message == 'validation error') {
                        this.errors = data[0].data
                        Object.values(this.errors).forEach(error => {
                            Notification.validation(error[0]);
                        });
                        // Notification.validation(data[0].message);
                    }else{
                    this.$router.push({name: 'gallerys'})
//
                        Notification.success();
                    }
                    this.preloader = false;
                })
                .catch(() => {
                    // this.$router.push({name: 'supplier'})
                })
        },

    },
    mounted() {
        this.categorysfun()
        if (this.$route.params.id) {
            this.galleryfun();

        }else{
            this.preloader = false;
        }
    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
