<template>
    <div class="box-body">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>School</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th width="150px">Nb. of student</th>
                        <th>Requestor</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="school in schools">
                        <template v-for="(course, ic) in school.courses">
                            <tr v-for="(section, is) in course.sections">
                                <td style="vertical-align: middle; text-align: center; background-color: #F9F9F9;" v-if="ic == 0 && is == 0" :rowspan="school.sections_count">{{ school.name }}</td>
                                <td style="vertical-align: middle; text-align: center"
                                    :rowspan="course.sections.length" v-if="is == 0">
                                    {{ course.label }}
                                </td>
                                <td>{{ section.code }}</td>
                                <td>{{ section.students_number }}</td>
                                <td> {{ section.instructor.aid }} - {{ section.instructor.name }}</td>
                            </tr>
                        </template>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['schools']
    }
</script>

<style>
    /* Cyan theme */
    #v-select .selected-tag {
        color: #dedede;
        background-color: #008D4C;
        border-color: #00763b;
    }

    #v-select.dropdown.open .dropdown-toggle,
    #v-select.dropdown.open .dropdown-menu {
        border-color: #008D4C;
    }

    #v-select .active a {
        background: rgba(50, 50, 50, .1);
        color: #333;
    }

    #v-select.dropdown .highlight a,
    #v-select.dropdown li:hover a {
        background: #00A65A;
        color: #fff;
    }
</style>