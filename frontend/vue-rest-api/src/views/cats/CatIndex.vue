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

const computedProducts = computed(() => {
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
    <div class="container mx-auto mt-4">
        <p><strong>Keyword:</strong><input type="text" v-model="keyword" /></p>

        <p>
            <strong>Gender:</strong> Male:
            <input type="checkbox" v-model="genders" value="male" /> Female:
            <input type="checkbox" v-model="genders" value="female" />
        </p>

        <p>
            <strong>Sizes:</strong> Small:
            <input type="checkbox" v-model="sizes" value="small" />
            Medium:
            <input type="checkbox" v-model="sizes" value="medium" />
            Large:
            <input type="checkbox" v-model="sizes" value="large" />
        </p>
        <p>
            <strong>Temperament:</strong> Quiet:
            <input type="checkbox" v-model="temperaments" value="quiet" />
            Medium:
            <input type="checkbox" v-model="temperaments" value="" />
            Big:
            <input type="checkbox" v-model="temperaments" value="big" />
        </p>
        <p>
            <strong>Colour:</strong> Grey:
            <input type="checkbox" v-model="colours" value="grey" />
            Orange:
            <input type="checkbox" v-model="colours" value="orange" />
            Black:
            <input type="checkbox" v-model="colours" value="black" />
        </p>
        <p>
            <strong>Fiv:</strong> Positive:
            <input type="checkbox" v-model="fivStatus" value="positive" />
            Negative:
            <input type="checkbox" v-model="fivStatus" value="negative" />
        </p>
        <div class="main"></div>
        <div class="row">
            <!-- <div class="col-md-4" v-for="(fcats, i) in filteredCat" :key="i"> -->
            <div
                class="col-md-4"
                v-for="(cat, index) in computedProducts"
                :key="index"
            >
                <!-- <router-link
                    style="text-decoration: none; color: inherit"
                    :to="{
                        name: 'CatView',
                        params: {
                            id: cats.id,
                        },
                    }"
                > -->
                <div class="card" style="width: 18rem">
                    <img :src="cat.image" />

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
                        <a href="#" class="btn mr-2"
                            ><i class="fas fa-link"></i> Visit Site</a
                        >
                        <a href="#" class="btn"
                            ><i class="fab fa-github"></i> Github</a
                        >
                    </div>
                </div>
                <!-- </router-link> -->
            </div>
        </div>
    </div>
</template>
