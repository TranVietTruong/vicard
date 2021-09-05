<template>
  <div class="container">
    <el-row type="flex" justify="center">
      <el-col :xs="24" :sm="12" :md="12" :lg="8">
        <el-card class="login">
          <div class="login__header">
            <h2>ĐẶT LẠI MẬT KHẨU</h2>
          </div>
          <el-alert
            v-if="error"
            title="Email hoặc mật khẩu không chính xác"
            type="warning"
            show-icon>
          </el-alert>
          <el-form :model="form" :rules="rules" status-icon ref="resetPassword">
            <p class="login__label">Nhập mật khẩu mới</p>
            <el-form-item prop="password">
              <el-input v-model="form.password" type="password" autocomplete="off"></el-input>
            </el-form-item>
            <p class="login__label">Nhập lại mật khẩu</p>
            <el-form-item prop="re_password">
              <el-input type="password" v-model="form.re_password" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item>
              <el-row type="flex" justify="center">
                <el-button @click="loginForm" :loading="loading" type="primary">Xác nhận</el-button>
              </el-row>
            </el-form-item>
          </el-form>
        </el-card>
      </el-col>
    </el-row>
    <p class="text-center reserved">©2020 mecard.vn - All rights reserved.</p>
  </div>
</template>

<script>
  export default {
    data() {
      var checkRepassword = (rule, value, callback) => {
        if(this.form.re_password !== this.form.password) {
          callback(new Error('Nhập lại mật khẩu không chính xác'));
        }
        callback();
      };

      return {
        form: {
          password: '',
          re_password: ''
        },
        loading: false,
        error: false,
        rules: {
          password: [
            { required: true, message: 'Vui lòng nhập mật khẩu', trigger: 'blur' },
            { min:6, message: 'Mật khẩu tối thiểu 6 kí tự', trigger: 'blur' },
            { max:50, message: 'Mật khẩu không hợp lệ', trigger: 'blur' }
          ],
          re_password: [
            { required: true, message: 'Vui lòng nhập lại mật khẩu', trigger: 'blur' },
            { min:6, message: 'Mật khẩu tối thiểu 6 kí tự', trigger: 'blur' },
            { max:50, message: 'Mật khẩu không hợp lệ', trigger: 'blur' },
            { validator: checkRepassword,trigger: 'change'}
          ]
        },
        token: ''
      }
    },
    created() {
      const token = this.$route.query.token;
      if(token === undefined || token === null || token === '') {
        this.$router.push({name:'404'});
      }
      this.checkToken(token)
    },
    methods: {
      loginForm() {
        this.$refs['resetPassword'].validate((valid) => {
          if (valid) {
            axios.post('reset-password', {password: this.form.password, token: this.token}).then((res) => {
              this.$notify({
                message: 'Đặt lại mật khẩu thành công',
                type: 'success'
              });
              this.$router.push({name:'login'});
            }).catch((error) => {
              this.$notify({
                message: error.response.data.message,
                type: 'error'
              });
              this.loading = false;
            });
          }
        });
      },
      async checkToken(token) {
        await axios.post('check-token', {token: token}).then((res) => {
          this.token = res.data.data;
        }).catch((error) => {
          this.$router.push({name:'404'});
        });
      }
    }
  }
</script>

<style lang="scss" scoped>
  .login {
    margin-top: 20px;
    .login__label {
      margin: 5px;
    }
    .login__header {
      text-align: center;
      text-transform: uppercase;
      padding: 20px;
    }
  }
  .reserved {
    font-size: 12px;
    padding: 10px;
  }
</style>
