import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import { createAuth0 } from "@auth0/auth0-vue";

import { createApp } from "vue";
import App from "./App.vue";
import "./assets/main.css";
import router from "./router";

import "./assets/main.css";

const app = createApp(App);

app.use(router);
app.use(
    createAuth0({
        domain: "dev-dptl5xovb2uwweyh.us.auth0.com",
        clientId: "0hPChjUL0jXeVHZrPchlJBSgWc8B7Cau",
        authorizationParams: {
            redirect_uri: window.location.origin,
            audience: "http://127.0.0.1:8000",
        },
    })
);

app.mount("#app");
