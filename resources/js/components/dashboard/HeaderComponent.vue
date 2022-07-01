<template>
    <div class="main-header">
        <div class="logo-header">
            <a class="nav-link" href="#">AppName</a>
            <button class="navbar-toggler sidenav-toggler m-lg-auto" type="button" data-toggle="collapse" data-target="collapse">
                <i class="fa fa-bars"></i>
            </button>
            <button class="topbar-toggler more"><i class="fa fa-ellipsis"></i></button>
        </div>
        <nav class="navbar nav-header navbar-expand-lg">
            <div class="container-fluid">
                <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
<!--                    <li class="nav-item dropdown">-->
<!--                        <a id="navbarDropdown"  href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                            User Name <span class="caret"></span>-->
<!--                        </a>-->
<!--                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">-->
<!--                            <a class="dropdown-item" href="/">Home</a>-->
<!--                            <a class="dropdown-item" href="/profile">Profile</a>-->
<!--                            <a class="dropdown-item" href="/">Logout</a>-->
<!--                            <div class="dropdown-divider"></div>-->
<!--                        </div>-->
<!--                    </li>-->

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="images/default.png" alt="image" width="50" class=""><span>{{ profile.name }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <div class="user-box">
                                    <div class="U-img"><img src="images/default.png" alt="image" width="70" class="img-circle"></div>
                                    <div class="U-text">
                                        <h5>{{ profile.name }}</h5>
                                        <p class="text-muted">{{ profile.email }}</p>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/">Home</a>
                                <a class="dropdown-item" href="/profile">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" @click="logOut">Logout</a>
                            </li>
                        </ul>

                    </li>

                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        props:['profile'],
        name: "HeaderComponent",
        methods: {
            logOut() {
                axios.post('logout', {})
                .then((res) => {
                    this.$toaster.success('Logout successfully')
                    location.href = 'http://localhost/vue/lara-url-short/public/';
                })
            }
        }
    }
</script>

<style scoped>

</style>
