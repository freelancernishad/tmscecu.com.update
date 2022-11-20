importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

var firebaseConfig = {
    apiKey: "AIzaSyCCJfC5ZGXbZKq4qMYYvNfEos1JOpHfx_k",
    authDomain: "localhost-16413.firebaseapp.com",
    projectId: "localhost-16413",
    storageBucket: "localhost-16413.appspot.com",
    messagingSenderId: "1066229040723",
    appId: "1:1066229040723:web:f80bda5df2a5ff581428a6",
    measurementId: "G-JN28H6BLC4"
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



