<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<h1>Hello world</h1>
<div id="app">
    <!-- We use router-links and not <a> because anchor tags come with an implicit page-reload. -->
    <router-link to="/">Home</router-link>
    <router-link to="/about">About</router-link>

    <!-- Alternative Syntax: -->
{{--    <router-link :to="{ name: 'about' }">About</router-link>--}}

    <router-view></router-view>
</div>
<script src="/js/app.js"></script>
</body>
</html>
