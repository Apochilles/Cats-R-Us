<script setup>
import { useRoute } from "vue-router";
import useCats from "../../composables/cats";
import { onMounted } from "vue";
import { useAuth0 } from "@auth0/auth0-vue";

const { cat, getCat, errors, adoptCat } = useCats();

const props = defineProps({
    id: {
        type: String,
    },
});

onMounted(() => getCat(props.id));
const { user } = useAuth0();

console.log(cat);
</script>
<template>
    <div class="container mx-auto mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem">
                    <img :src="'/public/cats/' + cat.image" />

                    <div class="card-body">
                        <h5 class="card-title">{{ cat.name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text">
                            Description: {{ cat.description }}
                        </p>
                        <p class="card-text">Gender: {{ cat.gender }}</p>
                        <p class="card-text">FIV status: {{ cat.fiv }}</p>
                        <p class="card-text">
                            {{ cat.sex }}
                        </p>
                        <p class="card-text"></p>
                        <p class="card-text">
                            Temperament: {{ cat.temperament }}
                        </p>
                        <p class="card-text">Size: {{ cat.size }}</p>
                        <a href="#" class="btn mr-2"
                            ><i class="fas fa-link"></i> Enquire</a
                        >
                    </div>
                    <button
                        v-if="cat.status === 'available'"
                        @click="adoptCat($route.params.id, user.sub)"
                    >
                        Adopt
                    </button>
                    <button>
                        <RouterLink class="nav-link active" to="/listings"
                            >Back to listings</RouterLink
                        >
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
