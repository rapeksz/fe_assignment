<template>
    <form>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Type your comment here: </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Leave comment</button>
        </div>
    </form>
</template>

<script>
export default {
    name: "reply",
    data () {
        return {
            showBox: false
        }
    },
    methods: {
        hideReplyBox() {
            this.showBox = false;
        }
    }
}
</script>

<style scoped>

</style>
