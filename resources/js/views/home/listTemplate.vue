<template>
  <el-row :gutter="20">
    <el-col v-for="product in products" :key="product.id" :xs="12" :sm="6" :md="3" :lg="3">
      <TemplateWebsite :data="product"></TemplateWebsite>
    </el-col>
  </el-row>
</template>

<script>
  import TemplateWebsite from './component/templateWebsite'
  export default {
    components: {
      TemplateWebsite
    },
    data() {
      return {
        products: []
      }
    },
    created() {
      this.getListProduct();
    },
    methods: {
      getListProduct() {
        axios.get('product').then((res) => {
          this.products = res.data.data;
        })
      }
    }
  }
</script>


