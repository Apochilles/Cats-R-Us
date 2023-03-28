<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <RouterLink class="nav-link active" to="/cats"
                        >Index</RouterLink
                    >
                </li>
                <li class="nav-item">
                    <RouterLink class="nav-link active" to="/cats/create"
                        >Create</RouterLink
                    >
                </li>
                <li class="nav-item">
                    <RouterLink class="nav-link active" to="/cats/:id/edit"
                        >Edit</RouterLink
                    >
                </li>
                <li class="nav-item">
                    <RouterLink class="nav-link active" to="/cats/:id/delete"
                        >Delete</RouterLink
                    >
                </li>
            </ul>
        </div>
    </nav>
    <RouterView />
</template>
