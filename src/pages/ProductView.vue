<template>
  <v-app>
    <ProductForm @product-created="refresh()" ref="productForm"></ProductForm>
    <v-app-bar
      class="text-h5 d-flex"
      height="90"
      order="0"
      style="background: #253772"
    >
      <div class="" style="width: 250px">
        <div
          class="font-weight-black text-left ml-10"
          style="
            font-size: 2.5rem;
            color: #fff;
            width: 370px;
            word-spacing: 5.5px;
          "
        >
          KorPhil POS
        </div>
      </div>
    </v-app-bar>

    <v-navigation-drawer
      class="text-center"
      style="background: #fff"
      width="250"
      permanent
    >
      <div class="d-flex flex-column h-100 align-center py-10 foradmin">
        <div class="admin">
          <p class="title">Main Dashboard</p>
          <p class="text">Administrator</p>
        </div>

        <div class="buttons">
          <RouterLink
            to="/products"
            style="text-decoration: none; color: #253772"
          >
            <button class="active">
              <v-icon size="35" color="#fff" class="mr-2"
                >mdi-clipboard-list</v-icon
              >Product Details
            </button>
          </RouterLink>

          <RouterLink
            to="/category"
            style="text-decoration: none; color: #253772"
          >
            <button>
              <v-icon size="35" color="#253772" class="mr-2"
                >mdi-format-list-bulleted-square</v-icon
              >Category
            </button>
          </RouterLink>

          <RouterLink to="/sales" style="text-decoration: none; color: #253772">
            <button>
              <v-icon size="35" color="#253772" class="mr-2"
                >mdi-chart-line</v-icon
              >Sales/Order Mngt
            </button>
          </RouterLink>

          <RouterLink
            to="/reports"
            style="text-decoration: none; color: #253772"
          >
            <button>
              <v-icon size="35" color="#253772" class="mr-2"
                >mdi-file-clock</v-icon
              >Reports
            </button>
          </RouterLink>

          <!-- <button style="color: #253772;">
              <v-icon size="35" color="#253772" class="mr-2">mdi-cog</v-icon
              >Settings
            </button> -->
        </div>
        <v-btn class="w-75 bg-red" style="margin-top: 200px">Log Out</v-btn>
      </div>
    </v-navigation-drawer>

    <!-- TABLE DISPLAY -->
    <v-main class="d-flex main flex-column">
      <div class="topControls">
        <input type="text" placeholder="Search...." />
        <v-btn class="bg-blue-darken-4 mr-5" @click="refresh()" width="30">
          <v-icon size="28" color="#fff">mdi-refresh</v-icon>
        </v-btn>
        <v-btn class="bg-green" @click="productForm.create()">
          + Add New Item</v-btn
        >
      </div>

      <!-- <v-data-table :items="products"></v-data-table> -->

      <v-table theme="dark" class="w-100">
        <thead class="bg-blue-darken-4">
          <tr>
            <th class="text-left">Code</th>
            <th class="text-left">Name</th>
            <th class="text-left">Image</th>
            <th class="text-left">Price</th>
            <th class="text-left">Quantity</th>
            <th class="text-left">Category</th>
            <th class="text-left">Store</th>
            <th class="text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.name">
            <td>{{ product.code }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.image }}</td>
            <td>{{ product.price }}</td>
            <td>{{ product.qty }}</td>
            <td>{{ product.category.title }}</td>
            <td>{{ product.store.title }}</td>
            <td>
              <v-btn
                @click="productForm.edit(product.id)"
                class="bg-yellow-darken-4 text-white mx-2"
                >Edit</v-btn
              >
              <v-btn @click="deleteProduct(product)" class="bg-red"
                >Delete</v-btn
              >
            </td>
          </tr>
        </tbody>
      </v-table>

      <!-- <form
        @submit.prevent="submit2"
        method="POST"
        enctype="multipart/form-data"
        action="{{ route('product.store') }}"
      >
        <input type="file" @change="onChange" />
        <input
          style="background-color: blue; color: white; padding: 10px"
          type="submit"
          value="Upload"
        />
      </form>
      <div class="card-body">
        <form>
          <div class="row">
            <input
              type="file"
              name="image"
              placeholder="Choose image"
              id="image"
            />

            <button type="submit" class="btn btn-primary" id="submit">
              Submit2
            </button>
          </div>
        </form>
      </div> -->

      <form
        method="POST"
        enctype="multipart/form-data"
        id="upload-image"
        action="{{ url('upload') }}"
      >
        <div>
          <div>
            <div >
              <input
                type="file"
                name="image"
                placeholder="Choose image"
                id="image"
              />
              <div class="mt-1 mb-1">{{ $message }}</div>
            </div>
          </div>

          <div>
            <button type="submit" class="btn btn-primary" id="submit">
              Submit
            </button>
          </div>
        </div>
      </form>
    </v-main>
  </v-app>
</template>

<style scoped>
.v-table__wrapper {
  background: blue !important;
}

