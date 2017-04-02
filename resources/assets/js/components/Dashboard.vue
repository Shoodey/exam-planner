<template>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        <!--<p v-for="user in users">-->
                            <!--{{ user.name }}-->
                        <!--</p>-->
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        props: ['users'],
    }
</script>
