<template>
    <li>
        <div class="comment-box">
            <div class="comment-head">
                <span class="date">{{ node.created_at }}</span>
                <span class="separator">|</span>
                <span class="author">Author Name</span>
            </div>
            <div class="comment-body">
                <strong>COMMENT {{ node.index }} </strong> {{ node.body }}
            </div>
            <div class="comment-footer">
                <button class="btn btn-sm btn-primary" v-on:click="showReplyBox">Reply</button>
            </div>

            <reply ref="boxComponent" v-if="showBox"/>
        </div>
        <ul v-if="node.children_recursive && node.children_recursive.length">
            <node
                v-for="child in node.children_recursive"
                v-bind:node="child"
                v-bind:key="child.id"
            >
            </node>
        </ul>
    </li>
</template>

<script>
import Reply from "./Reply";

export default {
    name: "node",
    components: {
        Reply
    },
    data() {
        return {
            showBox: false
        }
    },
    created() {
        this.$root.$on('hideReplyBox', () => this.hideReplyBox());
    },
    methods: {
        hideReplyBox() {
            this.showBox = false;
        },
        showReplyBox() {
            this.$root.$emit('hideReplyBox');
            this.showBox = true;
        }
    },
    props: {
        node: Object
    }
}
</script>

<style scoped>

</style>
