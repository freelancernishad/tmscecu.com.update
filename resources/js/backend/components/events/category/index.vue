<template>
    <div>

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Blog Category</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>Blog Category</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Fees Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>All Blog Category</h3>
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
                      <input type="text" class="form-control" v-model="form.name" @keyup="categoryslug(form.name)" placeholder="BlogCategory name">

                            <div class="alert alert-danger" v-if="errors.name" v-html="errors.name[0]"></div>

                    </div>
                    <div class="col-12 form-group">
                      <label class="form-label">Slug</label>
                      <input type="text" class="form-control" v-model="form.slug" @keyup="categoryslug(form.slug)"  placeholder="Slug name">

                      <div class="alert alert-danger" v-if="errors.slug" v-html="errors.slug[0]"></div>

                    </div>


                    <div class="col-12 form-group">
                      <div class="d-grid">
                       <button class="btn btn-primary">Add Blog Category</button>
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




                        <tr v-for="category in categorys.data">


                          <td>{{ category.name }}</td>

                          <td><router-link  :to="{name:'blogscategory', params:{category:category.slug}}">{{ category.slug }}</router-link></td>


                          <td>
                            <div class="d-flex align-items-center gap-3 fs-6">

                        <router-link @click.native="editfuncion" :to="{name:'blogcategoryedit',params:{id:category.id}}" class="text-warning" ><i class="fas fa-edit fa-fw"></i></router-link>
                         <span @click="actionclick(category.id)" style="color:red" ><i class="fas fa-trash-alt fa-fw"></i></span>
                            </div>
                          </td>
                        </tr>



                      </tbody>
                    </table>
                  </div>

      <pagination :data="categorys" v-bind:showDisabled="true" :limit="3" v-on:change-page="blogfun"></pagination>

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
       this.school_id = getschoolid
       this.form.school_id = getschoolid
    },
    data() {
        return {
            categorys: {},
            school_id: '',
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
        }
    },
    methods: {

      categoryslug(value){
            //  this.slug =  value.replace(/ /g,'-')
             this.form.slug =  value.replace(/ /g,'-').toLowerCase()
         },

        blogfun(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }


 this.timeout = setTimeout( ()=> {
            axios.get(`/api/blog_category?page=${page}&filter[school_id]=${this.school_id}&filter[name]=${this.title}`)
                .then(({ data }) => {
                    this.categorys = data;

                })
                .catch()
                  }, 300);
        },

            editfuncion(){
                 axios.get(`/api/blog_category?filter[id]=${this.$route.params.id}`)
                .then(({ data }) => {
                    if(data.data.length>0){

                        this.form = data.data[0];
                    }

                })
                .catch()
            },
        searchTitle(){
            this.blogfun()
		},


        formsubmit() {
            axios.post(`/api/blog_category/submit`, this.form)
                .then(({ data }) => {
                    // console.log(data[0].message);

                    if(data[0].message=='validation error'){
                        this.errors = data[0].data
                        Object.values(this.errors).forEach(error => {
                            Notification.validation(error[0]);
                        });
                    // Notification.validation(data[0].message);


                    }else{

                this.blogfun()
                this.errors = {}
                    this.form.id = '';
                    this.form.name = '';
                    this.form.slug = '';
                    this.slug = '';
                    Notification.success();

                    }
                if(this.$router.currentRoute.path===`/school/blog_category`){

                }else{

                    this.$router.push({name: 'blogcategorys'})
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
					axios.get(`/api/blog_category/delete/${id}`)
						 .then(({data}) => {
                             this.blogfun();

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
        setTimeout(() => {
            this.blogfun();
            this.editfuncion();

        }, 2000);

// console.log(this.categoryslug("freelancer   nishad hossain"))


    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
