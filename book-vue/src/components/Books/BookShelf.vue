<template>
    <div>
        <h3 class="text-center">
            <router-link :to="{ name: 'BookShelfCreatePage' }">Add Book Shelf</router-link>|
        </h3>
       <div v-for="shelf in shelves" :key="shelf.id" class="shelf">
            <!-- shelf -->
            <router-link :to="{ name: 'ShelfDetailPage', params: { id: shelf.id } }">
                <article>
                    <section id="sec1" style="text-align:center">
                        <header>
                        <h2>{{shelf.shelf_name}}</h2>
                        </header>
                        <img v-bind:src="'http://localhost:8000/storage/images/'+shelf.image" alt="MacbookPro" style="width:125px;height:125px">
                        <p>{{shelf.about}}</p>		
                        <h4 id="banner">Available</h4>
                        </section>
                </article>
            </router-link>
            <!-- end shelf -->
        </div> 
      
    </div>
</template>

<script>
import axios from 'axios'
axios.defaults.baseURL = 'http://localhost:8000/api/'

    export default {
      name: 'book-shelf',
        data() {
            return {
             shelves: [],
            }
        },
        created(){
            this.getShelf();
        },
        methods: {
            getShelf: function(){
                axios.get('/bookshelf').then(response => {
                    console.log(response);
                    this.shelves = response.data
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style>

</style>