<template>
    <div class="container-fluid">
        <h4 class="page-title">Profile</h4>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">User Name</div>
                    </div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="profile" class="nav-link" role="tab" data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="change-password-page" class="nav-link active" role="tab" data-toggle="tab">Change Password</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <validationObserver ref="form" v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(updatePassword)">
                                    <div class="card-body">
<!--                                        <div class="form-group">-->
<!--                                            <label for="name">Name</label>-->
<!--                                            <validationProvider vid="name" name="Name" rules="required" v-slot="{ errors }">-->
<!--                                                <input type="text" class="form-control" v-model="profile.name" id="name" placeholder="Enter your name">-->
<!--                                                <span class="invalid-feedback d-block">{{ errors[0] }}</span>-->
<!--                                            </validationProvider>-->
<!--                                        </div>-->
                                        <div class="form-group">
                                            <label for="old_password">Old Password</label>
                                            <validationProvider vid="old_password" name="Old password" rules="required|min:8" v-slot="{ errors }">

                                                <input type="password" v-model="old_password" class="form-control" id="old_password" placeholder="Enter your old password">
                                                <span class="invalid-feedback d-block">{{ errors[0] }}</span>

                                            </validationProvider>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <validationProvider vid="new_password" name="New password" rules="required|min:8" v-slot="{ errors }">

                                                <input type="password" v-model="new_password" class="form-control" id="new_password" placeholder="Enter your new password">
                                                <span class="invalid-feedback d-block">{{ errors[0] }}</span>

                                            </validationProvider>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <validationProvider vid="confirm_password" name="Confirm password" rules="required|min:8|confirmed:new_password" v-slot="{ errors }">

                                            <input type="password" v-model="confirm_password" class="form-control" id="confirm_password" placeholder="Enter your confirm password">
                                                <span class="invalid-feedback d-block">{{ errors[0] }}</span>

                                            </validationProvider>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                            </validationObserver>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        name: "ChangePasswordComponent",
        data() {
            return {
                old_password: '',
                new_password: '',
                confirm_password: ''
            }
        },
        methods:{
            updatePassword() {
                axios.post('change-password', {
                    old_password: this.old_password,
                    password: this.new_password,
                    password_confirmation: this.confirm_password
                }).then((res) => {
                    if (res.data.message) {
                        this.$toaster.success('Password updated successfully')
                    } else {
                        this.$toaster.error(err.response.data.message)
                    }
                }).catch((err) => {
                    let errPass = err.response.data.errors.password[0];
                    this.$refs.form.setErrors({
                        new_password: [errPass]
                    })
                    this.$toaster.error(err.response.data.message)
                })
            }
        }
    }
</script>

<style scoped>

</style>
