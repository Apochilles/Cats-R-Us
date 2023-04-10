<script setup>
import useCats from "../../composables/cats";
import { useRouter, useRoute } from "vue-router";
import { onMounted, computed, reactive, watch } from "vue";
import { ref } from "vue";
import { Bootstrap5Pagination } from "laravel-vue-pagination";
const { getMyCats, cats } = useCats();
onMounted(() => getMyCats());
</script>
<template>
    <div class="container" :class="{ loading: loading }">
        <div class="row">
            <div class="col-lg-3 mb-4"></div>
            <div class="col-lg-9">
                <div class="row mt-4">
                    <div
                        class="col-lg-4 col-md-6 mb-4"
                        v-for="cat in cats.data"
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
                        </router-link>
                    </div>
                </div>
            </div>
            <Bootstrap5Pagination
                :data="cats"
                @pagination-change-page="queries.page = $event"
            />
        </div>
    </div>
</template>
