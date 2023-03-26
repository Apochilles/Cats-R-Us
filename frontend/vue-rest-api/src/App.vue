<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
    <header>
        <div>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <RouterLink class="nav-link active" to="/"
                            >Home</RouterLink
                        >
                    </li>
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
                        <RouterLink
                            class="nav-link active"
                            to="/cats/:id/delete"
                            >Delete</RouterLink
                        >
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <RouterView />
</template>
