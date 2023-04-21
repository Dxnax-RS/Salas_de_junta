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
                    <input type="date" class="form-control" v-model="userDate">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">search</button>
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
                    start: '08:00 ',
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
            userDate: []
        }
    },
    methods: {
        async getDate(){
            axios.get('/api/date')
                .then((response) => {
                    this.date = response
                })
        },
        async getBoardrooms(){
            axios.get('/api/boardrooms')
                .then((response) => {
                    this.boardrooms = response
                })
        }
    },
    mounted(){
        this.getDate()
        this.getBoardrooms();
    },
}
</script>

<style>

</style>