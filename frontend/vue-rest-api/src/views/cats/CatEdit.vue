<script setup>
import { onMounted, reactive } from "vue";
import useCats from "../../composables/cats";

const { cat, getCat, updateCat, errors } = useCats();

const props = defineProps({
    id: {
        required: true,
        type: String,
    },
});

onMounted(() => getCat(props.id));
</script>
<template>
    <div>
        <form @submit.prevent="updateCat($route.params.id)">
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    v-model="cat.name"
                    id="name"
                    class="form-control"
                    placeholder="Enter name"
                />
                <div v-if="errors.name">
                    <span> {{ errors.name[0] }} </span>
                </div>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input
                    type="text"
                    v-model="cat.slug"
                    id="slug"
                    class="form-control"
                    placeholder="Enter slug"
                />
                <div v-if="errors.name">
                    <span> {{ errors.slug[0] }} </span>
                </div>
            </div>
            <div class="form-group">
                <label for="fiv">FIV status</label>
                <select v-model="cat.fiv" class="form-control" id="fiv">
                    <option disabled value="">Please select one</option>
                    <option>positive</option>
                    <option>negative</option>
                </select>
                <div v-if="errors.name">
                    <span> {{ errors.fiv[0] }} </span>
                </div>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select v-model="cat.gender" class="form-control" id="gender">
                    <option>male</option>
                    <option>female</option>
                </select>
                <div v-if="errors.name">
                    <span> {{ errors.gender[0] }} </span>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    type="text"
                    v-model="cat.description"
                    class="form-control"
                    id="description"
                    rows="3"
                ></textarea>
                <div v-if="errors.name">
                    <span> {{ errors.description[0] }} </span>
                </div>
            </div>
            <div class="form-group">
                <label for="colour">Colour</label>
                <select v-model="cat.colour" class="form-control" id="colour">
                    <option>grey</option>
                    <option>orange</option>
                    <option>black</option>
                </select>
                <div v-if="errors.name">
                    <span> {{ errors.colour[0] }} </span>
                </div>
            </div>
            <div class="form-group">
                <label for="temperament">temperament</label>
                <select
                    v-model="cat.temperament"
                    class="form-control"
                    id="temperament"
                >
                    <option>quiet</option>
                    <option>medium</option>
                    <option>big</option>
                </select>
                <div v-if="errors.name">
                    <span> {{ errors.temperament[0] }} </span>
                </div>
            </div>
            <div class="form-group">
                <label for="size">size</label>
                <select v-model="cat.size" class="form-control" id="size">
                    <option>small</option>
                    <option>medium</option>
                    <option>large</option>
                </select>
                <div v-if="errors.name">
                    <span> {{ errors.size[0] }} </span>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input
                    type="text"
                    v-model="cat.image"
                    class="form-control"
                    id="image"
                    aria-describedby="imageHelp"
                />
                <div v-if="errors.name">
                    <span> {{ errors.image[0] }} </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
