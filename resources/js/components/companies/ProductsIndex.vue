<template>
    <div
        class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md"
    >
        <div class="flex place-content-end mb-4">
            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Search" aria-label="Full name" v-model="searchQuery" @keyup="searchedProducts($event.target.value)">
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                            >Name</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                            >Author</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                            >Details</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                            >Date</span
                        >
                    </th>
                   
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="item in products" :key="item.id">
                    <tr class="bg-white">
                        <td
                            class="px-6 py-4 text-center text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ item.name }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-center text-centerleading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ item.author.name }}
                        </td>
                        <td
                            class="px-6 text-center py-4 text-sm leading-5 text-center text-gray-900 whitespace-no-wrap"
                        >
                            {{ item.details }}
                        </td>
                        <td
                            class="px-6 py-4 text-center text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ new Date(item.created_at).toISOString().split("T")[0] }}
                        </td>
                       
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import useProducts from "../../composables/products";
import { onMounted, computed ,ref} from "vue";
import axios from "axios";

export default {
    setup() {
        const { products, getProducts } = useProducts();
        onMounted(getProducts());
    const searchQuery = ref("");
    const searchedProducts = async (value) => {
        console.log(value)
    let response = await axios.get('/search-products?search='+value)
       products.value = response.data.data;
    };
        return {
        products,
        searchQuery,
        searchedProducts
        };
    },
};
</script>
