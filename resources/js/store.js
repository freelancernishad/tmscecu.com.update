import Vue from "vue";
import Vuex from 'vuex';
Vue.use(Vuex)



const store = new Vuex.Store({
    state:{
        // bookList:['Book 1','Book 2','Book 3','Book 4']
        Users:{},
        userPermission:{},
        userRoles:{},
        Classes:{},
        schooldd:{},

    },// as like data(){return:{}}
    mutations:{
        // ADD_BOOK(state,data){
        //     state.bookList.push(data)
        // },
        // //method 2 direct call
        // REMOVE_BOOK(state,index){
        //     state.bookList.splice(index,1)

        // }



       async setUpdateUser(state,data){
            state.Users = data

        },
       async setschoolinfo(state,data){

            state.schooldd = data

        },
       async setUpdateClasses(state,data){
            state.Classes = data

        },


        setUserPermission(state,data){
            state.userPermission = data
        },


        setUserRoles(state,data){
            state.userRoles = data
        },




    },
    getters:{

        getUpdateUser(state){
            return state.Users
        },

        getschoolinfo(state){
            return state.schooldd
        },

        getUpdateClasses(state){
            return state.Classes
        },

        getUserPermission(state){
            return state.userPermission
        },

        getUserRoles(state){
            return state.userRoles
        },



        // totalBook(state){
        //     return state.bookList.length;
        // }

    },// as like computed:{}
    actions:{


            Fb_Parse(){
                setTimeout(() => {
                    // console.log(window.FB.XFBML.parse())
                    window.FB.XFBML.parse()


                    // window.fbAsyncInit = function() {
                    //     FB.init({
                    //       xfbml            : true,
                    //       version          : 'API-VERSION'
                    //     });
                    //   };

                },2000);

        },

        // as like methods:{}
        //method 1
        // addBook(content,data){
        //     content.commit('ADD_BOOK',data)
        // }
         //method 2
        // addBook({commit},data){
        //     commit('ADD_BOOK',data)
        // },
        //  removeBook({commit},data){
        //     commit('REMOVE_BOOK',data)
        // }

        //  getUser({commit},data){
        //     commit('GET_USERS',data)
        // }




    },// as like methods:{}

});



export default store;
