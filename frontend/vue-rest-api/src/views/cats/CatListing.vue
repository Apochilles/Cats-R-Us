<script setup>
import useCats from "../../composables/cats";
import { useRouter, useRoute } from "vue-router";
import { onMounted, computed, reactive, watch } from "vue";
import { ref } from "vue";
import { Bootstrap5Pagination } from "laravel-vue-pagination";

const { cats, getFilteredCats, filteredCats, catPage } = useCats();

//
const filters = ref({
    gender: [],
    size: [],
    fiv: [],
    fur: [],
    temperament: [],
});

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
    filters,
    () => {
        queries.value["filter[gender]"] = filters.value["gender"];
        queries.value["filter[size]"] = filters.value["size"];
        queries.value["filter[fiv]"] = filters.value["fiv"];
        queries.value["filter[fur]"] = filters.value["fur"];
        queries.value["filter[temperament]"] = filters.value["temperament"];

        /// Filter changes here
        // Reset page if filter changes
        queries.value["page"] = 1;
    },
    {
        deep: true,
        immediate: true,
    }
);

watch(
    queries,
    () => {
        getFilteredCats(queries);
        useRouter().push({ query: queries.value });
    },

    {
        deep: true,
        immediate: true,
    }
);
console.log(filteredCats);
</script>
<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <h1 class="mt-4">Filters</h1>

                <h3 class="mt-2">Gender</h3>
                <div class="form-check">
                    Male:
                    <input
                        type="checkbox"
                        v-model="filters['gender']"
                        value="male"
                    />
                    Female:
                    <input
                        type="checkbox"
                        v-model="filters['gender']"
                        value="female"
                    />
                </div>

                <h3 class="mt-2">Size</h3>
                <div class="form-check">
                    Small:
                    <input
                        type="checkbox"
                        v-model="filters['size']"
                        value="small"
                    />
                    Medium:
                    <input
                        type="checkbox"
                        v-model="filters['size']"
                        value="medium"
                    />
                    Large:
                    <input
                        type="checkbox"
                        v-model="filters['size']"
                        value="large"
                    />
                </div>
                <h3 class="mt-2">FIV</h3>
                <div class="form-check">
                    Positive:
                    <input
                        type="checkbox"
                        v-model="filters['fiv']"
                        value="positive"
                    />
                    Negative:
                    <input
                        type="checkbox"
                        v-model="filters['fiv']"
                        value="negative"
                    />
                </div>
                <h3 class="mt-2">Fur</h3>
                <div class="form-check">
                    Short:
                    <input
                        type="checkbox"
                        v-model="filters['fur']"
                        value="short"
                    />
                    Long:
                    <input
                        type="checkbox"
                        v-model="filters['fur']"
                        value="long"
                    />
                </div>
                <h3 class="mt-2">Temperament</h3>
                <div class="form-check">
                    Shy:
                    <input
                        type="checkbox"
                        v-model="filters['temperament']"
                        value="shy"
                    />
                    Average:
                    <input
                        type="checkbox"
                        v-model="filters['temperament']"
                        value="average"
                    />
                    Confident:
                    <input
                        type="checkbox"
                        v-model="filters['temperament']"
                        value="confident"
                    />
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row mt-4">
                    <div
                        class="col-lg-4 col-md-6 mb-4"
                        v-for="cat in filteredCats.data"
                        v-if="filteredCats != null"
                        :key="cat.id"
                    >
                        <router-link
                            style="text-decoration: none; color: inherit"
                            :to="{
                                name: 'CatView',
                                params: {
                                    id: cat.id,
                                },
                            }"
                        >
                            <div class="card h-100">
                                <a href="#">
                                    <img
                                        class="card-img-top"
                                        :src="'public/cats/' + cat.image"
                                        alt=""
                                    />
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ cat.name }}
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        {{ cat.breed }} Cat
                                    </h6>
                                    <p class="card-text">
                                        {{ cat.description }}
                                    </p>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
            <div v-if="filteredCats != null">
                <Bootstrap5Pagination
                    :data="filteredCats"
                    @pagination-change-page="queries.page = $event"
                />
            </div>
        </div>
    </div>
</template>
