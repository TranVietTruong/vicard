<template>
  <div style="margin-top: 8vh;" class="container">
    <el-form :model="form" :rules="rules" status-icon ref="notify">
      <p class="login__label">Tiêu đề <span style="color: red;">*</span></p>
      <el-form-item prop="title">
        <el-input
          v-model="form.title"
          placeholder="Nhập tiêu đề"
          maxlength="50"
          show-word-limit
          autocomplete="off">
        </el-input>
      </el-form-item>
      <p class="login__label">Nội dung <span style="color: red;">*</span></p>
      <el-form-item prop="message">
        <el-input
          type="textarea"
          :rows="4"
          placeholder="Nhập nội dung"
          maxlength="200"
          show-word-limit
          v-model="form.message">
        </el-input>
      </el-form-item>
      <p class="login__label">Đường link (Link sẽ được chuyển đến khi nhấn vào thông báo)</p>
      <el-form-item prop="title">
        <el-input
          v-model="form.url"
          placeholder="Nhập đường dẫn"
          maxlength="255"
          show-word-limit
          autocomplete="off">
        </el-input>
      </el-form-item>
      <br>
      <el-form-item>
        <el-row type="flex" justify="center">
          <el-button
            @click="sendNotification"
            :loading="loading"
            icon="el-icon-s-promotion"
            type="primary">
            Gửi thông báo</el-button>
        </el-row>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        url: '',
        title: '',
        message: ''
      },
      rules: {
        title: [
          { required: true, message: 'Vui lòng nhập tiêu đề', trigger: 'blur' },
          { max: 50, message: 'Tiêu đề tối đa 30 kí tự', trigger: 'blur' }
        ],
        message: [
          { required: true, message: 'Vui lòng nhập nội dung', trigger: 'blur' },
          { max:160, message: 'Nội dung tối đa 160 kí tự', trigger: 'blur' }
        ]
      },
      loading: false
    }
  },
  methods: {
    sendNotification() {
      this.$refs['notify'].validate((valid) => {
        if (valid) {
          this.loading = true;
          axios.post('send-notification', this.form).then((res) => {
            this.$notify({
              message: 'Gửi thông báo thành công',
              type: 'success'
            });
            this.loading = false;
          }).catch(() => {
            this.loading = false;
          });
        }
      });
    }
  }
}
</script>

<style lang="scss" scoped>
  .login__label {
    margin: 5px;
    font-weight: bold;
  }
</style>
