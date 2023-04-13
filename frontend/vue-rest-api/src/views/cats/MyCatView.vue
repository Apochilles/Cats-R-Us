<script async setup>
import { useRoute } from "vue-router";
import useCats from "../../composables/cats";
import { onMounted } from "vue";
import { useAuth0 } from "@auth0/auth0-vue";

const { cat, getMyCat, errors, isLoading } = useCats();

const props = defineProps({
    id: {
        type: String,
    },
});
// const isLoading = ref(true);

onMounted(() => getMyCat(props.id));
console.log(isLoading);
const { user } = useAuth0();
</script>
<template>
    <p v-if="isLoading">Loading...</p>
    <div class="container mx-auto mt-4" v-if="!isLoading">
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

                    <button>
                        <RouterLink class="nav-link active" to="/mycats"
                            >Back to my cats</RouterLink
                        >
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
