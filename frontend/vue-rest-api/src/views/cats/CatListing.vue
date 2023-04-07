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
const data = ref();
const queries = ref({
    "filter[gender]": [],
    "filter[size]": [],
    "filter[fiv]": [],
    "filter[fur]": [],
    "filter[temperament]": [],

    page: 1,
    perPage: 15,
    ...useRoute().query,
});

watch(
    queries,
    async () => {
        useRouter().push({ query: queries.value });

        const res = await fetch(
            `http://127.0.0.1:8000/api/v1/cats?${new URLSearchParams(
                queries.value
            ).toString()}`
        );
        const response = await res.json();
        data.value = response;
        console.log("object return");
        console.log(cats);
        // useRouter().push({ query: queries.value });
    },
    {
        // must pass deep option to watch for changes on object properties
        deep: true,
        // can also pass immediate to handle that first request AND when queries change
        immediate: true,
    }
);
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
                    <input
                        type="checkbox"
                        v-model="queries['filter[gender]']"
                        value="male"
                    />
                    Female:
                    <input
                        type="checkbox"
                        v-model="queries['filter[gender]']"
                        value="female"
                    />
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
                        v-for="cat in data.data"
                        :key="cat.id"
                    >
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
                                <h6 class="card-subtitle mb-2 text-muted">
                                    {{ cat.sex }} {{ cat.colour }}
                                    {{ cat.temperament }}
                                    {{ cat.gender }}
                                    {{ cat.size }}
                                    {{ cat.fiv }}
                                </h6>
                                <p class="card-text">
                                    <!-- {{ cat.description }} -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Bootstrap5Pagination
                :data="data"
                @pagination-change-page="queries.page = $event"
            />
        </div>
    </div>
</template>
