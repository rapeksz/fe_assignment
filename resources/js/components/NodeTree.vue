<template>
    <li>
        <div class="comment-box">
            <div class="comment-head">
                <span class="date">{{ node.created_at }}</span>
                <span class="separator">|</span>
                <span class="author">Author Name</span>
            </div>
            <div class="comment-body">
                <strong>COMMENT 1.1.1</strong> {{ node.body }}
            </div>
            <div class="comment-footer">
                <button class="btn btn-sm btn-primary">Reply</button>
            </div>
        </div>

        <ul v-if="node.children_recursive && node.children_recursive.length">
            <node
                v-for="(child, key) in node.children_recursive"
                :node="child"
                :key="key"
            ></node>
        </ul>
    </li>
</template>

<script>
export default {
    name: "node",
    props: {
        node: Object
    }
}
</script>

<style scoped>

</style>
