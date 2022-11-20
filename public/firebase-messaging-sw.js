importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

var firebaseConfig = {
  apiKey: "AIzaSyD_k0gk3nJNbiZm3xF4wSD1nMIT5jBDzDE",    authDomain: "webpush2-cc9ed.firebaseapp.com",    projectId: "webpush2-cc9ed",    storageBucket: "webpush2-cc9ed.appspot.com",    messagingSenderId: "16480631991",    appId: "1:16480631991:web:db0e4adbad0ce8e475e132",    measurementId: "G-DS86HSG4Y5"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});


   
