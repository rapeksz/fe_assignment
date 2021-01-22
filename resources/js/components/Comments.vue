<template>
    <div>
        <h3 class="text-center">Comments</h3><br/>

        <!-- TODO: can be removed when start to work -->
        <div class="alert alert-warning">
            <p>Hello! This is the PeakData task for FE developer.</p>
            <p>You need to implement ability to add comments and comments on comments, and [even] comments on comments on comments.</p>
            <p>As you might already guess - a nested level of commenting must be unlimited.</p>
            <p>Below, there is a hardcoded structure of how it should looks like.
                Please feel free to reuse or create your own one.
                Also, don't forget to add some styles to make it looks better.</p>
        </div>

        <tree :tree-data="posts"></tree>

        <form>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Type your comment here: </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Leave comment</button>
            </div>
        </form>
    </div>
</template>

<script>
    import Tree from "./Tree";
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
        components: {Tree},
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
