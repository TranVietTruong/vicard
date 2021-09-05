<template>
  <div >
    <Header></Header>
    <div class="container content">
      <div class="content_right">
        <router-view></router-view>
      </div>
    </div>
    <Footer></Footer>
  </div>
</template>

<script>
  import Header from '../components/layout/header'
  import Steps from '../components/layout/steps'
  import Footer from '../components/layout/footer'

  export default {
    components:{
      Header,
      Steps,
      Footer
    },
    data() {
      return {

      }
    },
    created() {
      const step = this.$store.getters.user ? this.$store.getters.user.template_code : 0;
      if(!step) {
        this.$router.push({name:'listTemplate'}).catch(()=>{})
      }
      else {
        this.$router.push({name:'info'}).catch(()=>{})
      }
      // else {
      //   this.$router.push({name:'listTemplate'})
      // }
    },
    methods: {
    }
  }
</script>


<style lang="scss">
  .content {
    margin-top: 40px;
    .content_right {
      min-height: 100vh;
      .product {
        border-radius: 10px;
        margin-bottom: 10px;
        box-shadow: 1px 1px 5px 0px grey;
        overflow: hidden;
        .product_thumbnail {
          height: 260px;
          img {
            width: 100%;
            height: 100%;
            object-fit: cover;
          }
        }
        .product_action {
          display: flex;
          justify-content: center;
          padding: 10px;
        }
      }
    }
  }

  @media only screen and (max-width: 968px) {
    .content {
      width: 100% !important;
      margin-top: 10px;
      .content_left {
        height: auto;
        min-height: auto;
      }
      .content_right {
        border: none;
        min-height: 100vh;
        .product {
          margin-bottom: 20px;
        }
      }
    }
  }
</style>
