import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";

import { createApp } from "vue";
import App from "./App.vue";
import "./assets/main.css";
import store from "./store";
import router from "./router";

import "./assets/main.css";

const app = createApp(App);

app.use(router).use(store);

app.mount("#app");
