<script setup>
import useCats from "../../composables/cats";
import { onMounted } from "vue";

const { cats, getCats } = useCats();

onMounted(() => getCats());
/// now I have received the getCats function I need to take that object and filter by attributes
</script>
<template>
    <div class="container mx-auto mt-4">
        <div class="row">
            <div class="col-md-4" v-for="cat in cats" :key="cat.id">
                <router-link
                    style="text-decoration: none; color: inherit"
                    :to="{
                        name: 'CatView',
                        params: {
                            id: cat.id,
                        },
                    }"
                >
                    <div class="card" style="width: 18rem">
                        <img :src="cat.image" />

                        <div class="card-body">
                            <h5 class="card-title">{{ cat.name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ cat.sex }} {{ cat.colour }}
                                {{ cat.temperament }}
                                {{ cat.gender }}
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
                </router-link>
            </div>
        </div>
    </div>
</template>
