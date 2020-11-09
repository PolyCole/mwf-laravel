<!--<template>-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-md-8 col-md-offset-2">-->
<!--                <div class="panel panel-default">-->
<!--                    <div class="panel-heading"> Home Page</div>-->
<!--                    <div class="panel-body">-->
<!--                        I'm an example component!-->
<!--                        <h2>Hello there, {{ currentUser.name }}</h2>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->
<!--<script>-->
<!--export default {-->
<!--    name : 'Home',-->
<!--    computed: {-->
<!--        currentUser() {-->
<!--            return this.$store.getters.currentUser-->
<!--        }-->
<!--    }-->
<!--}-->
<!--</script>-->

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
                <li>
                    <router-link to="/dashboard" class="nav-link">Dashboard</router-link>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{currentUser.name}} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="#!" @click.prevent="logout" class="dropdown-item">Logout</a>
                    </div>
                </li>
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
        }
    }
}
</script>
