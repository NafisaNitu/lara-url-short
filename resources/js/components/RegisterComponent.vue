<template>
    <div class="container">
        <div class="row align-items-center height-100vh">
            <div class="col-4 mx-auto max-width-none">
                <div class="card w-400 border-0 login-width">
                    <div class="card-body">
                        <div class="form-group col-12">
                            <h5>Create an account</h5>
                        </div>
                        <validationObserver ref="form" v-slot="{ handleSubmit }">

                            <form @submit.prevent="handleSubmit(submitRegister)">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">Username</label>

                                    <validationProvider name="Name" rules="required" v-slot="{ errors }">

                                    <input type="text" id="name" v-model="name" class="form-control" placeholder="Enter your Username">
                                        <span class="invalid-feedback d-block">{{ errors[0] }}</span>

                                    </validationProvider>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="mb-2">Email</label>

                                    <validationProvider name="Email" vid="email" rules="required|email" v-slot="{ errors }">
                                        <input type="email" id="email" v-model="email" class="form-control" placeholder="Enter your email">
                                        <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                                    </validationProvider>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="mb-2">Password</label>

                                    <validationProvider name="Password" rules="required|min:8" vid="confirmation" v-slot="{ errors }">

                                    <input type="password" id="password" v-model="password" class="form-control" placeholder="Enter your password">
                                        <span class="invalid-feedback d-block">{{ errors[0] }}</span>

                                    </validationProvider>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="mb-2">Confirm Password</label>

                                    <validationProvider name="Password confirmation" rules="required|min:8|confirmed:confirmation" v-slot="{ errors }">

                                    <input type="password" id="password-confirmation" v-model="password_confirmation" class="form-control" placeholder="Enter password confirmation">
                                        <span class="invalid-feedback d-block">{{ errors[0] }}</span>

                                    </validationProvider>
                                </div>
                                <div class="d-grid col-12 form-group mb-3">
<!--                                    <button class="btn btn-primary" @click.prevent="submitRegister">Signup</button>-->
                                    <button class="btn btn-primary" type="submit">Signup</button>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group">
                                        Already have an account?
                                        <a style="text-decoration: none" href="">Login</a>
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
        name: "RegisterComponent",
        data () {
            return {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            }
        },
        mounted() {
            // console.log('register component')
        },
        methods: {
            submitRegister(){
               axios.post('register', {
                   name: this.name,
                   email: this.email,
                   password: this.password,
                   password_confirmation: this.password_confirmation
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
