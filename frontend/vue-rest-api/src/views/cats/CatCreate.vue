<script setup>
import { reactive } from "vue";
import useCats from "../../composables/cats";

const { storeCat, errors } = useCats();

const form = reactive({
    name: "",
    slug: "",
    gender: "",
    description: "",
    fiv: "",
    temperament: "",
    size: "",
    image: "",
});
console.log(errors);
</script>
<template>
    <div>
        <form @submit.prevent="storeCat(form)">
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    v-model="form.name"
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
                    v-model="form.slug"
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
                <select v-model="form.fiv" class="form-control" id="fiv">
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
                <select v-model="form.gender" class="form-control" id="gender">
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
                    v-model="form.description"
                    class="form-control"
                    id="description"
                    rows="3"
                ></textarea>
                <div v-if="errors.name">
                    <span> {{ errors.description[0] }} </span>
                </div>
            </div>
            <div class="form-group">
                <label for="temperament">temperament</label>
                <select
                    v-model="form.temperament"
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
                <select v-model="form.size" class="form-control" id="size">
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
                    v-model="form.image"
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
