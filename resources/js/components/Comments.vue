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

        <ul>
            <li>
                <div class="comment-box">
                    <div class="comment-head">
                        <span class="date">2021-01-01</span>
                        <span class="separator">|</span>
                        <span class="author">Author Name</span>
                    </div>
                    <div class="comment-body">
                        <strong>COMMENT 1.</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ullamcorper tristique molestie.
                    </div>
                    <div class="comment-footer">
                        <button class="btn btn-sm btn-primary">Reply</button>
                    </div>
                </div>

                <ul>
                    <li>
                        <div class="comment-box">
                            <div class="comment-head">
                                <span class="date">2021-01-01</span>
                                <span class="separator">|</span>
                                <span class="author">Author Name</span>
                            </div>
                            <div class="comment-body">
                                <strong>COMMENT 1.1</strong> Duis eu lectus lectus. Quisque erat tortor, ultricies a libero vitae, malesuada ultricies sem.
                            </div>
                            <div class="comment-footer">
                                <button class="btn btn-sm btn-primary">Reply</button>
                            </div>
                        </div>

                        <ul>
                            <li>
                                <div class="comment-box">
                                    <div class="comment-head">
                                        <span class="date">2021-01-01</span>
                                        <span class="separator">|</span>
                                        <span class="author">Author Name</span>
                                    </div>
                                    <div class="comment-body">
                                        <strong>COMMENT 1.1.1</strong> Duis eu lectus lectus. Quisque erat tortor, ultricies a libero vitae, malesuada ultricies sem.
                                    </div>
                                    <div class="comment-footer">
                                        <button class="btn btn-sm btn-primary">Reply</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="comment-box">
                            <div class="comment-head">
                                <span class="date">2021-01-01</span>
                                <span class="separator">|</span>
                                <span class="author">Author Name</span>
                            </div>
                            <div class="comment-body">
                                <strong>COMMENT 1.2</strong> Aenean molestie, magna eget interdum mattis, ipsum mi ultricies mauris, vitae euismod dolor enim sed turpis.
                            </div>
                            <div class="comment-footer">
                                <button class="btn btn-sm btn-primary">Reply</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>

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
    export default {
        data() {
            return {
                posts: []
            }
        },
        methods: {

        },
        mounted() {
            this.axios
                .get('/api/comments');
        },
    }
</script>
