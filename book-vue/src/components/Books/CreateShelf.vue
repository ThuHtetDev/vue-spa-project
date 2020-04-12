<template>
    <div>
        <h3 class="text-center">Create shelf</h3>
        <router-link :to="{ name: 'BookShelfPage' }">Back</router-link>
        <div class="shelf_container">
            <form @submit="formSubmit" enctype="multipart/form-data">
                    <div><strong>Shelf Type Name:</strong>
                    <input type="text" class="form-control" v-model="shelf_name"></div>
                    <div><strong>About Your Shelf:</strong>
                    <textarea class="form-control" v-model="about"></textarea></div>
                    <div><strong>Image:</strong>
                    <input type="file" class="form-control" @change="onFileSelected"></div>
                    <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    axios.defaults.baseURL = 'http://localhost:8000/api/'
    export default {
      name: 'book-shelf-create',
        data() {
            return {
                shelf_name : '', 
                about: '',
                selectedFile : null,
            }
        },
        created(){
          
        },
        methods: {
            formSubmit: function(e){
                e.preventDefault();
                console.log(this.shelf_name)
                // let rawData = {
                //         shelf_name: this.shelf_name,
                //         about: this.about,
                //     }
                // rawData = JSON.stringify(rawData)
                // console.log(rawData)
                // let fd = new FormData();
                // fd.append('image',this.selectedFile,this.selectedFile.name)
                // fd.append('data', rawData)
                const data = new FormData();
                data.append('image', this.selectedFile,this.selectedFile.name);
                const json = JSON.stringify({
                    shelf_name: this.shelf_name,
                    about: this.about,
                });
                data.append('data', json);
                console.log(data)
                axios.post('/bookshelf',data)
                .then(response => {
                  this.$alert("New Bookshelf is successfully Built");
                })
                .catch(error => {
                    console.log(error)
                })
                this.shelf_name = ''
                this.about = ''
            },
            onFileSelected: function(event){
                this.selectedFile = event.target.files[0]
                 this.createImage(this.selectedFile);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
    }
</script>
<style>
.shelf_container{
    margin: 0 auto;
    border: 1px solid #000;
    width: 500px;
    padding: 30px 30px;
}
</style>