<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Gallery Category</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>Gallery Category</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Fees Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3 class="mobilefonthead">All Gallery Category</h3>
                </div>
                <div class="dropdown">





                </div>
            </div>
          <div class="row">
            <div class="col-12 col-lg-4 d-flex">
              <div class="card border shadow-none w-100">
                <div class="card-body">


                  <form class="row g-3" method="post" v-on:submit.prevent="formsubmit" >

<input type="hidden" v-model="form.id">
                    <div class="col-12 form-group">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" v-model="form.name" @keyup="categoryslug(form.name)" placeholder="GalleryCategory name">

                            <div class="alert alert-danger" v-if="errors.name" v-html="errors.name[0]"></div>

                    </div>
                    <div class="col-12 form-group">
                      <label class="form-label">Slug</label>
                      <input type="text" class="form-control" v-model="form.slug" @keyup="categoryslug(form.slug)"  placeholder="Slug name">

                      <div class="alert alert-danger" v-if="errors.slug" v-html="errors.slug[0]"></div>

                    </div>


                    <div class="col-12 form-group">
                      <div class="d-grid">
                       <button class="btn-fill-lg font-normal text-light gradient-pastel-green">Add Gallery Category</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-8 d-flex">
              <div class="card border shadow-none w-100">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table align-middle">
                      <thead>
                        <tr>


                          <th>Name</th>

                          <th>Slug</th>

                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


<tr v-if="looding">
    <td colspan="6" style="    text-align: center;
    background: #042954;
    color: wheat;">Looding...</td>
</tr>

                        <tr v-else v-for="category in categorys.data">


                          <td>{{ category.name }}</td>

                          <td><router-link  :to="{name:'galleryscategory', params:{category:category.slug}}">{{ category.slug }}</router-link></td>


                          <td>


                                   <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


 <router-link @click.native="editfuncion" :to="{name:'categoryedit',params:{id:category.id}}" class="dropdown-item" ><i class="fas fa-cogs"></i> Edit</router-link>
 <span @click="actionclick(category.id)" class="dropdown-item" ><i class="fas fa-trash-alt fa-fw"></i> Delete</span>


                                        </div>
                                    </div>


                          </td>
                        </tr>



                      </tbody>
                    </table>
                  </div>


                </div>
              </div>
            </div>
          </div>
          <!--end row-->
        </div>
      </div>

    </div>
</template>
<script>
export default {
    created() {

       this.form.school_id = this.school_id
    },
    data() {
        return {
            categorys: {},

            searchtype:"",
            title:"",
            action:"",
              slug:null,
            form:{
                id:'',
                school_id:null,
                name:null,
                slug:null,
            },
            errors:{},
              looding:true,
               preloader: true,
        }
    },
    methods: {

      categoryslug(value){
            //  this.slug =  value.replace(/ /g,'-')
             this.form.slug =  value.replace(/ /g,'-').toLowerCase()
         },

        galleryfun(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }


 this.timeout = setTimeout( ()=> {
            axios.get(`/api/gallery_category?page=${page}&filter[school_id]=${this.school_id}&filter[name]=${this.title}`)
                .then(({ data }) => {
                    this.categorys = data;
         this.looding =false
         this.preloader = false;
                })
                .catch()
                  }, 300);
        },

            editfuncion(){
                this.preloader = true;
                 axios.get(`/api/gallery_category?filter[id]=${this.$route.params.id}`)
                .then(({ data }) => {
                    if(data.data.length>0){

                        this.form = data.data[0];
                        this.preloader = false;
                    }

                })
                .catch()
            },
        searchTitle(){
            this.galleryfun()
		},



        formsubmit() {
            this.preloader = true;
            axios.post(`/api/gallery_category/submit`, this.form)
                .then(({ data }) => {
                    // console.log(data[0].message);
this.preloader = false;
                    if(data[0].message=='validation error'){
                        this.errors = data[0].data
                        Object.values(this.errors).forEach(error => {
                            Notification.validation(error[0]);
                        });
                    // Notification.validation(data[0].message);


                    }else{
                this.galleryfun()
                this.errors = {}
                    this.form.id = '';
                    this.form.name = '';
                    this.form.slug = '';
                    this.slug = '';
                    Notification.success();

                    }
                if(this.$router.currentRoute.path===`/school/gallery_category`){

                }else{

                    this.$router.push({name: 'categorys'})
                }


                })

        },






		actionclick(id){

this.action = 'Delete'
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: `Yes, ${this.action} it!`
			}).then((result) => {
				if (result.isConfirmed) {
					axios.get(`/api/gallery_category/delete/${id}`)
						 .then(({data}) => {
                             this.galleryfun();

                            Notification.customdelete(`Your data has been ${this.action}.`);

						 })
						 .catch(() => {
						 	// this.$router.push({name: 'supplier'})
						 })


				}
			})
		}


    },
    mounted() {

            this.galleryfun();
            this.editfuncion();



// console.log(this.categoryslug("freelancer   nishad hossain"))


    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
