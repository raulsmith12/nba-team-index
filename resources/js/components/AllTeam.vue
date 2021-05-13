<template>
    <div class="container-fluid">
        <h2 class="text-center">Teams List</h2>
        <div class="row text-center">
            <div v-for="team in teams" :key="team.id" class="col-md-4 px-2 py-2">
                <div v-for="i in iconColor(team.team_name)" :key="i.id">
                    <div class="container px-2 py-2 shadow" :style="{ backgroundColor: `#${i.color_3}`, border: `2px groove #${i.color_2}` }">
                        <div class="card">
                            <h2 class="card-header" :style="{ backgroundColor: `#${i.color_1}`, color: `#${i.color_4}`}">{{ team.city_name }} {{ team.team_name }}</h2>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-3">
                                        <img :src="team.logo_url" width="100%" />
                                    </div>
                                    <div class="col-3">
                                        <h6>Since {{ team.year_started }}</h6>
                                    </div>
                                    <div class="col-6">
                                        Conference:<br />
                                        {{ team.conference }}<br />
                                        Division:<br />
                                        {{ team.division }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 px-1 py-1" v-for="p in currentPlayer(team.team_name)" :key="p.id">
                                        <img :src="p.image_url" width="100%" :style="{ border: `1px solid #${i.color_4}`, borderBottom: 0, backgroundColor: `#${i.color_1}` }" /><br><br>
                                        <h5 :style="{ color: `#${i.color_1}` }">{{ p.first_name }}<br>{{ p.last_name }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right" :style="{ backgroundColor: `#${i.color_2}` }">
                                <router-link :to="{ path: `/team/${team.id}` }" tag="button" class="btn" :style="{ backgroundColor: `#${i.color_1}`, color: `#${i.color_4}`, border: `3px solid #${i.color_4}` }">
                                    <span class="h4">More Info</span>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                teams: [],
                icon: [],
                players: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/teams')
                .then(response => {
                    this.teams = response.data;
                });
            this.axios
                .get('http://localhost:8000/api/icon_colors')
                .then(response => {
                    this.icon = response.data;
                });
            this.axios
                .get('http://localhost:8000/api/current_players')
                .then(response => {
                    this.players = response.data;
                });
        },
        methods: {
            iconColor(team) {
                return this.icon.filter(i => i.team_name === team)
            },
            currentPlayer(team) {
                return this.players.filter(i => i.team_name === team)
            }
        }
    }
</script>
