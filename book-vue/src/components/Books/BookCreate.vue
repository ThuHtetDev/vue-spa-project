<template>
    <div>
        <h3 class="text-center">Create Books</h3><br/>
        <h3 v-if="sent">{{messsage}}</h3>
         <form @submit="formSubmit" enctype="multipart/form-data">
                    <div><strong>Book Name:</strong>
                    <input type="text" class="form-control" v-model="book_title"></div>
                     <div><strong>Book Author:</strong>
                    <input type="text" class="form-control" v-model="author"></div>
                    <div><strong>Review Your Book:</strong>
                    <textarea class="form-control" v-model="review"></textarea></div>
                    <div><strong>Add Your BookShelf:</strong>
                    <select v-model="shelf_id">
                        <!-- inline object literal -->
                        <option selected disabled>Which library do you want to put in?</option>
                        <option v-for="shelf in shelves" :key="shelf.id" v-bind:value="shelf.id">
                            {{ shelf.shelf_name }}
                        </option>
                    </select>
                    </div>

                    <div><strong>Image:</strong>
                    <input type="file" class="form-control" @change="onFileSelected"></div>
                    <button class="btn btn-success">Post</button>
        </form>
    </div>
</template>

<script>
    import axios from 'axios'
    axios.defaults.baseURL = 'http://localhost:8000/api/'
    export default {
      name: 'book-create',
        data() {
            return {
                book_title : '', 
                author: '',
                review: '',
                shelf_id: '',
                selectedFile : null,
                messsage : 'Post Successfully',
                sent : false,
                shelves: []
            }
        },
        created() {
            axios.get('/bookshelf').then(response=>{
                    this.shelves =response.data
            })
        },
        methods: {
            formSubmit: function(e){
                e.preventDefault();
                const data = new FormData();
                data.append('image', this.selectedFile,this.selectedFile.name);
                const json = JSON.stringify({
                    book_title: this.book_title,
                    author: this.author,
                    review: this.review,
                    shelf_id: this.shelf_id
                });
                data.append('data', json);
                axios.post('books',data)
                .then(response => {
                console.log('It is working')
                this.$alert("New Book is successfully post");
                 this.sent = true
                })
                .catch(error => {
                    console.log(error)
                })
                this.book_title = ''
                this.author = ''
                this.review = ''
                this.shelf_id = ''
            },
            onFileSelected: function(){
                this.selectedFile = event.target.files[0]
            }
        }
    }
</script>