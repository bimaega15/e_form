import _ from "lodash";
import { initializeApp } from "firebase/app";
import { getMessaging, getToken, onMessage } from "firebase/messaging";
import axios from "axios";
import Alpine from "alpinejs";


Alpine.start();

const firebaseConfig = {
    apiKey: "AIzaSyB-8Z79mr2iyxsHqiYBQ9_DFF8RZKqnwXU",
    authDomain: "eform-3c473.firebaseapp.com",
    projectId: "eform-3c473",
    storageBucket: "eform-3c473.appspot.com",
    messagingSenderId: "1022309641206",
    appId: "1:1022309641206:web:fb2d1f58e202cce39a75d7"

};
const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);
const vapidKey = import.meta.env.VITE_VAPID_KEY;

function requestPermission() {
    Notification.requestPermission().then((permission) => {
        if (permission === "granted") {
            const getTokenStorage = localStorage.getItem("fcmToken");
            console.log("Notification permission granted.");
            if (!getTokenStorage) {
                getToken(messaging, { vapidKey: vapidKey }).then((currentToken) => {
                    console.log("Token received: ", currentToken);
                    window.localStorage.setItem("fcmToken", currentToken);
                    axios.post("/firebase/saveToken", {
                        fcmToken: currentToken,
                    }).then((response) => {
                        console.log("Token saved to database.");
                        console.log(response);
                    }).catch((err) => {
                        console.log("Unable to save token to database.", err);
                    });
                }).catch((err) => {
                    console.log('An error occurred while retrieving token. ', err);
                });
            }

        } else {
            console.log("Unable to get permission to notify.");
        }
    });
}

navigator.serviceWorker.register('/firebase-messaging-sw.js')
    .then((registration) => {
        requestPermission();
    });

window._ = _;
window.Alpine = Alpine
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.onMessage = onMessage;
window.messaging = messaging;