<template>
<div>
  <h1>ciao vue</h1>

    <ul>
      <li v-for="post in posts"
      :key="post.id">
        <p>{{ post.title }}</p>
      </li>
    </ul>


</div>



</template>

<script>
export default {
  name: 'App',

  data(){
    
    return{
      
      posts: null
    }

  },

  methods:{

    getApi(){

        axios.get('/api/posts')
        .then(response =>{

          this.posts = response.data;

        })

      // console.log('api');
    }

  },

  mounted() {
    
    this.getApi();
    // console.log(axios);

  },
}
</script>

<style>

</style>