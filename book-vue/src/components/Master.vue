<template>

  <div id="app">
    
      <header class="header-fixed">
	    <div class="header-limiter">
		    <h1><a href="#">Vue<span>SPA</span></a></h1>
            <nav>
                <span class="routeLink" > <router-link :to="{ name: 'HomePage' }">Home</router-link> </span> 
                <span class="routeLink" ><router-link :to="{ name: 'NewFeedsPage' }">Newfeeds</router-link></span> 
                <span class="routeLink" ><router-link :to="{ name: 'BookShelfPage' }">My Library</router-link></span> 
               <span class="routeLink"> <router-link :to="{ name: 'BookPage' }" >Books</router-link></span> 
            </nav>
	    </div>
    </header>
    <section class="main">
        <router-view></router-view>
        <vue-topprogress ref="topProgress"></vue-topprogress>
    </section>
  </div>
  
</template>

<script>
import vueTopprogress from 'vue-top-progress'
    export default {
      name: 'master-view',
        data() {
            return {
             activeClass: false,
            }
        },
        mounted () {
        this.$refs.topProgress.start()
            setTimeout(() => {
            this.$refs.topProgress.done()
            }, 2000)
        },
        components: {
            vueTopprogress
        }
    }
</script>
<style>
    .router-link-exact-active{
        border-bottom:1px solid #fff;
        color: #fff !important;
    }
    .routeLink{
        margin: 0px 15px 0 15px;
    }
   .header-fixed {
	background-color: #5383d3;
	box-shadow:0 1px 1px #ccc;
	padding: 20px 40px;
	height: 80px;
	color: #ffffff;
	box-sizing: border-box;
	top:-100px;

	-webkit-transition:top 0.3s;
	transition:top 0.3s;
    }

    .header-fixed .header-limiter {
        max-width: 1200px;
        text-align: center;
        margin: 0 auto;
    }

    /*	The header placeholder. It is displayed when the header is fixed to the top of the
        browser window, in order to prevent the content of the page from jumping up. */

    .header-fixed-placeholder{
        height: 80px;
        display: none;
    }

    /* Logo */

    .header-fixed .header-limiter h1 {
        float: left;
        font: normal 28px Cookie, Arial, Helvetica, sans-serif;
        line-height: 40px;
        margin: 0;
    }

    .header-fixed .header-limiter h1 span {
        color: #fff;
    }

    /* The navigation links */

    .header-fixed .header-limiter a {
        color: #ffffff;
        text-decoration: none;
    }

    .header-fixed .header-limiter nav {
        font:16px Arial, Helvetica, sans-serif;
        line-height: 40px;
        float: right;
    }

    .header-fixed .header-limiter nav a{
        display: inline-block;
        padding: 0 5px;
        text-decoration:none;
        color: #ffffff;
        opacity: 0.9;
    }

    .header-fixed .header-limiter nav a:hover{
        opacity: 1;
    }

    .header-fixed .header-limiter nav a.selected {
        color: #608bd2;
        pointer-events: none;
        opacity: 1;
    }

    /* Fixed version of the header */

    body.fixed .header-fixed {
        padding: 10px 40px;
        height: 50px;
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 1;
    }
    article { 
	width: 30%;
    margin: 1%;
    display: block;
    border: 1px solid lightblue;
    float: left;
    }

    .clearfixed:after {
        content:"";
        display: table;
        clear: both;
    }

    #banner {
        background: darkgray;
        color: yellow;
        margin: 0;
        padding: 8px;
        text-align: left;
    }

    .headers {
        font-size: 1.25em;
        text-indent: 15px;	
    } 

    body.fixed .header-fixed-placeholder {
        display: block;
    }

    body.fixed .header-fixed .header-limiter h1 {
        font-size: 24px;
        line-height: 30px;
    }

    body.fixed .header-fixed .header-limiter nav {
        line-height: 28px;
        font-size: 13px;
    }


/* Making the header responsive */

    @media all and (max-width: 600px) {

	.header-fixed {
		padding: 20px 0;
		height: 75px;
	}

	.header-fixed .header-limiter h1 {
		float: none;
		margin: -8px 0 10px;
		text-align: center;
		font-size: 24px;
		line-height: 1;
	}

	.header-fixed .header-limiter nav {
		line-height: 1;
		float:none;
	}

	.header-fixed .header-limiter nav a {
		font-size: 13px;
	}

	body.fixed .header-fixed {
		display: none;
	}

    }
   
    .sidebar {
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
    }

    .sidebar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
    }
    
    .sidebar a.active {
    background-color: #4CAF50;
    color: white;
    }

    .sidebar a:hover:not(.active) {
    background-color: #555;
    color: white;
    }

</style>