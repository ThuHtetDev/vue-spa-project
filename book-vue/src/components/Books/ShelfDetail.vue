<template>
    <div>
        <h3 class="text-center">Detail Book Shelf Information</h3><br/>
            <div v-for="book in books" :key="book.id" class="book">
            <!-- shelf -->
                <div class="detail_shelf_box">
                    <section id="sec1" style="text-align:center">
                        <header>
                        <h2>{{book.book_title}}</h2>
                        </header>
                        <img v-bind:src="'http://localhost:8000/storage/images/'+book.book_image" alt="MacbookPro" style="width:125px;height:125px">
                        <p>{{book.review}}</p>
                        <h4 id="banner">
                            <p>ISBN - {{book.isbn}}</p>
                            <p>Author - {{book.author}}</p>
                            <p>Post at {{book.created_at}}</p>
                            <p v-if="book.is_rent == 0">Available</p>
                            <p v-else>On rent</p>
                            </h4>
                        </section>
                </div>
            <!-- end shelf -->
        </div> 
    </div>
</template>

<script>
import axios from 'axios'
axios.defaults.baseURL = 'http://localhost:8000/api/'
    export default {
      name: 'detail-book-shelf',
        data() {
            return {
              books: [],
              proId : this.$route.params.id
            }
        },
        created(){
            this.getShelfDetail(this.proId);
        },
        methods: {
            getShelfDetail: function(id){
                axios.get('/getBooksByshelf/'+id).then(response => {
                    console.log(response);
                    this.books = response.data
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>
<style scoped>
    .detail_shelf_box{
        border: 1px solid #000;
        margin: 20px auto;
        width: 500px;
    }
</style>