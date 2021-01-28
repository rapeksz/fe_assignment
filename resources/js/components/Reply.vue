<template>
    <form @submit.prevent="submit">
        <input type="hidden" name="parent_id" v-model="fields.parent_id = this.$parent.box.parentId">
        <div class="mb-3" v-if="!success">
            <label for="exampleFormControlTextarea1" class="form-label">Type your comment here: </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body" v-model="fields.body"></textarea>
            <div v-if="errors && errors.body" class="text-danger">{{ errors.body[0] }}</div>
        </div>
        <div class="mb-3" v-if="!success">
            <button class="btn btn-primary">Leave comment</button>
        </div>
        <div v-if="success" class="alert alert-success mt-3">
            Comment added!
        </div>
    </form>
</template>

<script>
export default {
    name: "reply",
    data () {
        return {
            fields: {},
            errors: {},
            success: false,
            loaded: true,
            action: '/api/comments',
        }
    },
    methods: {
        submit() {
            if (this.loaded) {
                this.loaded = false;
                this.success = false;
                this.errors = {};
                axios.post(this.action, this.fields).then(response => {
                    this.fields = {};
                    this.loaded = true;
                    this.success = true;
                    this.$root.$emit('commentAdded');
                }).catch(error => {
                    this.loaded = true;
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
            }
        }
    }
}
</script>

<style scoped>

</style>
