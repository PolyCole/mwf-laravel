<template>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel mb-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="btn btn-secondary" to="/posts">Posts</router-link>
                        </li>
                        <template v-if="!currentUser">
                            <li>
                                <router-link class="btn btn-success" to="/login">Login</router-link>
                            </li>
                            <li>
                                <router-link class="btn btn-dark" to="/register">Register</router-link>
                            </li>
                        </template>
                        <template v-else>
                            <li>
                                <a href="#" @click.prevent="logout" class="btn btn-danger">Logout</a>
                            </li>
                        </template>

                    </ul>
                </div>
            </nav>
        </nav>
        <div id="navbarSupportedContent">
            <div class="container">
                <template v-if="!currentUser">
                    <h2>Hello and welcome to the bulletin board.</h2>
                </template>
                <template v-else>
                    <h1>Hello there, {{currentUser.name}}</h1>
                </template>
                <p>Access all past posts, and make one of your own, by heading over to the "posts" section.</p>

            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'app-header',
    methods: {
        logout:function(){
            this.$store.commit('logout');
            this.$router.push('/login');
        }
    },
    computed: {
        currentUser() {
            return this.$store.getters.currentUser
        },
        isLoggedIn() {
            return this.$store.getters.isLoggedIn
        }
    },
    data: () => ({
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }),
}
</script>
