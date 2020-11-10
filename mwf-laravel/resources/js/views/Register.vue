<template>
    <div class="login row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="register">
                        <div class="form-group row" v-if="regError">
                            <p class="error">
                                {{regError}}
                            </p>
                        </div>
                        <div class="form-group row">
                            <ValidationProvider name="Name" rules="required">
                                <div slot-scope="{ errors }">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" v-model="formRegister.name" placeholder="Name" id="name">
                                    <span class="invalid-feedback" role="alert">{{ errors[0] }}</span>
                                </div>
                            </ValidationProvider>
                        </div>
                        <div class="form-group row">
                            <ValidationProvider name="email" rules="required|email">
                                <div slot-scope="{ errors }">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" v-model="formRegister.email" placeholder="Email address" id="email">
                                    <span class="invalid-feedback" role="alert">{{ errors[0] }}</span>
                                </div>
                            </ValidationProvider>
                        </div>
                        <div class="form-group row">
                            <ValidationProvider name="password" rules="required">
                                <div slot-scope="{ errors }">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" v-model="formRegister.password" placeholder="password" id="password">
                                    <span class="invalid-feedback" role="alert">{{ errors[0] }}</span>
                                </div>
                            </ValidationProvider>
                        </div>
                        <div class="form-group row">
                            <input type="submit" value="Register" class="btn btn-outline-primary ml-auto">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {registerUser} from '../auth';


export default {
    data(){
        return {
            formRegister: {
                name: '',
        email: '',
        password: ''
    },
        error: null
    }
    },
    methods:{
        register(){
            registerUser(this.$data.formRegister)
                .then(res => {
                    console.log(res);
                    this.$store.commit("registerSuccess", res);
                    this.$router.push({path: '/login'});
                })
                .catch(error => {
                        this.$store.commit("registerFailed", {error});
                    })
                }
        },
        computed:{
            regError(){
                return this.$store.getters.regError
            }
        }
    }
</script>
<style scoped>
.error{
    text-align: center;
    color: red;
}
</style>
