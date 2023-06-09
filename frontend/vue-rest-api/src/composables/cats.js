import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import { useAuth0 } from "@auth0/auth0-vue";

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/";

export default function useCats() {
    const cats = ref([]);
    const catPage = ref([]);
    const cat = ref([]);
    const errors = ref([]);
    const filteredCats = ref();
    const router = useRouter();
    const isLoading = ref(false);

    const { getAccessTokenSilently } = useAuth0();

    const getFilteredCats = async (queries) => {
        const response = await axios.get(
            `http://127.0.0.1:8000/api/v1/cats?${new URLSearchParams(
                queries.value
            ).toString()}`
        );
        filteredCats.value = response.data;
        console.log("object return");
        console.log(response);
    };

    const getMyCats = async () => {
        const token = await getAccessTokenSilently();
        const response = await axios.get("mycats", {
            headers: {
                Authorization: "Bearer " + token,
            },
        });
        cats.value = response.data;
        console.log(cats.value);
    };
    const getMyCat = async (id) => {
        isLoading.value = true;

        const token = await getAccessTokenSilently();
        try {
            const response = await axios.get("mycats/" + id, {
                headers: {
                    Authorization: "Bearer " + token,
                },
            });
            console.log(cat);
            cat.value = response.data.data;
        } catch (error) {
            if (error.response.status === 404) {
                errors.value = error.response.data.errors;
                await router.push({ name: "CatIndex" });
            }
        } finally {
            isLoading.value = false;
        }
    };

    const getCat = async (id) => {
        const response = await axios.get("cats/" + id);
        cat.value = response.data.data;
    };
    const storeCat = async (data) => {
        try {
            await axios.post("cats", data);
            await router.push({ name: "CatIndex" });
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
                console.log(error);
            }
        }
    };

    const adoptCat = async (id, user_id) => {
        try {
            await axios.put("cats/" + id + cat.value, {
                ...cat.value,
                adopted_by: user_id,
                status: "adopted",
            });

            await router.push({ name: "CatIndex" });
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    };

    const updateCat = async (id) => {
        try {
            await axios.put("cats/" + id, cat.value);
            await router.push({ name: "CatIndex" });
        } catch (error) {
            if (error.response.status === 42) {
                errors.value = error.response.data.errors;
            }
        }
    };

    const deleteCat = async (id) => {
        if (!window.confirm("Are you sure?")) {
            return;
        }
        await axios.delete("cats/" + id);
        await getCats();
    };

    return {
        adoptCat,
        cat,
        cats,
        catPage,
        getCat,
        getMyCat,
        getFilteredCats,
        getMyCats,
        filteredCats,
        storeCat,
        updateCat,
        deleteCat,
        errors,
        isLoading,
    };
}
