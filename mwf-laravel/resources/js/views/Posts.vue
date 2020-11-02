<template>
    <div class="container">
        <div class="row">
            <h1>Here are the posts:</h1>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <ul>
                        <li v-for="item in post" :key="item.message">
                            {{ item.message }} - {{ item.user_name }}
                        </li>
                    </ul>
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
