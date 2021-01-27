<template>
    <ul>
        <node-tree
            v-for="node in treeData"
            v-bind:node="node"
            v-bind:key="node.id"
        >
        </node-tree>
    </ul>
</template>

<script>
import NodeTree from "./NodeTree";

export default {
    name: "tree",
    props: {
        treeData: Array
    },
    components: {NodeTree}
}
</script>

<style scoped>

</style>
