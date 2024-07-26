<template>
    <v-btn @click="createProduct()">FROM PRODUCT</v-btn>

    <v-dialog v-model="dialog" width="auto">
        <v-card min-width="700" class="bg-white font-weight-bold pa-8">
            <v-card-title class="font-weight-bold text-h5 text-center">
                <v-icon icon="mdi-update"></v-icon>
                ADD NEW PRODUCT</v-card-title>
            <v-divider></v-divider>
            <v-card-text class="d-flex" style="gap: 20px">
                <div class="w-100">
                    <h4>Preview</h4>

                </div>
                <div class="w-100 text-right">
                    <form @submit.prevent>
                        <h4>Preview</h4>
                        <v-img v-if="imageUrl" :src="entity.imageUrl"
                            style="border: 1px dashed #ccc; min-height: 250px; margin-bottom: 1em;" />
                        <input type="file" label="Upload license" hint="Add a picture of youre license" outlined dense
                            @change="onFileChange($event.target.files[0])" class="mb-5" />
                        <v-text-field v-model="entity.code" variant="outlined" label="Product Code" required></v-text-field>
                        <v-text-field v-model="entity.name" variant="outlined" label="Name" required></v-text-field>
                        <v-text-field type="number" v-model="entity.price" variant="outlined" label="Price" required></v-text-field>
                        <v-select v-model="entity.category_id" :items="categories" item-title="title" item-value="id" variant="outlined"
                            label="Category" required></v-select>
                        <v-select v-model="entity.store_id" :items="stores" item-title="title" variant="outlined" item-value="id"
                            label="Store" required></v-select>
                        <div class="w-100">
                            <v-btn class="bg-green text-h5" size="x-large" text="Save" width="130" @click="submit()"
                                style="text-align: center;"></v-btn>
                        </div>
                    </form>
                </div>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>


<script setup>
import Swal from "sweetalert2";
import api from "@/helpers/api";


let categories = ref([]);
let stores = ref([]);
let entity = ref({
    code: '1234',
    name: 'Bobobot',
    price: 1234,
    qty: 10,
    image: 'avocado.jpg',
    category_id: 1,
    store_id: 1,
});

// let update_entity = ref({
//     code: '1234',
//     name: 'Bobobot',
//     price: 1234,
//     qty: 10,
//     image: 'avocado.jpg',
//     category_id: 1,
//     store_id: 1,
// });



let dialog = ref(false);

let emit = defineEmits(['product-created'])

onMounted(refresh);
defineExpose({
    create,
    edit
});

function create() {
    dialog.value = true;
    entity.value = {
        code: '1234',
        name: 'Bobobot',
        price: 1234,
        qty: 10,
        image: 'avocado.jpg',
        category_id: 1,
        store_id: 1,
    };
}
async function edit(product_id) {
    dialog.value = true;
    let response = await api.product.getById(product_id);
    entity.value = response.data;

    console.log(entity.value);
    entity.value.store_id = response.data.store.id;
    // entity.value.category_id = response.data.category.title;
    // console.log(response.data.category.title);

}
async function refresh() {
    categories.value = (await (api.category.get())).data;
    stores.value = (await (api.store.get())).data;
    emit('product-created');
}

async function submit() {
    dialog.value = false;
    if(entity.value.id) {
        Swal.fire({
        title: "Success",
        text: "Product updated successfully",
        icon: "success",
        confirmButtonColor: "#53b257",
        confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                api.product.update(entity.value.id, entity.value);
                refresh();
            }
        })
    }else{
        Swal.fire({
        title: "Success",
        text: "Product created successfully",
        icon: "success",
        confirmButtonColor: "#53b257",
        confirmButtonText: "OK",
    }).then((result) => {
        if (result.isConfirmed) {
            api.product.create(entity.value);
            refresh();
        }
    })
    }
}
</script>

<style>


</style>