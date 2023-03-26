import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/";

export default function useCats() {
    const cats = ref([]);
    const cat = ref([]);
    const errors = ref([]);
    const router = useRouter();

    const getCats = async () => {
        const response = await axios.get("cats");
        cats.value = response.data.data;
    };
    const getCat = async (id) => {
        const response = await axios.get("cats" + id);
        cat.value = response.data.data;
    };
    const storeCat = async (data) => {
        try {
            await axios.post("cats", data);
            await router.push({ name: "CatIndex" });
        } catch (error) {
            if (error.response.status === 422) {
                ErrorCodes.value = error.response.data.errors;
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
        cat,
        cats,
        getCat,
        getCats,
        storeCat,
        updateCat,
        deleteCat,
        errors,
    };
}