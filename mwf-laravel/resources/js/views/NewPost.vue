<template>
    <div class="login row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>New Post</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="authenticate">
                        <div class="form-group row" v-if="authError">
                            <p class="error">
                                {{ authError }}
                            </p>
                        </div>

                        <ValidationProvider name="username" rules="required">
                            <div slot-scope="{ errors }">
                                <label for="username">Username</label>
                                <input type="username" class="form-control"
                                       id="username" value="anonymous">
                                <p class="error">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>

                        <ValidationProvider name="message" rules="required">
                            <div slot-scope="{ errors }">
                                <label for="message">Message</label>
                                <textarea type="text" class="form-control"
                                       placeholder="Write your message here."
                                          id="message"></textarea>
                                <p class="error">{{ errors[0] }}</p>
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

export default {
    name: 'NewPost'
}
</script>

<style scoped>
.error{
    text-align: center;
    color: red;
}
</style>
