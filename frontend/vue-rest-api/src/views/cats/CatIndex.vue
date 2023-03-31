<script setup>
import useCats from "../../composables/cats";

import { onMounted, computed, reactive } from "vue";
import { ref } from "vue";

const { cats, getCats } = useCats();

onMounted(() => getCats());

const keyword = ref("");
const genders = ref([]);
const sizes = ref([]);
const fivStatus = ref([]);
const colours = ref([]);
const temperaments = ref([]);

// const filteredCat = computed(() => {
//     let filter = filterText.value;
//     if (!filter.length) return cats.value;

//     if (filter !== "") {
//         return cats.value.filter(
//             (fcats) =>
//                 fcats.name.toLowerCase().includes(filter.toLowerCase()) ||
//                 fcats.gender.toLowerCase().includes(filter.toLowerCase()) ||
//                 fcats.fiv.toLowerCase().includes(filter.toLowerCase()) ||
//                 fcats.colour.toLowerCase().includes(filter.toLowerCase())
//         );
//     }
// });

const computedCats = computed(() => {
    return cats.value.filter((cat) => {
        return (
            (keyword.value.length === 0 || cat.name.includes(keyword.value)) &&
            (genders.value.length === 0 ||
                genders.value.includes(cat.gender)) &&
            (sizes.value.length === 0 || sizes.value.includes(cat.size)) &&
            (fivStatus.value.length === 0 ||
                fivStatus.value.includes(cat.fiv)) &&
            (temperaments.value.length === 0 ||
                temperaments.value.includes(cat.temperament)) &&
            (colours.value.length === 0 || colours.value.includes(cat.colour))
        );
    });
});
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
            <!-- Section-->
            <section class="py-5">
                <div class="container px-4 px-lg-5 mt-5">
                    <div
                        class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
                    >
                        <!-- Product actions-->
                        <div
                            class="card-footer p-4 pt-0 border-top-0 bg-transparent"
                        ></div>
                    </div>
                </div>
            </section>
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
