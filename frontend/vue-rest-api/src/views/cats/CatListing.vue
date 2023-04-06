<script setup>
import useCats from "../../composables/cats";
import { useRouter, useRoute } from "vue-router";
import { onMounted, computed, reactive, watch } from "vue";
import { ref } from "vue";
import { Bootstrap5Pagination } from "laravel-vue-pagination";

const { cats, getCats, list, catPage } = useCats();

// onMounted(() => getCats());
// onMounted(() => list());
console.log("hello");
console.log(catPage);

const keyword = ref("");
const genders = ref([]);
const sizes = ref([]);
const fivStatus = ref([]);
const colours = ref([]);
const temperaments = ref([]);
const fur = ref([]);

const queries = ref({
    "filter[name]": "",
    page: 1,
    perPage: 15,
    ...useRoute().query,
});

const data = ref();
watch(
    queries,
    async () => {
        useRouter().push({ query: queries.value });

        const res = await fetch(
            `http://127.0.0.1:8000/api/v1/cats?${new URLSearchParams(
                queries.value
            ).toString()}`
        );

        data.value = await res.json();
        console.log(data);
        useRouter().push({ query: queries.value });
    },
    {
        // must pass deep option to watch for changes on object properties
        deep: true,
        // can also pass immediate to handle that first request AND when queries change
        immediate: true,
    }
);

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

// const computedCats = computed(() => {
//     return cats.value.filter((cat) => {
//         return (
//             (keyword.value.length === 0 || cat.name.includes(keyword.value)) &&
//             (genders.value.length === 0 ||
//                 genders.value.includes(cat.gender)) &&
//             (sizes.value.length === 0 || sizes.value.includes(cat.size)) &&
//             (fivStatus.value.length === 0 ||
//                 fivStatus.value.includes(cat.fiv)) &&
//             (temperaments.value.length === 0 ||
//                 temperaments.value.includes(cat.temperament)) &&
//             (colours.value.length === 0 ||
//                 colours.value.includes(cat.colour)) &&
//             (fur.value.length === 0 || fur.value.includes(cat.fur))
//         );
//     });
// });
</script>
<template>
    <div class="container" :class="{ loading: loading }">
        <input
            type="search"
            placeholder="Search Posts by Title"
            v-model.lazy="queries['filter[name]']"
        />
        <div class="row">
            <div class="col-lg-3 mb-4">
                <h1 class="mt-4">Filters</h1>

                <h3 class="mt-2">Gender</h3>
                <div class="form-check">
                    Male:
                    <input type="checkbox" v-model="genders" value="male" />
                    Female:
                    <input type="checkbox" v-model="genders" value="female" />
                </div>

                <h3 class="mt-2">Size</h3>
                <div class="form-check">
                    Small:
                    <input type="checkbox" v-model="sizes" value="small" />
                    Medium:
                    <input type="checkbox" v-model="sizes" value="medium" />
                    Large:
                    <input type="checkbox" v-model="sizes" value="large" />
                </div>
                <h3 class="mt-2">FIV</h3>
                <div class="form-check">
                    Positive:
                    <input
                        type="checkbox"
                        v-model="fivStatus"
                        value="positive"
                    />
                    Negative:
                    <input
                        type="checkbox"
                        v-model="fivStatus"
                        value="negative"
                    />
                </div>
                <h3 class="mt-2">Fur</h3>
                <div class="form-check">
                    Short:
                    <input type="checkbox" v-model="fur" value="short" />
                    Long:
                    <input type="checkbox" v-model="fur" value="long" />
                </div>
                <h3 class="mt-2">Temperament</h3>
                <div class="form-check">
                    Shy:
                    <input type="checkbox" v-model="temperaments" value="shy" />
                    Average:
                    <input
                        type="checkbox"
                        v-model="temperaments"
                        value="average"
                    />
                    Confident:
                    <input
                        type="checkbox"
                        v-model="temperaments"
                        value="confident"
                    />
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row mt-4">
                    <div
                        class="col-lg-4 col-md-6 mb-4"
                        v-for="cat in data.value"
                        :key="index"
                    >
                        <div class="row mt-4">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <a href="#">
                                        <img
                                            class="card-img-top"
                                            src="http://placehold.it/700x400"
                                            alt=""
                                        />
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ cat.name }}
                                        </h5>
                                        <h6
                                            class="card-subtitle mb-2 text-muted"
                                        >
                                            {{ cat.sex }} {{ cat.colour }}
                                            {{ cat.temperament }}
                                            {{ cat.gender }}
                                            {{ cat.size }}
                                            {{ cat.fiv }}
                                        </h6>
                                        <p class="card-text">
                                            {{ cat.description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <Bootstrap5Pagination
                                :data="data.value"
                                @pagination-change-page="queries.page = $event"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
