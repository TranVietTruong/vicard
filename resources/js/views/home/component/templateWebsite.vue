<template>
  <div class="product" style="cursor: pointer">
    <div @click="handleSelectTemplate(data.code)" class="product_thumbnail">
      <img :src="data.thumbnail" alt="">
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      data: {
        type: Object,
        defaut: null
      }
    },
    computed: {
      templateCode() {
        return this.$store.getters.user && this.$store.getters.user.template_code
      }
    },
    data() {
      return {

      }
    },
    methods: {
      handlePreview() {
        window.location.href = '/preview/'+this.data.name
      },
      handleSelectTemplate(template_code) {
        this.$confirm('Bạn có chắc chắn chọn mẫu này ?', 'Thông báo', {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancel',
          type: 'info'
        }).then(() => {
          axios.post('update-step', {template_code: template_code}).then(() => {
            this.$notify({
              message: 'Thay đổi mẫu website thành công',
              type: 'success'
            });
            this.$router.push({name:'info'});
          }).catch(() => {
            this.$message({
              showClose: true,
              message: 'Có lỗi xảy ra ! Vui lòng thử lại sau',
              type: 'error'
            });
          });
        });
      }
    }
  }
</script>

