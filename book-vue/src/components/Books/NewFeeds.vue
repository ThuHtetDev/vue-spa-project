<template>
    <div>
        <h3 class="text-center">Newfeeds of lastest books</h3><br/>
          <div v-for="book in books" :key="book.id" class="book">
            <!-- shelf -->
                <div class="newfeed_box">
                    <section id="sec1" style="text-align:center">
                        <header>
                        <h2>{{book.book_title}}</h2>
                        </header>
                        <img v-bind:src="'http://localhost:8000/storage/images/'+book.book_image" alt="MacbookPro" style="width:125px;height:125px">
                        <p>{{book.review}}</p>		
                        <h4 id="banner">
                            <p>ISBN - {{book.isbn}}</p>
                            <p>{{book.author}}</p>
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
      name: 'newfeed-view',
        data() {
            return {
              books: []
            }
        },
        created(){
            
            axios.get('books').then(response=>{
                this.books =response.data
            })
        },
        methods: {
        }
    }
</script>
<style scoped>
    .newfeed_box{
        border: 1px solid #000;
        margin: 20px auto;
        width: 500px;
    }
</style>