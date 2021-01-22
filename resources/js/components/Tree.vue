<template>
    <ul>
        <node-tree
            v-for="(node, key) in treeData"
            :node="node"
            :key="key"
        >
        </node-tree>
    </ul>
</template>

<script>
import NodeTree from "./NodeTree";

export default {
    props: {
        treeData: Array
    },
    components: {NodeTree}
}
</script>

<style scoped>

</style>
