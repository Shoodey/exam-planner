<script>
    export default{

        current: null,

        courses: [
            {
                "id": 1,
                "code": "CSC 5538",
                "name": "Human-Computer Interaction",
                "sections": [
                    {
                        "code": "01",
                        "students": 7,
                        "instructor": "Violetta Cavalli Sforza",
                    }
                ]
            },
            {
                "id": 2,
                "code": "CSC 3315",
                "name": "Languages (and Compilers)",
                "sections": [
                    {
                        "code": "01",
                        "students": 20,
                        "instructor": "Violetta Cavalli Sforza",
                    },
                    {
                        "code": "02",
                        "students": 18,
                        "instructor": "John Doe",
                    }
                ]
            },
            {
                "id": 3,
                "code": "CSC 1234",
                "name": "Artificial Intelligence",
                "sections": [
                    {
                        "code": "01",
                        "students": 25,
                        "instructor": "Violetta Cavalli Sforza",
                    },
                    {
                        "code": "02",
                        "students": 22,
                        "instructor": "Jane Doe",
                    }
                ]
            }
        ],

        getAll(){
            return this.courses;
        },

        getCourses(){
            let data = [];
            this.courses.forEach(course => {
                data.push({
                    value: course.id,
                    label: course.code + " - " + course.name
                })
            });
            return data
        },

        getSelectedCoursesInfo(selected){
            let ids = [];
            let data = [];
            if (selected != null) {
                selected.forEach(s => {
                    ids.push(s.value)
                })

                this.courses.forEach(course => {
                    if (ids.includes(course.id)) {
                        data.push(course)
                    }
                })
            }

            return data;
        },

        save(selected){
            console.log(selected)
        }

    }
</script>
