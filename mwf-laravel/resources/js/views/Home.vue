<template>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel mb-4">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent"><div class="navbar-nav ml-auto">
            <template v-if="!currentUser">
                <li>
                    <router-link to="/login" class="nav-link">Login</router-link>
                </li>
                <li>
                    <router-link to="/register" class="nav-link">Register</router-link>
                </li>
            </template>
            <template v-else>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{currentUser.name}} <span class="caret"></span>
                    </a>
                </li>
                <a href="#!" @click.prevent="logout" class="dropdown-item">Logout</a>
                <h1>Hello, {{currentUser.name}}</h1>
            </template>
        </div>
        </div>
    </div>
    </nav>
</template>
<script>
export default {
    name: 'app-header',
    methods:{
        logout(){
            this.$store.commit('logout');
            this.$router.push('/login');
        }
    },
    computed:{
        currentUser(){
            return this.$store.getters.currentUser
        },
        isLoggedIn() {
            return this.$store.getters.isLoggedIn
        }
    }
}
</script>
