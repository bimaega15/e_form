import _ from "lodash";
import { initializeApp } from "firebase/app";
import { getMessaging, getToken, onMessage } from "firebase/messaging";
import axios from "axios";
import Alpine from "alpinejs";


Alpine.start();

const firebaseConfig = {
<<<<<<< HEAD
    apiKey: "AIzaSyDn5upER3uAbzD6DzbCi1uvitbx5-Bz2XY",
    authDomain: "pushnotifikasi-d1aac.firebaseapp.com",
    projectId: "pushnotifikasi-d1aac",
    storageBucket: "pushnotifikasi-d1aac.appspot.com",
    messagingSenderId: "250243402116",
    appId: "1:250243402116:web:7d3529214fe97ebf9935d1",
    measurementId: "G-DWYD7H76S6"
=======
    apiKey: "AIzaSyB-8Z79mr2iyxsHqiYBQ9_DFF8RZKqnwXU",
    authDomain: "eform-3c473.firebaseapp.com",
    projectId: "eform-3c473",
    storageBucket: "eform-3c473.appspot.com",
    messagingSenderId: "1022309641206",
    appId: "1:1022309641206:web:fb2d1f58e202cce39a75d7"

>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
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
<<<<<<< HEAD
=======
                    console.log("Token received: ", currentToken);
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
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