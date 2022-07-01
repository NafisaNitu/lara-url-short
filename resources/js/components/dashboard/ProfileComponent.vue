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
                            <a href="profile" class="nav-link active" role="tab" data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="change-password-page" class="nav-link" role="tab" data-toggle="tab">Change Password</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <validationObserver ref="form" v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(updateProfile)">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <validationProvider vid="name" name="Name" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control" v-model="profile.name" id="name" placeholder="Enter your name">
                                            <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                                        </validationProvider>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <validationProvider vid="email" name="Email" rules="required|email" v-slot="{ errors }">
                                            <input type="text" class="form-control" v-model="profile.email" id="email" placeholder="Enter your Email">
                                            <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                                        </validationProvider>
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-primary" type="submit">Update</button>
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
import changePassword from './ChangePasswordComponent'

    export default {
        props:['profile'],
        comments: {
            changePassword
        },
        name: "ProfileComponent",
        data() {
            return {

            }
        },
        methods: {
            updateProfile(){
                axios.post('profile-update', {
                    name: this.profile.name,
                    email: this.profile.email
                }).then((res) => {
                    this.$toaster.success('Profile updated successfully')
                    location.href = 'profile'
                }).catch((err) => {
                    this.$toaster.error('Profile update fail')
                    let errEmail = err.response.data.errors.email[0];
                    let errName = '';
                    if (err.response.data.errors.name)
                    {
                        errName = err.response.data.errors.name[0];
                    }
                    console.log(err.response.data.errors.email[0])
                    this.$refs.form.setErrors({
                        email: [errEmail],
                        name: [errName]
                    })
                })
            }
        }
    }
</script>

<style scoped>

</style>
