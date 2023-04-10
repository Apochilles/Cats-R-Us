<script setup>
import useCats from "../../composables/cats";

import { onMounted, computed, reactive } from "vue";
import { ref } from "vue";

// const { cats, getCats } = useCats();

// onMounted(() => getCats());
// console.log(cats);
// const catCount = computed(() => {
//     return cats.value.length;
// });
</script>
<template>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta
                name="viewport"
                content="width=device-width, initial-scale=1, shrink-to-fit=no"
            />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Shop Homepage - Start Bootstrap Template</title>
            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
            <!-- Bootstrap icons-->
            <link
                href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
                rel="stylesheet"
            />
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="css/styles.css" rel="stylesheet" />
        </head>
        <body>
            <!-- Header-->
            <header class="py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div id="show_bg_2"></div>

                    <div class="text-center text-black">
                        <h1 class="display-4 fw-bolder">
                            Find your new FURever Friend
                        </h1>
                        <p class="lead fw-normal text-white-50 mb-0">
                            With this shop hompeage template
                        </p>
                    </div>
                </div>
            </header>
            <div>
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-black">
                        <div class="display-4 fw-bolder">
                            <p class="lead">
                                Search {{ catCount }} adoptable cats from rescue
                                groups, shelters, and pounds across the nation!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section-->
            <section class="py-5"></section>
            <!-- Footer-->
            <footer class="py-5 bg-dark">
                <div class="container">
                    <p class="m-0 text-center text-white">
                        Copyright &copy; Your Website 2023
                    </p>
                </div>
            </footer>
        </body>
    </html>
</template>
