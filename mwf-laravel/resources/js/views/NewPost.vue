<template>
    <div class="login row justify-content-center">
        <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="card">
                <div class="card-header">
                    <h3>New Post</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="sendMessage">
                        <ValidationProvider name="username" rules="required">
                            <div slot-scope="{ errors }">
                                <label for="username">Username</label>
                                <input type="username" class="form-control"
                                       id="username" value="anonymous" v-model="messageContent.user_name">
                                <p class="error">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>

                        <ValidationProvider name="message" rules="required" v-model="messageContent.message">
                            <div slot-scope="{ errors }">
                                <FormulateInput
                                    type="textarea"
                                    v-model="messageContent.message"
                                    label="Message"
                                    validation="required"
                                />
                            </div>
                        </ValidationProvider>

                        <div class="form-group row">
                            <input type="submit" value="Post" class="btn btn-outline-primary ml-auto">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {newPost} from '../auth';

export default {
    data() {
        return{
            messageContent: {
                user_name: '',
                message: ''
            },
            error: null
        }
    },
    methods: {
        sendMessage() {
            // this.$store.dispatch('newPost');
            console.log(this.$data.messageContent);
            newPost(this.$data.messageContent)
            .then(res => {
                // this.$store.commit("newPostSuccess", res);
                this.$router.push({path: '/'});
            })
            .catch(error => {
                // this.$store.commit("postFailed", {error});
            })
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
