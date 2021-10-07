<template>
  <div class="container" style="padding: 0;">
    <div class="avatar">
      <upload v-model="avatar" keyName="avatar"></upload>
    </div>
    <el-collapse v-model="activeName">
      <el-collapse-item name="2">
        <template slot="title">
          <div class="title">
            <span>THÔNG TIN CÁ NHÂN</span>
          </div>
        </template>
        <p v-show="userInfo.infoPersonal && !userInfo.infoPersonal.length"  class="text-center">Không có dữ liệu !</p>
        <div
          v-for="(item,index) in userInfo.infoPersonal"
          :key="'infoPersonal'+index"
          class="info">
          <div class="info_left">
            <div class="info_icon">
              <img :src="'assets/icon/'+item.key + '.png'">
            </div>
            <div class="info_detail">
              {{item.info}}
            </div>
          </div>
          <div class="info_right">
            <el-button
              size="mini"
              @click="handleEdit(item)"
              icon="el-icon-edit"></el-button>
            <el-button
              size="mini"
              @click="deleteUserInfo(item.id, item.type, index)"
              icon="el-icon-delete"></el-button>
          </div>
        </div>
        <div class="add_info">
          <el-button @click="handleAddInfoPersonal" type="primary" icon="el-icon-plus"> Thêm </el-button>
        </div>
      </el-collapse-item>
      <el-collapse-item name="3">
        <template slot="title">
          <div class="title">
            <span>THÔNG TIN LIÊN HỆ</span>
          </div>
        </template>
        <p v-show="userInfo.infoContact && !userInfo.infoContact.length"  class="text-center">Không có dữ liệu !</p>
        <draggable
          v-model="userInfo.infoContact"
          @update="orderInfoContact"
          handle=".handle">
          <div
            v-for="(item,index) in userInfo.infoContact"
            :key="'infoContact'+index"
            class="info">
            <div class="info_left handle">
              <div class="info_icon">
                <img :src="'assets/icon/' + item.key +'.png'">
              </div>
              <div class="info_detail">
                {{getText(item.key, item.info)}}
              </div>
            </div>
            <div class="info_right">
              <el-button
                size="mini"
                @click.native="handleEdit(item)"
                icon="el-icon-edit"></el-button>
              <el-button
                size="mini"
                @click.native="deleteUserInfo(item.id, item.type, index)"
                icon="el-icon-delete"></el-button>
            </div>
          </div>
        </draggable>

        <div class="add_info">
          <el-button @click="handleAddInfoContact" type="primary" icon="el-icon-plus"> Thêm </el-button>
        </div>
      </el-collapse-item>
    </el-collapse>
    <el-dialog
      title="Thêm thông tin cá nhân"
      :visible.sync="visibleDialogPersonal"
      center>
      <el-form :model="formInfoPersonal" :rules="rules" status-icon ref="formInfoPersonal">
        <p class="register__label">Chọn thông tin <span class="text-danger">*</span></p>
        <el-form-item prop="key">
          <el-select
            v-model="formInfoPersonal.key"
            filterable
            remote
            reserve-keyword
            placeholder="Chọn thông tin">
            <el-option
              v-for="(item, index) in infoPersonal"
              :key="'i'+index"
              :label="item.name"
              :value="item.key">
            </el-option>
          </el-select>
        </el-form-item>
        <p class="register__label">Nhập thông tin <span class="text-danger">*</span></p>
        <el-form-item prop="info">
          <el-input v-model="formInfoPersonal.info" placeholder="Nhập thông tin" maxlength="255"></el-input>
        </el-form-item>
        <div class="actions">
          <el-button @click="visibleDialogPersonal = false" size="mini" type="danger" icon="el-icon-close"> Hủy</el-button>
          <el-button
            @click="saveInfoPersonal"
            :loading="loadingAddInfoPersonal"
            type="primary"
            size="mini"
            icon="el-icon-check"> Lưu</el-button>
        </div>
      </el-form>
    </el-dialog>

    <el-dialog
      title="Thêm thông tin liên hệ"
      :visible.sync="visibleDialogContact"
      center>
      <el-form :model="formInfoContact" :rules="rules" status-icon ref="formInfoContact">
        <p class="register__label">Chọn thông tin <span class="text-danger">*</span></p>
        <el-form-item prop="key">
          <el-select
            v-model="formInfoContact.key"
            filterable
            remote
            reserve-keyword
            placeholder="Chọn thông tin">
            <el-option
              v-for="(item, index) in infoContact"
              :key="item.key + index"
              :label="item.name"
              :value="item.key">
            </el-option>
          </el-select>
        </el-form-item>
        <p class="register__label">Nhập thông tin <span class="text-danger">*</span></p>
        <div v-if="formInfoContact.key === 'website'">
          <el-form-item prop="info">
            <el-input :clearable="true" v-model="formInfoContact.info" placeholder="Tiêu đề" maxlength="255"></el-input>
          </el-form-item>
          <el-form-item prop="info1">
            <el-input :clearable="true" v-model="formInfoContact.info1" placeholder="Đường link" maxlength="255"></el-input>
          </el-form-item>
        </div>
        <div v-else-if="formInfoContact.key === 'note'">
          <el-form-item prop="info">
            <el-input :clearable="true" v-model="formInfoContact.info" placeholder="Tiêu đề" maxlength="255"></el-input>
          </el-form-item>
          <el-form-item prop="info1">
            <el-input :clearable="true" type="textarea" v-model="formInfoContact.info1" placeholder="Thông tin ghi chú" maxlength="255"></el-input>
          </el-form-item>
        </div>
        <div v-else-if="formInfoContact.key === 'bank'">
          <el-form-item prop="info">
            <el-input :clearable="true" v-model="formInfoContact.info" placeholder="Tên ngân hàng" maxlength="255"></el-input>
          </el-form-item>
          <el-form-item prop="info1">
            <el-input :clearable="true" v-model="formInfoContact.info1" placeholder="Chủ tài khoản" maxlength="255"></el-input>
          </el-form-item>
          <el-form-item prop="info2">
            <el-input :clearable="true" v-model="formInfoContact.info2" placeholder="Số tài khoản" maxlength="255"></el-input>
          </el-form-item>
        </div>
        <div v-else>
          <el-form-item prop="info">
            <el-input :clearable="true" v-model="formInfoContact.info" placeholder="Nhập thông tin" maxlength="255"></el-input>
          </el-form-item>
        </div>

        <div class="actions">
          <el-button
            @click="visibleDialogContact = false"
            size="mini"
            type="danger"
            icon="el-icon-close"> Hủy</el-button>
          <el-button
            @click="saveInfoContact"
            :loading="loadingAddInfoContact"
            type="primary"
            size="mini"
            icon="el-icon-check"> Lưu</el-button>
        </div>
      </el-form>
    </el-dialog>

    <el-dialog
      title="Sửa thông tin"
      :visible.sync="visibleDialogEdit"
      center>
      <el-form :model="formEdit" :rules="rules" status-icon ref="formEdit">
        <p class="register__label">{{getText(formEdit.key, formEdit.info)}} <span class="text-danger">*</span></p>
        <div v-if="formEdit.key === 'website'">
          <el-form-item prop="info">
            <el-input
              v-model="formEdit.info"
              :clearable="true"
              placeholder="Tiêu đề"
              maxlength="255"></el-input>
          </el-form-item>
          <el-form-item prop="info1">
            <el-input
              v-model="formEdit.info1"
              :clearable="true"
              placeholder="Đường link"
              maxlength="255"></el-input>
          </el-form-item>
        </div>
        <div v-else-if="formEdit.key === 'note'">
          <el-form-item prop="info">
            <el-input :clearable="true" v-model="formEdit.info" placeholder="Tiêu đề" maxlength="255"></el-input>
          </el-form-item>
          <el-form-item prop="info1">
            <el-input :clearable="true" type="textarea" :rows="2" v-model="formEdit.info1" placeholder="Thông tin ghi chú" maxlength="255"></el-input>
          </el-form-item>
        </div>
        <div v-else-if="formEdit.key === 'bank'">
          <el-form-item prop="info">
            <el-input :clearable="true" v-model="formEdit.info" placeholder="Tên ngân hàng" maxlength="255"></el-input>
          </el-form-item>
          <el-form-item prop="info1">
            <el-input :clearable="true" v-model="formEdit.info1" placeholder="Chủ tài khoản" maxlength="255"></el-input>
          </el-form-item>
          <el-form-item prop="info2">
            <el-input :clearable="true" v-model="formEdit.info2" placeholder="Số tài khoản" maxlength="255"></el-input>
          </el-form-item>
        </div>
        <div v-else>
          <el-form-item prop="info">
            <el-input :clearable="true" v-model="formEdit.info" placeholder="Nhập thông tin" maxlength="255"></el-input>
          </el-form-item>
        </div>
        <div class="actions">
          <el-button
            @click="visibleDialogEdit = false"
            size="mini"
            type="danger"
            icon="el-icon-close"> Hủy</el-button>
          <el-button
            @click="saveInfoEdit"
            :loading="loadingEdit"
            type="primary"
            size="mini"
            icon="el-icon-check"> Lưu</el-button>
        </div>
      </el-form>
    </el-dialog>
  </div>
