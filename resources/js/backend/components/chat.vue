<template>
<div class="container mt-5">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <ul class="list-unstyled chat-list mt-2 mb-0">

                    <li class="clearfix"   v-for="user in users.data" @click="massenger(user.id,user.name)"  v-if="user.id!=usersid" >
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                        <div class="about">
                            <div class="name">{{ user.name }}</div>
                            <div class="status"> {{ user.role }} </div>
                            <!-- <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div> -->
                        </div>
                    </li>


                </ul>
            </div>
            <div class="chat">
                <div class="chat-header clearfix" v-if="form.conversion_id!=''">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">{{ name }} </h6>

                            </div>
                        </div>
                        <div class="col-lg-6 hidden-sm text-right">

                        </div>
                    </div>
                </div>
                <div class="chat-history">
                    <ul class="m-b-0" id="scrollingContainer" style="height: 60vh;
    overflow: auto;">



                        <li class="clearfix" v-for="message in messages">
                            <div class="message-data" :class="{'text-right' : message.from_id == usersid ? true : false }">
                                <span class="message-data-time">{{ dataformater(message.created_at) }}</span>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                            </div>
                            <div class="message other-message" :class="{'float-right  bg-primary text-white' : message.from_id == usersid ? true : false }"> {{ message.body }} </div>
                        </li>




                    </ul>
                </div>
                <div class="chat-message clearfix" v-if="form.conversion_id!=''">
                    <div class="input-group mb-0">

                        <div class="form-group d-flex" style="width:100%">
                        <input type="text" v-model="form.body" class="form-control" @keyup.enter="sentmessage" placeholder="Enter text here..."> <button class="btn btn-info" style="width: 60px;font-size: 20px;" @click="sentmessage"><i class="fas fa-paper-plane fa-fw"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</template>
<script>
export default {

    created() {
        this.ASSETURL = ASSETURL

         this.usersid = this.$localStorage.getItem('usersid');
        if (!User.loggedIn()) {
            // this.$router.push({ name: "/" });
             window.location.href ="/";
        }
    },

    data() {
        return {
      
            users:[],
            usersid:'',
            name:'',



            messages:{},
            form:{
            from_id:'',
            to_id:'',
            conversion_id:'',
            body:'',
            }
        }

    },

    methods: {


        dataformater(date){
           return  User.dateformat(date)[6];
        },


        sentmessage(){
                axios.post(`/api/message/sent`,this.form)
                .then(({ data }) => {

                  this.getmessages(data.conversion_id)
this.form.body = ''


                })
                .catch();
        },

        getallusers(){
                axios.get(`/api/users/get?filter[school_id]=${this.school_id}`)
                .then(({ data }) => {
                    this.users = data
                })
                .catch();
        },



        massenger(id,name){

            axios.get(`/api/conversion/get?filter[user_one]=${this.usersid}&filter[user_two]=${id}`)
                .then(({ data }) => {

this.name = name
this.form.from_id = this.usersid
this.form.to_id = id
if(Object.keys(data).length > 0){

this.form.conversion_id = data.id
    this.getmessages(data.id);
}else{

    this.form.conversion_id = 'new'
    this.messages = {}
}

                })
                .catch();

        },



        getmessages(id){
                       axios.get(`/api/messages/get?filter[conversion_id]=${id}`)
                .then(({ data }) => {

                        this.messages = data

                        const theElement = document.getElementById('scrollingContainer');
                        const scrollToBottom = (node) => {
                            node.scrollTop = node.scrollHeight;
                        }
                        scrollToBottom(theElement);


                })
                .catch();


        }







    },
   mounted() {
        this.getallusers();


// setInterval(() => {
//     if(this.form.conversion_id!=''){
//         if(this.form.conversion_id!=undefined){

//             this.getmessages(this.form.conversion_id)
//         }
//     }
// }, 1000);




    }
};





</script>
<style>
.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>
