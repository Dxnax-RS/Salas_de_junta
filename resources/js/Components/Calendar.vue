<template>
    <div>
        <div class="card mx-auto" style="width: 75rem;">
            <div class="card-body">
                <table class="table table-sm" v-if="boardrooms.data">
                    <thead>
                        <tr>
                            <th scope="col">Hora</th>
                            <th v-for="boardroom in boardrooms.data" scope="col">{{ boardroom.name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="hour in hours">
                            <th scope="row">{{ hour.start }} - {{ hour.end }}</th>
                            <td v-for="boardroom in boardrooms.data" v-bind:id="boardroom.name + hour.id"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card mx-auto" style="width: 75rem;">
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="date" class="form-control" v-model="reservation.date">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" @click="markSchedule()">search</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mx-auto" style="width: 75rem;" id="showForm">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="boardSelect" class="form-label">Sala de juntas</label>
                    <select id="boardSelect" class="form-select" aria-label="Default select example" v-model="reservation.boardroom_id">
                        <option v-for="board in boardrooms.data" v-bind:value="board.id">{{ board.name }}</option>
                    </select>
                    <label for="startSelect" class="form-label">Hora de inicio</label>
                    <select id="startSelect" class="form-select" aria-label="Default select example" v-model="reservation.start">
                        <option v-for="hour in hours" v-bind:value="hour.start + ':00'">{{ hour.start }}</option>
                    </select>
                    <label for="endSelect" class="form-label">Hora de fin</label>
                    <select id="endSelect" class="form-select" aria-label="Default select example" v-model="reservation.end">
                        <option v-for="hour in hours" v-bind:value="hour.end + ':00'">{{ hour.end }}</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" @click="submitReservation()">search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Calendar',

    data()
    {
        return {
            date: [], //array [Year, Month, Day]
            boardrooms: [],
            hours: [
                {
                    start: '08:00',
                    end: '08:30',
                    id: 1
                },
                {
                    start: '08:30',
                    end: '09:00',
                    id: 2
                },
                {
                    start: '09:00',
                    end: '09:30',
                    id: 3
                },
                {
                    start: '09:30',
                    end: '10:00',
                    id: 4
                },
                {
                    start: '10:00',
                    end: '10:30',
                    id: 5
                },
                {
                    start: '10:30',
                    end: '11:00',
                    id: 6
                },
                {
                    start: '11:00',
                    end: '11:30',
                    id: 7
                },
                {
                    start: '11:30',
                    end: '12:00',
                    id: 8
                },
                {
                    start: '12:00',
                    end: '12:30',
                    id: 9
                },
                {
                    start: '12:30',
                    end: '13:00',
                    id: 10
                },
                {
                    start: '13:00',
                    end: '13:30',
                    id: 11
                },
                {
                    start: '13:30',
                    end: '14:00',
                    id: 12
                },
                {
                    start: '14:00',
                    end: '14:30',
                    id: 13
                },
                {
                    start: '14:30',
                    end: '15:00',
                    id: 14
                },
                {
                    start: '15:00',
                    end: '15:30',
                    id: 15
                },
                {
                    start: '15:30',
                    end: '16:00',
                    id: 16
                },
                {
                    start: '16:00',
                    end: '16:30',
                    id: 17
                },
                {
                    start: '16:30',
                    end: '17:00',
                    id: 18
                },
            ],
            reservationsForDay: [],
            idStart: -1,
            idEnd: -1,
            reservation: {
                "boardroom_id": "",
                "user_id": "1",
                "date": "",
                "start": "",
                "end": ""
            },

        }
    },
    methods: {
        async getDate(){
            axios.get('/api/date')
                .then((response) => {
                    this.date = response;
                });
            let form = document.getElementById("showForm")
            form.style.display = "none";
        },
        async getBoardrooms(){
            axios.get('/api/boardrooms')
                .then((response) => {
                    this.boardrooms = response;
                });
        },
        async getReservation(){
            let response
            return response.data
        },
        async markSchedule(){
            if(this.userDate === "")
            {
                return;
            }

            let reservations = await axios.get('/api/reservation/'+this.reservation.date);
            this.reservationsForDay = reservations;

            reservations.data.forEach(reser => {
                
                let boardroomName

                this.boardrooms.data.forEach(board => {
                    if(board.id == reser.boardroom_id)
                    {
                        boardroomName = board.name;
                    }
                });

                this.hours.forEach(hour => {
                    if(hour.start === reser.start.substring(0, 5))
                    {
                        this.idStart = hour.id;
                    }
                    if(hour.end === reser.end.substring(0, 5))
                    {
                        this.idEnd = hour.id;
                    }
                });

                for(let i = this.idStart; i <= this.idEnd; i++)
                {
                    document.getElementById(boardroomName+i).className = 'table-danger';
                }
            });
            let form = document.getElementById("showForm");
            form.style.display = "block";
        },

        validateReservation(){
            let valid = {v : true}
            this.reservationsForDay.data.forEach(reserv => {

                if(reserv.boardroom_id != this.reservation.boardroom_id && valid.v)
                {
                    return;
                }

                if(this.reservation.start > reserv.start)
                {
                    if(this.reservation.start < reserv.end)
                    {
                        valid.v = false;
                    }
                }
                else if(this.reservation.end > reserv.start)
                {
                    valid.v = false;
                }
            });

            return valid.v;
        },

        async submitReservation()
        {
            if(!this.validateReservation())
            {
                return;
            }
            await axios.post("/api/reservation", this.reservation);
            this.markSchedule();
        },

    },
    mounted(){
        this.getDate();
        this.getBoardrooms();
    },
}
</script>

<style>

</style>