.formContainer {
  background: #ffffff;
  min-height: 50vh;
  width: 600px;
  padding: 25px;
  color: #000;

  .close {
    position: absolute;
    top: 5px;
    right: 15px;
    padding: 10px;
    font-size: 20px;
    font-weight: bold;
  }

  .title {
    font-size: 24px;
    font-weight: bold;
  }

  form {
    display: flex;
    height: 40vh;
    align-self: center;
    justify-content: center;
    padding: 10px;

    .imageContainer {
      width: 50%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-right: 15px;

      img {
        height: 250px;
        margin-bottom: 15px;
      }
    }

    .inputs {
      width: 50%;
      display: flex;
      justify-content: center;
      flex-direction: column;

      label {
        font-size: 12px;
        margin-top: 5px;
      }

      input {
        width: 100%;
        border: 1px solid #000;
        padding: 10px;
        color: #000;
      }

      .pricing {
        display: flex;
        justify-content: center;
        align-items: center;

        .price {
          margin-right: 15px;
        }
      }

      .info {
        display: flex;
        justify-content: center;
        align-items: center;

        .status {
          margin-right: 15px;
        }

        .category {
          display: flex;
          flex-direction: column;
          width: 100%;

          label {
            margin-top: 5px;
          }

          select {
            border: 1px solid #000;
            width: 100%;
            height: 45px;
            padding: 10px;
            color: #000;
          }
        }
      }
    }
  }
}

.active {
  background: #6986e5 !important;
  color: #fff;
}

.foradmin {
  .admin {
    display: flex;
    flex-direction: column;

    .title {
      font-size: 16px;
      color: #253772;
    }

    .text {
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 15px;
      color: #253772;
    }
  }

  .buttons {
    display: flex;
    flex-direction: column;
    min-height: 50vh;
    width: 100%;

    button {
      margin-top: 15px;
      text-align: start;
      padding-left: 15px;
      height: 50px;
      width: 100%;
      transition: all 0.3s;

      &:hover {
        background: #6986e5;
        cursor: pointer;
        color: #fff;
      }
    }
  }
}

.main {
  background: #f5f5f5;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #000;

  .topControls {
    margin-top: 5px;
    height: 50px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;

    input {
      border: 1px solid #000;
      padding: 10px;
      height: 35px;
      margin-right: auto;
    }

    button {
      height: 35px;
    }
  }

  #tableContainer {
    height: 70vh;
    overflow-y: scroll;
    width: 95%;
    margin-top: 25px;

    table {
      text-align: center;
      border-collapse: collapse;
      flex-direction: column;
      transition: all 0.3s;
      width: 100%;

      .headTable {
        background: rgb(61, 61, 61);
        color: #fff;
        height: 75px;
        top: 0px;
        z-index: 9;
        text-transform: uppercase;
        font-weight: bold;
      }

      .defrow {
        background: #fff;
        height: 60px;
        text-transform: capitalize;
        border-bottom: 1px solid #000;
        transition: all 0.3s;

        &:hover {
          cursor: pointer;
          background: #dfdddd;
        }

        td {
          font-size: 16px;
        }
      }
    }
  }
}
</style>

<script setup>
import { ref } from "vue";
import axios from "axios";
import "vuetify/styles";
import api from "@/helpers/api";
import notify from "@/helpers/notify";
import Swal from "sweetalert2";
import ProductForm from "@/components/product/ProductForm.vue";

let productForm = ref();
let selectedCategory = ref();
let selectedStore = ref();
let products = ref([]);

const imageUrl = ref("");

onMounted(refresh);

async function refresh() {
  products.value = (await api.product.get()).data;
}

function onChange(e) {
  console.log("selected file ", e.target.files[0]);
  myimage2.value = e.target.files[0];
}

// function submit2() {
//   let formData = new FormData();
//   formData.append("image", myimage2.value);
//   axios
//     .post("http://localhost/fab/api/public/api/upload", formData)
//     .then((res) => {
//       console.log("image uploaded successfully", res.data);
//       entity.value.image = res.data.filename;
//       // submit();
//     })
//     .catch((err) => console.log(err));
// }

// async function getProducts(){
//   let response = await axios.get('http://fab.test/api/foods');
//   products.value = response.data;
// }

function updateProduct() {
  api.product.update(entity.id, entity.value);
}

function confirmDelete() {}

async function deleteProduct(product) {
  if (
    await notify.confirm(
      "Do you want to delete this?",
      "You won't be able to revert this!"
    )
  ) {
    await api.product.delete(product.id);
    refresh();
  }

  // .then((result) => {
  //   if (result.isConfirmed) {
  //     Swal.fire({
  //       title: "Deleted!",
  //       text: "Your file has been deleted.",
  //       icon: "success"
  //     });
  //   }
  // });
}

function editProduct(product) {
  dialog.value = true;
  entity.value = { ...product };
  myimage.value = product.image;
  mycode.value = product.code;
  myname.value = product.name;
  myprice.value = product.price;
  selectedCategory.value = product.category_id;
  selectedStore.value = product.store_id;
}

const createImage = (file) => {
  const reader = new FileReader();

  reader.onload = (e) => {
    imageUrl.value = e.target.result;
  };
  reader.readAsDataURL(file);
};

const onFileChange = (file) => {
  if (!file) {
    return;
  }
  createImage(file);
};
</script>
