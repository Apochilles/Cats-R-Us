<script setup>
import { RouterLink, RouterView } from "vue-router";
import { useAuth0 } from "@auth0/auth0-vue";

const { loginWithRedirect, user, isAuthenticated } = useAuth0();

function login() {
    loginWithRedirect();
}
console.log({
    loginWithRedirect,
    user,
    isAuthenticated,
});
</script>

<template>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand">CATS R US</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <RouterLink class="nav-link active" to="/"
                            >Home</RouterLink
                        >
                    </li>

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            id="navbarDropdown"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            >Cats</a
                        >
                        <ul
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdown"
                        >
                            <li class="dropdown-item">
                                <RouterLink
                                    class="nav-link active"
                                    to="/listings"
                                    >Listings</RouterLink
                                >
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                                <a class="dropdown-item" href="#!"
                                    >Popular Items</a
                                >
                            </li>
                            <li>
                                <a class="dropdown-item" href="#!"
                                    >New Arrivals</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link active" to="/cats/create"
                            >Create</RouterLink
                        >
                    </li>
                </ul>
                <div v-if="!isAuthenticated">
                    <button @click="login">Log in</button>
                </div>
                <pre v-if="isAuthenticated">
        <code>{{ user.name }}</code>
      </pre>
            </div>
        </div>
    </nav>
    <RouterView />
</template>
