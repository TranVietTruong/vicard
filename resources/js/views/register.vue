<template>
  <div class="container">
    <el-row type="flex" justify="center">
      <el-col :xs="24" :sm="12" :md="12" :lg="8">
        <div class="register">
          <div class="register__header">
            <h3>đăng ký</h3>
          </div>
          <el-form :model="form" :rules="rules" status-icon ref="formRegister">
            <p class="register__label">Tên của bạn<span class="text-danger">*</span></p>
            <el-form-item prop="full_name">
              <el-input
                placeholder="Nhập tên của bạn"
                v-model="form.full_name"
                maxlength="50"
                show-word-limit
                autocomplete="off"></el-input>
            </el-form-item>
            <p class="register__label">Email <span class="text-danger">*</span></p>
            <el-form-item prop="email">
              <el-input
                placeholder="Nhập email"
                v-model="form.email"
                maxlength="50"
                show-word-limit
                autocomplete="off"></el-input>
            </el-form-item>
            <p class="register__label">Mật khẩu <span class="text-danger">*</span></p>
            <el-form-item prop="password">
              <el-input
                placeholder="Nhập mật khẩu"
                type="password"
                v-model="form.password"
                show-password
                autocomplete="off"></el-input>
            </el-form-item>
            <p class="register__label">Mã thẻ <span class="text-danger">*</span></p>
            <el-form-item prop="code_tag">
              <el-input
                placeholder="Nhập mã thẻ"
                v-model="form.code_tag"
                maxlength="50"
                show-word-limit
                autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item prop="captcha">
              <vue-recaptcha
                ref="vueRecaptcha"
                @verify="verifyCaptcha"
                sitekey="6Lfy2p8bAAAAAGmYWh528pDSHCsZTO0JmzNJP5IG"
                :loadRecaptchaScript="true">
              </vue-recaptcha>
            </el-form-item>
            <el-form-item>
              <el-row type="flex" justify="center">
                <el-button @click="registerForm" :loading="loadingRegister" type="primary">Đăng Ký</el-button>
              </el-row>
            </el-form-item>
            <p class="redirect text-center">
              Bạn đã có tài khoản ?
              <router-link to="/login">
                <span class="text-primary">Đăng Nhập Tại Đây</span>
              </router-link>
            </p>
          </el-form>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import VueRecaptcha from 'vue-recaptcha';
import { mapActions } from 'vuex';

export default {
  components: {
    VueRecaptcha
  },
  data() {
    return {
      form: {
        full_name: '',
        email: '',
        password: '',
        code_tag: '',
        captcha: ''
      },
      loadingRegister: false,
      rules: {
        full_name: [
          { required: true, message: 'Vui lòng điền Họ và tên', trigger: 'blur' },
          { min: 3, max: 50, message: 'Họ và tên tối thiểu 3 kí tự và tối đa 50 kí tự', trigger: 'blur' }
        ],
        email: [
          { required: true, message: 'Vui lòng điền email', trigger: 'blur' },
        ],
        password: [
          { required: true, message: 'Vui lòng điền mật khẩu', trigger: 'blur' },
          { min:6, message: 'Mật khẩu tối thiểu 6 kí tự', trigger: 'blur' }
        ],
        code_tag: [
          { required: true, message: 'Vui lòng điền mã thẻ', trigger: 'blur' },
          { min: 6, max: 50, message: 'Mã thẻ không hợp lệ', trigger: 'blur' },
        ],
        captcha: [
          { required: true, message: 'Vui lòng chọn captcha', trigger: 'blur' }
        ]
      }
    }
  },
  methods: {
    ...mapActions(['register', 'getUser']),
    async registerForm() {
      this.$refs['formRegister'].validate((valid) => {
        if (valid) {
          this.loadingRegister = true;
          this.register(this.form).then(async res => {
            await this.getUser(res.data.data);
            this.loadingRegister = false;
            this.$router.push({name:'listTemplate'});
          })
          .catch(error => {
            this.$message({
              showClose: true,
              message: error.response.data.message,
              type: 'error'
            });
            grecaptcha.reset();
            this.loadingRegister = false;
          });
        }
      })
    },
    verifyCaptcha(response) {
      this.form.captcha = response;
    }
  }
}
</script>

<style lang="scss" scoped>
.register {
  /*margin-top: 20px;*/
  padding: 25px;
  .register__label {
    margin: 5px 0px;
    font-weight: bold;
  }
  .register__header {
    h3 {
      font-weight: bold;
    }
    text-align: center;
    text-transform: uppercase;
    padding: 20px;
  }
}
.reserved {
  font-size: 12px;
  padding: 10px;
}

.redirect {
  text-align: center;
  font-weight: bold;
}
</style>
