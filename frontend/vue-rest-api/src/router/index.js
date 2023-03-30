import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/cats",
            name: "CatIndex",
            component: () => import("../views/cats/CatIndex.vue"),
        },
        {
            path: "/cat/:id",
            name: "CatView",
            component: () => import("../views/cats/CatView.vue"),
            props: true,
        },
        {
            path: "/cats/create",
            name: "CatCreate",
            component: () => import("../views/cats/CatCreate.vue"),
        },
        {
            path: "/cats/:id/edit",
            name: "CatEdit",
            component: () => import("../views/cats/CatEdit.vue"),
            props: true,
        },
        {
            path: "/cats/:id/delete",
            name: "CatDelete",
            component: () => import("../views/cats/CatDelete.vue"),
        },
    ],
});

export default router;
