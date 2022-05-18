import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useProducts() {
    const products = ref([])
    const product = ref([])
    const router = useRouter()
    const errors = ref('')

    const getProducts = async () => {
        let response = await axios.get('/products')
        products.value = response.data.data;
    }

    const getProduct = async (id) => {
        let response = await axios.get('/products/' + id)
        product.value = response.data.data;
    
    }

    return {
        product,
        products,
        errors,
        getProducts,
        getProduct
    }
}
