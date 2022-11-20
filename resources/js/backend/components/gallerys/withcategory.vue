<template>
    <div>
        <div class="breadcrumbs-area">
            <h3>Gallery</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Gallery</li>
            </ul>
        </div>
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <router-link  class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                            v-if="$routerHistory.hasPrevious()" :to="{ path: $routerHistory.previous().path }">
                            GO BACK
                        </router-link>
                    </div>
                    <div class="dropdown">
                        <router-link  class="btn-fill-md text-light bg-dark-pastel-green mt-3 float-right" :to="{name:'gallerynew'}">Add New</router-link>

                    </div>
                </div>



                        <div class="d-flex justify-content-between">




                                <div></div>



                                    <div class="form-group">
                                        <label for="">Search :</label>
                                            <input type="text" v-model="title" @keyup="searchTitle" placeholder="Search By Title" class="form-control">
                                    </div>
                        </div>




                <div class="table-responsive">
                    <table class="table display data-table text-nowrap" id="tableid">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input checkAll">
                                        <label class="form-check-label">SL</label>
                                    </div>
                                </th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

<tr v-if="looding">
    <td colspan="6" style="    text-align: center;
    background: #042954;
    color: wheat;">Looding...</td>
</tr>

                            <tr v-else v-for="(gallery, index) in gallerys.data">
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">{{ index+1 }}</label>
                                    </div>
                                </td>
                                <td>{{ gallery.title }}</td>
                                <td>
                                    <router-link  :to="{name:'galleryscategory', params:{category:gallery.category}}">{{ gallery.category }}</router-link>
                                </td>
                                <td><img width="70px" :src="'/'+JSON.parse(gallery.image)[0]" alt="">

                                </td>
                                <td>
                                   <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    <router-link class="dropdown-item" :to="{name:'gallerysView',params:{id:gallery.id}}"><i class="fas fa-eye"></i> View All</router-link>
                                    <router-link class="dropdown-item" :to="{name:'galleryEdit',params:{id:gallery.id}}"><i class="fas fa-cogs"></i> Edit</router-link>
                                    <span @click="actionclick(gallery.id)" class="dropdown-item" ><i class="fas fa-trash-alt fa-fw"></i> Delete</span>



                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination :data="gallerys" v-bind:showDisabled="true" :limit="3" v-on:change-page="galleryfun"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {
       this.school_id = getschoolid
    },
    data() {
        return {
            gallerys: {},
            school_id: '',
            searchtype:"",
            title:"",
            action:"",
            looding:true,
        }
    },
    methods: {
        galleryfun(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
//   axios.get(`/api/gallery?page=${page}&filter[school_id]=${this.school_id}&filter[title]=${this.title}&filter[category]=${this.$route.params.category}
 this.timeout = setTimeout( ()=> {
            axios.get(`/api/gallery?page=${page}&filter[school_id]=${this.school_id}&filter[title]=${this.title}&filter[category]=${this.$route.params.category}`)
                .then(({ data }) => {
                    this.gallerys = data;
                   if(data.data.length<3){
                        document.getElementById('tableid').classList.add('minheight');
                    }else{
                        document.getElementById('tableid').classList.remove('minheight');

                    }
                    // console.log(data)
                    // console.log(data[0].school_id)
                    // this.school_id = data[0].school_id
                    this.looding =false
                })
                .catch()
                  }, 300);
        },


        searchTitle(){
            // this.searchtype = "filtertitle";
            this.galleryfun()
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
					axios.get(`/api/gallery/delete/${id}`)
						 .then(({data}) => {
                             this.galleryfun();

                            Notification.customsucess(`Your data has been ${this.action}.`);

						 })
						 .catch(() => {
						 	// this.$router.push({name: 'supplier'})
						 })


				}
			})
		}
    },
    mounted() {
        this.category = this.$route.params.category;

            this.galleryfun();


    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
