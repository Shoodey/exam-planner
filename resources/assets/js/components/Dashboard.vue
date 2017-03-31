<template>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        {{ user }}
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        props: ['user'],
    }
</script>
