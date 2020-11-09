<template>
    <div class="container">
        <div class="row">
            <h1>Here are the posts:</h1>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="list-group">
                        <div v-for="item in post" :key="item.id" class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ item.user_name }}</h5>
                                <small>{{ item.created_at }}</small>
                            </div>
                            <p class="mb-1">{{ item.message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: 'Posts',
    data() {
        return {
            post: null,
        };
    },
    created: function() {
        axios
            .get("http://127.0.0.1:8000/api/posts")
            .then(res => {
                this.post = res.data;
            })
    }
};
</script>
