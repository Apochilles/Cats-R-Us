<script setup>
import useCats from "../../composables/cats";
import { onMounted } from "vue";

const { cats, getCats } = useCats();

onMounted(() => getCats());
</script>
<template>
    <div
        class="list-group"
        v-for="cat in cats"
        :key="cat.id"
        style="width: 18rem"
    >
        <img :src="cat.image" />
        <div class="card-body">
            <h5 class="card-title">{{ cat.name }}</h5>
            <p class="card-text">{{ cat.description }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            <ul>
                <li class="list-group-item">{{ cat.fiv }}</li>
                <li class="list-group-item">{{ cat.gender }}</li>
                <li class="list-group-item">{{ cat.colour }}</li>
                <li class="list-group-item">{{ cat.temperament }}</li>
                <li class="list-group-item">{{ cat.size }}</li>
            </ul>
        </div>
    </div>
</template>
