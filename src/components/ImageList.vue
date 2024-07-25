<template>
    <div>
      <div v-for="image in images" :key="image.id">
        <img :src="'http://localhost/fab/api/public/api/' + image.path" :alt="image.name" />
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        images: [],
      };
    },
    async created() {
      try {
        const response = await axios.get('http://localhost/fab/api/public/api/images');
        this.images = response.data;
      } catch (error) {
        console.error('There was an error fetching the images!', error);
      }
    },
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  