</template>

<script>
  import draggable from 'vuedraggable'
  import Upload from '../../components/upload/upload'
  export default {
    components: {
      Upload,
      draggable
    },
    data() {
      return {
        infoPersonal: [],
        infoContact: [],
        userInfo: {
          infoImages: [],
          infoPersonal: [],
          infoContact: []
        },
        avatar: {},
        background: {},
        formInfoPersonal: {
          key: '',
          info: '',
          info1: '',
          info2: ''
        },
        formInfoContact: {
          key: '',
          info: '',
          info1: '',
          info2: ''
        },
        visibleDialogPersonal: false,
        visibleDialogContact: false,
        visibleDialogEdit: false,
        rules: {
          key: [
            { required: true, message: 'Vui lòng chọn thông tin', trigger: 'blur' }
          ],
          info: [
            { required: true, message: 'Vui lòng điền thông tin', trigger: 'blur' },
            { max: 255, message: 'Dữ liệu không hợp lệ', trigger: 'blur' },
          ],
          info1: [
            { required: true, message: 'Vui lòng điền thông tin', trigger: 'blur' },
            { max: 255, message: 'Dữ liệu không hợp lệ', trigger: 'blur' },
          ],
          info2: [
            { required: true, message: 'Vui lòng điền thông tin', trigger: 'blur' },
            { max: 255, message: 'Dữ liệu không hợp lệ', trigger: 'blur' },
          ]
        },
        activeName: ['1','2','3'],
        loadingAddInfoPersonal: false,
        loadingAddInfoContact: false,
        loadingEdit: false,
        formEdit: {
          info: '',
          info1: '',
          info2: ''
        }
      }
    },
    created() {
      this.init();
    },
    methods: {
      async init() {
        const loading = this.loadingStart();
        await this.getInfoUser();
        loading.close();
      },
      async getInfoUser() {
        await axios.get('user-info').then((res) => {
          this.userInfo = res.data.data;
          this.userInfo.infoImages.forEach((item) => {
            if(item && item.key === 'avatar') {
              this.avatar = {
                uid: item.id,
                name: 'Ảnh avatar',
                url: item.info
              }
            } else {
              this.background = {
                uid: item.id,
                name: 'Ảnh background',
                url: item.info
              }
            }
          });
        });
      },
      async handleAddInfoPersonal() {
        if(this.infoPersonal.length) {
          this.visibleDialogPersonal = true;
          return;
        }
        const loading = this.loadingStart();
        await axios.get('type-info?type=PERSONAL').then((res) => {
          this.infoPersonal = res.data.data;
          loading.close();
          this.visibleDialogPersonal = true;
        }).catch(() => {
          loading.close();
          this.visibleDialogPersonal = true;
        });
      },
      async handleAddInfoContact() {
        if(this.infoContact.length) {
          this.visibleDialogContact = true;
          return;
        }
        const loading = this.loadingStart();
        await axios.get('type-info?type=CONTACT').then((res) => {
          this.infoContact = res.data.data;
          loading.close();
          this.visibleDialogContact = true;
        }).catch(() => {
          loading.close();
          this.visibleDialogContact = true;
        });
      },
      saveInfoPersonal() {
        if(this.userInfo.infoPersonal.length > 50) {
          this.$notify({
            message: 'Thông tin đã đầy, không thể thêm thông tin',
            type: 'warning'
          });
          return false;
        }
        this.$refs['formInfoPersonal'].validate((valid) => {
          if (valid) {
            this.loadingAddInfoPersonal = true;
            this.formInfoPersonal.type = 'PERSONAL';
            axios.post('create-user-info', this.formInfoPersonal).then((res) => {
              this.$notify({
                message: 'Thêm thông tin thành công',
                type: 'success'
              });
              this.userInfo.infoPersonal.push(res.data.data);
              this.formInfoPersonal.key = '';
              this.formInfoPersonal.info = '';
              this.loadingAddInfoPersonal = false;
              this.visibleDialogPersonal = false;
            }).catch(() => {
              this.loadingAddInfoPersonal = false;
            })
          }
        });
      },
      saveInfoContact() {
        if(this.userInfo.infoContact.length > 50) {
          this.$notify({
            message: 'Thông tin đã đầy, không thể thêm thông tin',
            type: 'warning'
          });
          return false;
        }
        this.$refs['formInfoContact'].validate((valid) => {
          if (valid) {
            this.loadingAddInfoContact = true;
            this.formInfoContact.type = 'CONTACT';
            axios.post('create-user-info', this.formInfoContact).then((res) => {
              this.$notify({
                message: 'Thêm thông tin thành công',
                type: 'success'
              });
              this.userInfo.infoContact.push(res.data.data)
              this.formInfoContact.key = '';
              this.formInfoContact.info = '';
              this.loadingAddInfoContact = false;
              this.visibleDialogContact = false;
            }).catch(() => {
              this.loadingAddInfoContact = false;
            })
          }
        });
      },
      handleEdit(item) {
        this.formEdit = item;
        this.visibleDialogEdit = true;
      },
      saveInfoEdit() {
        this.$refs['formEdit'].validate((valid) => {
          if (valid) {
            this.loadingEdit = true;
            const data = {
              id: this.formEdit.id,
              info: this.formEdit.info,
              info1: this.formEdit.info1,
              info2: this.formEdit.info2,
            };

            axios.post('update-user-info', data).then((res) => {
              this.$notify({
                message: 'Sửa thông tin thành công',
                type: 'success'
              });
              this.formEdit = {};
              this.loadingEdit = false;
              this.visibleDialogEdit = false;
            })
            .catch(() => {
              this.loadingEdit = false;
            })
          }
        });
      },
      deleteUserInfo(id, type, index) {
        this.$confirm('Bạn có muốn xóa thông tin này ?', 'Cảnh báo', {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancel',
          type: 'warning'
        }).then(() => {
          const loading = this.loadingStart();
          axios.post('delete-user-info', {id:id}).then((res) => {
            this.$notify({
              message: 'Xóa thông tin thành công',
              type: 'success'
            });
            if(type === 'PERSONAL') {
              this.userInfo.infoPersonal.splice(index, 1);
            }
            else if(type === 'CONTACT') {
              this.userInfo.infoContact.splice(index, 1);
            }
            loading.close();
          })
        });
      },
      async orderInfoContact() {
        let ids = this.userInfo.infoContact.map(info => info.id);
        await axios.post('order-user-info', {ids:ids});
      },
      async orderInfoPersonal() {
        let ids = this.userInfo.infoPersonal.map(info => info.id);
        await axios.post('order-user-info', {ids:ids});
      },
      getText(key, info) {
        switch (key) {
          case 'mobilephone':
            return 'Số điện thoại';
          case 'email':
            return 'Email';
          case 'facebook':
            return 'Facebook';
          case 'zalo':
            return 'Zalo';
          case 'instagram':
            return 'Instagram';
          case 'youtube':
            return 'Youtube';
          case 'skype':
            return 'Skype';
          case 'tiktok':
            return 'Tiktok';
          case 'momo':
            return 'Momo';
          case 'shopee':
            return 'Shopee';
          case 'twitter':
            return 'Twitter';
          case 'website':
            return 'Website';
          case 'telegram':
            return 'Telegram';
          case 'lazada':
            return 'Lazada';
          case 'name':
            return 'Tên của bạn';
          case 'about':
            return 'Giới thiệu';
          case 'bank':
            return 'Tài khoản ngân hàng';
          case 'wechat':
            return 'Wechat';
          case 'note':
            return 'Ghi chú';
          case 'whatsapp':
            return 'Whatsapp';
          case 'linkedin':
            return 'Linkedin';
          case 'soundcloud':
            return 'Soundcloud';
          case 'spotify':
            return 'Spotify';
          default :
            return info;
        }
      },
    }
  }
