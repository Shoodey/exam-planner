<template>
    <div class="box-body">

        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>School</th>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Number of students</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="section in sections">
                    <td>
                         <span class="label label-primary text-medium">
                            {{ section.course.school.name }}
                        </span>
                    </td>

                    <td>{{ section.course.code }} - {{ section.course.name }}</td>
                    <td>{{ section.course.code }} {{ section.code }}</td>
                    <td>{{ section.students_number }}</td>


                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        props: ['sections'],

        data(){
            return {}
        },

        methods: {
            labelSchool(school_id){
                switch (school_id) {
                    case "1":
                        return "label-primary";
                    case "2":
                        return "label-info";
                    case "3":
                        return "label-warning";
                    case "4":
                        return "label-success";
                }
            }
        }

    }
</script>