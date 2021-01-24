<template>
    <div>
        <h3 class="text-center">Comments</h3><br/>
        <tree :tree-data="posts"></tree>
    </div>
</template>

<script>
    import Tree from "./Tree";
    import Reply from "./Reply";
    function Post({ id, body, created_at }) {
        this.id = id;
        this.body = body;
        this.created_at = created_at;
        this.children_recursive = [];
    }

    function buildPosts(data) {
        let post = new Post(data);
        let children = data.children_recursive;
        if (children.length) {
            children.forEach(child => post.children_recursive.push(buildPosts(child)));
        }

        return post;
    }

    export default {
        components: {Reply, Tree},
        data() {
            return {
                posts: []
            }
        },
        methods: {
            async read() {
                this.axios.get('/api/comments').then((response) => {
                    response.data.forEach(post => this.posts.push(buildPosts(post)));
                });
            }
        },
        mounted() {
            this.read();
        },
    }
</script>