</script>

<style>
  .title {
    width: 100%;
    text-align: center;
    font-weight: bold;
    font-size: 1rem;
  }
  .el-collapse-item__wrap {
    background-color: inherit;
    padding-top: 20px;
  }

  i.el-input__icon.mdi {
    margin-left: 5px;
  }

  .list {
    margin-bottom: 5px;
    display: flex;
    justify-content: space-between;
  }
  .save_info {
    margin-top: 10px;
    display: flex;
    justify-content: center;
  }

  .add_info {
    width: 100%
  }
  .add_info button {
    width: 100%;
    margin: 20px 0px;
  }
  .el-select {
    width: 100%;
  }
  .actions {
    display: flex;
    justify-content: flex-end;
  }

  .info {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 5px 0px;
    margin: 20px 0px;
    width: 100%;
    box-shadow: 0 2px 12px 0 rgb(0 0 0 / 10%);

  }

  .info_left {
    display: flex;
    align-items: center;
    min-width: 70%;
  }
  .info_right {
    min-width: 75px;
    margin-left: 5px;
  }

  .info_detail {
    margin-left: 10px;
  }

  .info_icon img {
    width: 35px;
  }
  .el-collapse-item__wrap {
     padding-top: 0 !important;
  }

  .info .el-button--mini, .el-button--mini.is-round {
    padding: 7px 7px;
  }
  .register__label {
    margin: 5px 0px;
    font-weight: bold;
  }

  @media only screen and (max-width: 600px) {
    .el-dialog {
      width: 95%;
    }
  }
</style>
