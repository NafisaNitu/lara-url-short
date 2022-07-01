<template>
    <div class="container">
        <div class="row align-items-center height-100vh">
            <div class="col-4 mx-auto max-width-none">
                <div class="card w-400 border-0 login-width">
                    <div class="card-body">
                        <div class="form-group col-12">
                            <h5>Sign into your account</h5>
                        </div>
                        <validationObserver ref="form" v-slot="{ handleSubmit }">

                            <form @submit.prevent="handleSubmit(userLogin)">
                                <div class="form-group mb-3">
                                    <label for="email" class="mb-2">Email</label>

                                    <validationProvider vid="email" name="Email" rules="required|email" v-slot="{ errors }">

                                        <input type="email" id="email" v-model="email" class="form-control" placeholder="Enter your email">
                                        <span class="invalid-feedback d-block">{{ errors[0] }}</span>

                                    </validationProvider>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="mb-2">Password</label>

                                    <validationProvider name="Password" rules="required|min:8" v-slot="{ errors }">

                                        <input type="password" id="password" v-model="password" class="form-control" placeholder="Enter your password">
                                        <span class="invalid-feedback d-block">{{ errors[0] }}</span>

                                    </validationProvider>
                                </div>
                                <div class="form-group flexbox py-3 form-style mb-3">
                                    <div class="custom-control custom-checkbox pl-0">
                                        <input type="checkbox" name="remember"> Remember Me
                                    </div>
                                </div>
                                <div class="d-grid col-12 form-group mb-3">
<!--                                    <button class="btn btn-primary" @click.prevent="submitLogin">Login</button>-->

                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group">
                                        Don't have an account?
                                        <a style="text-decoration: none" href="">Create Account</a>
                                    </div>
                                </div>
                            </form>

                        </validationObserver>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "LoginComponent",
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            userLogin() {
                axios.post('login',{
                    email: this.email,
                    password: this.password
                }).then((res) => {
                    location.href = 'dashboard'
                }).catch((err) => {
                    let errEmail = err.response.data.errors.email[0];
                    let errPass = '';
                    if (err.response.data.errors.password)
                    {
                        errPass = err.response.data.errors.password[0];
                    }
                    console.log(err.response.data.errors.email[0])
                    this.$refs.form.setErrors({
                        email: [errEmail],
                        password: [errPass]
                    })
                })
            }
        }
    }
</script>

<style scoped>

</style>
