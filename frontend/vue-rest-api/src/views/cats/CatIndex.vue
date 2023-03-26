<script setup>
import useCats from "../../composables/cats";
import { onMounted } from "vue";

const { cats, getCats } = useCats();

onMounted(() => getCats());
</script>
<template>
    <ul class="list-group" v-for="cat in cats" :key="cat.id">
        <li>{{ cat.name }}</li>
        <li>{{ cat.fiv }}</li>
        <li>{{ cat.gender }}</li>
        <li>{{ cat.description }}</li>
        <li>{{ cat.colour }}</li>
        <li>{{ cat.temperament }}</li>
        <li>{{ cat.size }}</li>
    </ul>
</template>
