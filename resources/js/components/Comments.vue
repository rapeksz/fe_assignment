<template>
    <div>
        <h3 class="text-center">Comments</h3><br/>
        <tree :tree-data="posts"></tree>
    </div>
</template>

<script>
    import Tree from "./Tree";
    import Reply from "./Reply";
    function Post({ id, index, parent_id, body, created_at }) {
        this.id = id;
        this.index = index;
        this.parent_id = parent_id;
        this.body = body;
        this.created_at = created_at;
        this.children_recursive = [];
    }

    function buildPosts(data, index) {
        const post = new Post(data);
        post.index = index;
        const children = data.children_recursive;
        if (children.length) {
            children.forEach((child, key) => post.children_recursive.push(buildPosts(child, post.index + '.' + (key + 1))));
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
        created() {
            this.$root.$on('commentAdded', () => this.refreshPosts());
        },
        methods: {
            async read() {
                this.axios.get('/api/comments').then((response) => {
                    response.data.forEach((post, index) => this.posts.push(buildPosts(post, index + 1)));
                });
            },
            refreshPosts() {
                this.posts = [];
                this.read();
            }
        },
        mounted() {
            this.read();
        },
    }
</script>
