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
const fur = ref([]);

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
            (colours.value.length === 0 ||
                colours.value.includes(cat.colour)) &&
            (fur.value.length === 0 || fur.value.includes(cat.fur))
        );
    });
});
</script>
<template>
    <div class="container" :class="{ loading: loading }">
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
                        v-for="(cat, index) in computedCats"
                        :key="index"
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
                                <h5 class="card-title">{{ cat.name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">
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
                </div>
            </div>
        </div>
    </div>
</template>
