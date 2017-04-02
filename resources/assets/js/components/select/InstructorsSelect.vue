<template>
    <select v-model="model" class="form-control " style="width: 100%">
        <option v-for="opt in options" :value="opt.id">{{opt.aid}} - {{ opt.name }}</option>
    </select>
</template>

<script>

    export default {
        props: {
            'options': {
                type: Array,
                required: true,
                default: () => []
            },
            'value': {
                default: () => ''
            },

        },
        data () {
            return {
                model: ''
            }
        },
        mounted () {
            this.model = this.value
        },
        watch: {
            model (model) {
//                bus.$emit('adminSelectedCourse', model);
                this.$events.$emit('adminSelectedInstructor', model);
            },
            value (value) {
                this.model = value
            },
        },
    }
</script>