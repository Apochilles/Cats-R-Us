<script setup>
import useCats from "../../composables/cats";
import { onMounted } from "vue";

const { cats, getCats } = useCats();

onMounted(() => getCats());

/// now I have received the getCats function I need to take that object and filter by attributes
</script>
<template>
    <RouterLink :to="{ name: 'CatCreate' }">new Cat</RouterLink>
    <div class="card-group">
        <div
            class="list-group"
            v-for="cat in cats"
            :key="cat.id"
            style="width: 18rem"
        >
            <img :src="cat.image" />
            <div class="card-body">
                <h1 class="card-title">{{ cat.name }}</h1>
                <p class="card-text">{{ cat.description }}</p>
                <ul>
                    <li class="list-group-item">Fiv status: {{ cat.fiv }}</li>
                    <li class="list-group-item">Gender: {{ cat.gender }}</li>
                    <li class="list-group-item">Colour: {{ cat.colour }}</li>
                    <li class="list-group-item">
                        Temperament: {{ cat.temperament }}
                    </li>
                    <li class="list-group-item">Size: {{ cat.size }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>
