<template>
    <div class="login row justify-content-center">
        <div class="col-md-6"  style="margin-bottom: 30px;">
            <div v-if="registeredUser" class="text-success">Thank you {{registeredUser.name}}.You can now login</div>
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="authenticate">
                        <div class="form-group row" v-if="authError">
                            <p class="error">
                                {{authError}}
                            </p>
                        </div>

                        <ValidationProvider name="email" rules="required|email">
                            <div slot-scope="{ errors }">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" v-model="formLogin.email" placeholder="Email address" id="email">
                                <p class="error">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>

                        <ValidationProvider name="password" rules="required">
                            <div slot-scope="{ errors }">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" v-model="formLogin.password" placeholder="password" id="password">
                                <p class="error">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                        <div class="form-group row">
                            <input type="submit" value="Login" class="btn btn-outline-primary ml-auto">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {login} from '../auth';
export default {
    data(){
        return {
            formLogin: {
                email: '',
        password: ''
    },
        error: null
    }
    },
    methods:{
        authenticate(){
            this.$store.dispatch('login');
            login(this.$data.formLogin)
                .then(res => {
                    this.$store.commit("loginSuccess", res);
                    this.$router.push({path: '/'});
                })
                .catch(error => {
                        this.$store.commit("loginFailed", {error});
                    })
                }
        },
        computed:{
            authError(){
                return this.$store.getters.authError
            },
            registeredUser(){
                return this.$store.getters.registeredUser
            }
        }
    }</script>
<style scoped>
.error{
    text-align: center;
    color: red;
}
</style>
