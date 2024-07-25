<template>
    <div>
      <input type="file" @change="onFileChange" />
      <button @click="uploadImage">Upload</button>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        image: null,
      };
    },
    methods: {
      onFileChange(e) {
        this.image = e.target.files[0];
      },
      async uploadImage() {
        if (!this.image) {
          alert('Please select an image to upload');
          return;
        }
  
        let formData = new FormData();
        formData.append('image', this.image);
  
        try {
          const response = await axios.post('http://localhost/fab/api/public/api/upload', formData, {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          });
          console.log(response.data);
        } catch (error) {
          console.error('There was an error uploading the image!', error);
        }
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  