<script>
    export default{

        current: null,

        buildings: [
            {
                "id": 1,
                "name": "Building 1",
                "rooms": [
                    {
                        "number": 101,
                        "seats": 42,
                        "type": "Auditorium",
                        "type_slug": "auditorium"
                    },
                    {
                        "number": 102,
                        "seats": 20,
                        "type": "Individual desks",
                        "type_slug": "desks"
                    },
                    {
                        "number": 103,
                        "seats": 47,
                        "type": "Auditorium",
                        "type_slug": "auditorium"
                    },
                    {
                        "number": 'L1',
                        "seats": 47,
                        "type": "Laboratory",
                        "type_slug": "lab"
                    },
                    {
                        "number": 104,
                        "seats": 31,
                        "type": "Individual desks",
                        "type_slug": "desks"
                    }
                ]
            },
            {
                "id": 2,
                "name": "Building 2",
                "rooms": [
                    {
                        "number": 201,
                        "seats": 35,
                        "type": "Auditorium",
                        "type_slug": "auditorium"
                    },
                    {
                        "number": 'L2',
                        "seats": 23,
                        "type": "Laboratory",
                        "type_slug": "lab"
                    },
                    {
                        "number": 202,
                        "seats": 25,
                        "type": "Tables",
                        "type_slug": "tables"
                    },
                    {
                        "number": 203,
                        "seats": 26,
                        "type": "Tables",
                        "type_slug": "tables"
                    }
                ]
            },
            {
                "id": 3,
                "name": "Building 3",
                "rooms": [
                    {
                        "number": 301,
                        "seats": 18,
                        "type": "Individual desks",
                        "type_slug": "desks"
                    },
                    {
                        "number": 302,
                        "seats": 13,
                        "type": "Individual desks",
                        "type_slug": "desks"
                    },
                    {
                        "number": 303,
                        "seats": 52,
                        "type": "Auditorium",
                        "type_slug": "auditorium"
                    },
                    {
                        "number": 304,
                        "seats": 39,
                        "type": "Auditorium",
                        "type_slug": "auditorium"
                    },
                    {
                        "number": 305,
                        "seats": 33,
                        "type": "Tables",
                        "type_slug": "tables"
                    },
                    {
                        "number": 'L3',
                        "seats": 34,
                        "type": "Laboratory",
                        "type_slug": "lab"
                    },
                ]
            },
            {
                "id": 4,
                "name": "Building 4",
                "rooms": [
                    {
                        "number": 401,
                        "seats": 33,
                        "type": "Auditorium",
                        "type_slug": "auditorium"
                    },
                    {
                        "number": 402,
                        "seats": 35,
                        "type": "Individual desks",
                        "type_slug": "desks"
                    },
                    {
                        "number": 403,
                        "seats": 41,
                        "type": "Tables",
                        "type_slug": "tables"
                    }
                ]
            },
            {
                "id": 5,
                "name": "Building 5",
                "rooms": [
                    {
                        "number": 501,
                        "seats": 38,
                        "type": "Tables",
                        "type_slug": "tables"
                    },
                    {
                        "number": 502,
                        "seats": 44,
                        "type": "Tables",
                        "type_slug": "tables"
                    },
                    {
                        "number": 503,
                        "seats": 25,
                        "type": "Tables",
                        "type_slug": "tables"
                    },
                    {
                        "number": 504,
                        "seats": 39,
                        "type": "Auditorium",
                        "type_slug": "auditorium"
                    }
                ]
            },
            {
                "id": 6,
                "name": "Building 6",
                "rooms": [
                    {
                        "number": 601,
                        "seats": 14,
                        "type": "Individual desks",
                        "type_slug": "desks"
                    },
                    {
                        "number": 602,
                        "seats": 32,
                        "type": "Individual desks",
                        "type_slug": "desks"
                    },
                    {
                        "number": 603,
                        "seats": 18,
                        "type": "Individual desks",
                        "type_slug": "desks"
                    },
                    {
                        "number": 604,
                        "seats": 28,
                        "type": "Tables",
                        "type_slug": "tables"
                    }
                ]
            }
        ],

        getAll(){
            return this.buildings;
        },

           getBuildings(){
            let data = [];
            this.buildings.forEach(building => {
                data.push({
                    value: building.id,
                    label: building.name
                })
            });
            return data
        },

        getSelectedBuildingsInfo(selected){
            let ids = [];
            let data = [];
            if (selected != null) {
                selected.forEach(s => {
                    ids.push(s.value)
                })

                this.buildings.forEach(building => {
                    if (ids.includes(building.id)) {
                        data.push(building)
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
