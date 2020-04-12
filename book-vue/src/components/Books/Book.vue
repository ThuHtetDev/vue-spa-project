<template>
    <div>
        <h1 class="text-center">All Books</h1>
        <router-link :to="{ name: 'CreateBookPage' }">Add Books</router-link>|
        <router-link :to="{ name: 'HomePage' }">Back</router-link><br/>
        <div v-for="dt in posts" :key="dt.id" class="posts">
            <h4>
                <router-link :to="{ name: 'BookDetailPage', params: { id: dt.id } }">
                    {{dt.title}}
                </router-link>
            </h4>
            <p>{{dt.body}}</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
      name: 'book-view',
        data() {
            return {
                posts: [],
            }
        },
        created(){
           this.getEg();
                 
        },
        methods: {
            getEg: function(){
                axios.get('https://jsonplaceholder.typicode.com/posts/').then(response=>{
                    this.posts=response.data
                })
            }
        }
    }
</script>

<style scoped>
    .posts{
        width: 600px;
        border: 1px solid #000;
        margin: 0 auto;
    }
</style>