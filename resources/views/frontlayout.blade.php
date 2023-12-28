<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ sitedetails()->meta_description }}">
    <meta name="keywords" content="{{ sitedetails()->meta_keywords }}">
    <meta name="author" content="{{ sitedetails()->meta_author }}">
    <title>:: {{ sitedetails()->SCHOLL_NAME }} :: {{ sitedetails()->SCHOLL_ADDRESS }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(sitedetails()->logo) }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?v-1.0.2') }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pro.min.css') }}">
     --}}

     <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.4.0/css/pro.min.css" />

    <script type="text/javascript" src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">

<style>
*{
    --defaultColor: <?php  echo $uniounDetials->defaultColor ?>;
}

div#exampleModal {
    z-index: 99999;
}
a.text-light.px-3.nav-link.router-link-exact-active.router-link-active {
    background: #803a85;
}
.serviceBox {
    cursor: pointer;

}
.serviceBox:hover {
  transform: scale(1.1);
  background: none !important;
  text-decoration: none !important;
  box-shadow: 0px 0px 17px -4px #000 !important;
}
a:hover {
  text-decoration: none !important;
}

.serviceBox {
  box-shadow: 0px 0px 15px -4px #000 !important;
  padding: 13px 4px;
  height: 120px !important;
  transition: all 0.4s;
}
</style>

<!-- <link type="text/css" href="{{ asset('slider/css/jquery.bbslider.css') }}" rel="stylesheet" media="screen"/> -->

<style type="text/css">

  .bbslider-wrapper.carousel {
    width: 1521px;
  }


.prev-control-wrapper.control-wrapper {
    display: none;
}

.next-control-wrapper.control-wrapper {
    display: none;
}
@media only screen and (max-width: 768px) {
    p.footerText {
    float: left !important;
    padding: 0px 0px 0 40px;
    margin-top: 18px;
    font-size: 13px !important;
}

p.help.text-right {
    display: flex;
    justify-content: flex-start !important;
    align-items: center;
    width: 100%;
    padding: 0 0 0 40px;
}


}

.middleHeaderItem.col-md-6.mb-3 {
    z-index: 1;
}

h1 {
    font-size: 32px !important;
}
h5 {
    font-size: 1.25rem !important;
}
.form-control {
    font-family: 'Kalpurush' !important;
}
.form-control {
    border: 1px solid #954913 !important;
    color: #954913 !important;
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ff0000 !important;
    outline: 0;
    box-shadow: 0 0 0 black !important;
}
.btn-info {
    color: #fff;
    background-color: #160089 !important;
    border-color: #160089 !important;
}
</style>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9489624253487221" crossorigin="anonymous"></script>



</head>

<body style="font-family: 'Kalpurush', sans-serif !important;">
    <div id="fb-root"></div>
    <div id="app">




        <component :is="$route.meta.layout || 'div'" :classes-list="{{ $classess }}" :school_detials="{{ $school_detials }}">
            <router-view />
          </component>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>


{{-- <script type="text/javascript" src="{{ asset('slider/js/jquery.bbslider.min.js') }}"></script> --}}

{{-- <script type="text/javascript">
  $(document).ready(function () {



    $('#auto').bbslider({auto: true, timer: 3000, controls: true, loop: true, pauseOnHit: false});




    $('#touch').bbslider({controls: false, touch: true, transition: 'slide', touchoffset: 50});

    $(window).resize(rsz);
    $(window).on('load', rsz);
  });
</script> --}}
{{-- <script src="assets/js/custom.js"></script> --}}





    <script src="{{ asset('js/frontend.js?ver=1.2.65') }}" async ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

<script>
    // function linkrun(linkdata){

    //     var link = document.createElement('link');
    //     link.setAttribute("rel", "stylesheet");
    //     link.setAttribute("type", "text/css");
    //     // link.onload = function(){ console.log('loaded'); }
    //     link.setAttribute("href", linkdata);
    //     document.getElementsByTagName("head")[0].appendChild(link);
    //     console.log('load')
    // }


    // linkrun('assets/css/pro.min.css');
    // linkrun('assets/css/style.css');


if ("{{ Auth::user() }}") {
    const storeToken = localStorage.getItem('token');


    if(!storeToken){

        let data = {'_token': "{{ csrf_token() }}"};
        fetch("/logout", {
  method: "POST",
  headers: {'Content-Type': 'application/json'},
  body: JSON.stringify(data)
}).then(res => {

});

        // axios.post('/logout').then(()=>{
        //     // window.location.href = '/'
        // })
    }


}else{
    // User.loggedOut()



		localStorage.removeItem('token')
		localStorage.removeItem('user')
		localStorage.removeItem('userid')
		localStorage.removeItem('role')
		localStorage.removeItem('position')




}

</script>



{{--


<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>
<script  type="text/javascript">
    var firebaseConfig = {
    apiKey: "AIzaSyD_k0gk3nJNbiZm3xF4wSD1nMIT5jBDzDE",
    authDomain: "webpush2-cc9ed.firebaseapp.com",
    projectId: "webpush2-cc9ed",
    storageBucket: "webpush2-cc9ed.appspot.com",
    messagingSenderId: "16480631991",
    appId: "1:16480631991:web:db0e4adbad0ce8e475e132",
    measurementId: "G-DS86HSG4Y5"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging=firebase.messaging();

    function IntitalizeFireBaseMessaging() {
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification Permission");

                return messaging.getToken();
            })
            .then(function (token) {
                console.log("Token : "+token);


			var myHeaders = new Headers();
			var requestOptions = {
			  method: 'GET',
			  headers: myHeaders,
			  redirect: 'follow'
			};
            // console.log(window.location.origin)
            var orgin = window.location.origin;
			fetch(orgin+"/api/set/notification?key="+token, requestOptions)
			  .then(response => response.text())
			  .then(result => console.log(result))
			  .catch(error => console.log('error', error));


               // document.getElementById("token").innerHTML=token;
            })
            .catch(function (reason) {
                console.log(reason);
            });
    }

    messaging.onMessage(function (payload) {
        console.log(payload);
        const notificationOption={
            body:payload.notification.body,
            icon:payload.notification.icon
        };

        if(Notification.permission==="granted"){
            var notification=new Notification(payload.notification.title,notificationOption);

            notification.onclick=function (ev) {
                ev.preventDefault();
                window.open(payload.notification.click_action,'_blank');
                notification.close();
            }
        }

    });
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newtoken) {
                console.log("New Token : "+ newtoken);
            })
            .catch(function (reason) {
                console.log(reason);
				//alert(reason);
            })
    })
    IntitalizeFireBaseMessaging();
</script>
 --}}
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1N11YCBZZX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1N11YCBZZX');
</script>

</body>
</html>
