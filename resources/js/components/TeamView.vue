<template>
    <div class="container-fluid">
        <!-- Header with Team Name and changing color schemes and logo on the right -->
        <div class="row">
            <div v-if="color1" class="col-10 offset-1 px-4 py-4" :style="{ backgroundColor: `#${color3}`, border: `3px solid #${color4}` }">
                <div v-if="colorg" class="px-4 py-4" :style="{ background: colorg, border: `2px solid #${color2}` }">
                    <h2 class="text-center" :style="{ color: `#${color4}`, textShadow: `1px 1px 0 #${color2}, -1px 1px 0 #${color2}, 1px -1px 0 #${color2}, -1px -1px 0 #${color2}, 0 0 5px #${color3}` }">{{ team.city_name }} {{ team.team_name }}</h2>
                </div>
                <div v-else class="px-4 py-4" :style="{ backgroundColor: `#${color1}`, border: `2px solid #${color2}` }">
                    <h2 class="text-center" :style="{ color: `#${color4}`, textShadow: `1px 1px 0 #${color2}, -1px 1px 0 #${color2}, 1px -1px 0 #${color2}, -1px -1px 0 #${color2}, 0 0 5px #${color3}` }">{{ team.city_name }} {{ team.team_name }}</h2>
                </div>
            </div>
            <div v-else v-for="association in associations" :key="association.id" class="col-10 offset-1 px-4 py-4" :style="{ backgroundColor: `#${association.color_3}`, border: `3px solid #${association.color_4}` }">
                <div class="px-4 py-4" :style="{ backgroundColor: `#${association.color_1}`, border: `2px solid #${association.color_2}` }">
                    <h2 class="text-center" :style="{ color: `#${association.color_4}`, textShadow: `1px 1px 0 #${association.color_2}, -1px 1px 0 #${association.color_2}, 1px -1px 0 #${association.color_2}, -1px -1px 0 #${association.color_2}, 0 0 5px #${association.color_3}` }">{{ team.city_name }} {{ team.team_name }}</h2>
                </div>
            </div>
            <div class="col-1 text-right">
                <img :src="team.logo_url" width="100%" />
            </div>
        </div>
        <!-- If team has any previous known names, they will show here -->
        <div class="row">
            <h6 v-if="otherNames.length">
                <span v-for="name in otherNames" :key="name.id">
                    --> {{ name.past_city }} {{ name.past_name }}
                </span>
            </h6>
        </div>
        <!-- Color scheme boxes designed to change the color scheme of the header -->
        <div class="row justify-content-center">
            <div class="col-2" v-for="association in associations" :key="association.id">
                <div class="row py-2">
                    <div class="col">
                        <div v-on:click="changeColors(association)" class="shadow text-center px-2 py-2" style="width: 98%; height: 160px" :style="{ backgroundColor: `#${association.color_3}`, border: `3px solid #${association.color_4}` }">
                            <div class="shadow" style="width: 100%; height: 139px" :style="{ backgroundColor: `#${association.color_1}`, border: `2px solid #${association.color_2}` }">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4 class="text-center" :style="{ color: `#${association.color_2}`, textShadow: `0 0 2px #${association.color_3}, 0 0 5px #${association.color_4}` }">Association</h4>
                    </div>
                </div>
            </div>
            <div class="col-2" v-for="icon in icons" :key="icon.id">
                <div class="row py-2">
                    <div class="col">
                        <div v-on:click="changeColors(icon)" class="shadow text-center px-2 py-2" style="width: 98%; height: 160px" :style="{ backgroundColor: `#${icon.color_3}`, border: `3px solid #${icon.color_4}` }">
                            <div class="shadow" style="width: 100%; height: 139px" :style="{ backgroundColor: `#${icon.color_1}`, border: `2px solid #${icon.color_2}` }">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4 class="text-center" :style="{ color: `#${icon.color_1}`, textShadow: `0 0 2px #${icon.color_2}, 0 0 5px #${icon.color_3}` }">Icon</h4>
                    </div>
                </div>
            </div>
            <div class="col-2" v-for="statement in statements" :key="statement.id">
                <div class="row py-2">
                    <div class="col">
                        <div v-on:click="changeColors(statement)" class="shadow text-center px-2 py-2" style="width: 98%; height: 160px" :style="{ backgroundColor: `#${statement.color_3}`, border: `3px solid #${statement.color_4}` }">
                            <div class="shadow" style="width: 100%; height: 139px" :style="{ backgroundColor: `#${statement.color_1}`, border: `2px solid #${statement.color_2}` }"> 
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4 class="text-center" :style="{ color: `#${statement.color_1}`, textShadow: `0 0 2px #${statement.color_2}, 0 0 5px #${statement.color_3}` }">Statement</h4>
                    </div>
                </div>
            </div>
            <div class="col-2" v-for="city in citys" :key="city.id">
                <div class="row py-2">
                    <div class="col" v-if="city.color_gradient !== null" >
                        <div v-on:click="changeColors(city)" class="shadow text-center px-2 py-2" style="width: 98%; height: 160px" :style="{ backgroundColor: `#${city.color_3}`, border: `3px solid #${city.color_4}` }">
                            <div class="shadow" style="width: 100%; height: 139px" :style="{ background: city.color_gradient, border: `2px solid #${city.color_2}` }"> 
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="col" v-else>
                        <div v-on:click="changeColors(city)" class="shadow text-center px-2 py-2" style="width: 98%; height: 160px" :style="{ backgroundColor: `#${city.color_3}`, border: `3px solid #${city.color_4}` }">
                            <div class="shadow" style="width: 100%; height: 139px" :style="{ backgroundColor: `#${city.color_1}`, border: `2px solid #${city.color_2}` }"> 
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4 v-if="city.color_1 !== 'ffffff'" class="text-center" :style="{ color: `#${city.color_1}`, textShadow: `0 0 2px #${city.color_2}, 0 0 5px #${city.color_3}` }">City</h4>
                        <h4 v-else class="text-center" :style="{ color: `#${city.color_2}`, textShadow: `0 0 2px #${city.color_3}, 0 0 5px #${city.color_4}` }">City</h4>
                    </div>
                </div>
            </div>
            <div class="col-2" v-for="earned in earneds" :key="earned.id">
                <div class="row py-2">
                    <div class="col">
                        <div v-on:click="changeColors(earned)" class="shadow text-center px-2 py-2" style="width: 98%; height: 160px" :style="{ backgroundColor: `#${earned.color_3}`, border: `3px solid #${earned.color_4}` }">
                            <div class="shadow" style="width: 100%; height: 139px" :style="{ backgroundColor: `#${earned.color_1}`, border: `2px solid #${earned.color_2}` }"> 
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4 class="text-center" :style="{ color: `#${earned.color_1}`, textShadow: `0 0 2px #${earned.color_2}, 0 0 5px #${earned.color_3}` }">Earned</h4>
                    </div>
                </div>
            </div>
            <div class="col-2" v-for="classic in classics" :key="classic.id">
                <div class="row py-2">
                    <div class="col" v-if="classic.color_gradient">
                        <div v-on:click="changeColors(classic)" class="shadow text-center px-2 py-2" style="width: 98%; height: 160px" :style="{ backgroundColor: `#${classic.color_3}`, border: `3px solid #${classic.color_4}` }">
                            <div class="shadow" style="width: 100%; height: 139px" :style="{ background: classic.color_gradient, border: `2px solid #${classic.color_2}` }"> 
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="col" v-else>
                        <div v-on:click="changeColors(classic)" class="shadow text-center px-2 py-2" style="width: 98%; height: 160px" :style="{ backgroundColor: `#${classic.color_3}`, border: `3px solid #${classic.color_4}` }">
                            <div class="shadow" style="width: 100%; height: 139px" :style="{ backgroundColor: `#${classic.color_1}`, border: `2px solid #${classic.color_2}` }"> 
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4 class="text-center" :style="{ color: `#${classic.color_1}`, textShadow: `0 0 2px #${classic.color_2}, 0 0 5px #${classic.color_3}` }">Classic</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row with Coach and Divisional/Conference info -->
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h5>Coach {{ team.coach_first }} {{ team.coach_last }}</h5>
                        </div>
                        <div class="col-6 text-right">
                            <h5>{{ team.division }} Division/ {{ team.conference }} Conference</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Three best current players with room for historical players in 4th column -->
        <div class="row" v-for="icon in icons" :key="icon.id">
            <div v-for="player in players" :key="player.id" class="col-3 text-center">
                <h4>&nbsp;</h4>
                <div class="card">
                    <div class="card-header" :style="{ backgroundColor: `#${icon.color_1}`, paddingBottom: '0' }">
                        <img :src="player.image_url" width="50%" style="margin:0 auto;" />
                    </div>
                    <div class="card-footer" :style="{ backgroundColor: `#${icon.color_4}`, color: `#${icon.color_1}`, textShadow: `0 0 2px #${icon.color_2}, 0 0 5px #${icon.color_3}` }">
                        <h4>{{ player.first_name }} {{ player.last_name }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <h4 :style="{ color: `#${icon.color_1}` }">Great Players in {{ team.team_name }} History</h4>
                <ul class="list-group">
                    <li class="list-group-item text-center" v-for="hplayer in historicPlayers" :key="hplayer.id" :style="{ color: `#${icon.color_1}`, textShadow: `0 0 2px #${icon.color_2}, 0 0 5px #${icon.color_3}` }">
                        <h5>{{ hplayer.first_name }} {{ hplayer.last_name }}</h5>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <!-- Numbers retired by the franchise if applicable -->
        <div v-if="retiredNos.length > 0" class="row">
            <div class="col" v-for="color in associations" :key="color.id">
                <div class="row">
                    <div class="col text-center">
                        <h4 :style="{ color: `#${color.color_4}` }">Retired Numbers</h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div v-for="number in retiredNos" :key="number.id" class="col-3 text-center mx-1 my-1" :style="{ border: `4px solid #${color.color_4}`, color: `#${color.color_4}`, textShadow: `1px 1px 0 #${color.color_3}, -1px 1px 0 #${color.color_3}, 1px -1px 0 #${color.color_3}, -1px -1px 0 #${color.color_3}, 0 0 5px #${color.color_2}` }">
                        <h2 v-if="number.retired_no === 'Mic'" class="display-3">
                            <font-awesome-icon icon="microphone" />
                        </h2>
                        <h2 v-else class="display-3">
                            {{ number.retired_no }}
                        </h2>
                        <span class="h1">{{ number.first_name }}<br />{{ number.last_name }}</span>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
            </div>
        </div>
        <!-- "Footer" with year and Arena info -->
        <div class="row">
            <div class="col-3">
                <h5 class="text-muted">Since {{ team.year_started }}</h5>
            </div>
            <div class="col-9 text-right">
                <h5 class="text-muted">{{ team.arena_name }} -- {{ team.arena_city }}, {{ team.arena_state }}</h5>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                team: {},
                icons: [],
                players: [],
                associations: [],
                statements: [],
                citys: [],
                earneds: [],
                classics: [],
                retiredNos: [],
                historicPlayers: [],
                otherNames: [],
                color1: null,
                color2: null,
                color3: null,
                color4: null,
                colorg: null
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/teams/${this.$route.params.id}`)
                .then((res) => {
                    this.team = res.data;
                });
            this.axios
                .get('http://localhost:8000/api/icon_colors')
                .then((res) => {
                    this.icons = res.data.filter(color => !color.team_name.indexOf(this.team.team_name));
                });
            this.axios
                .get('http://localhost:8000/api/association_colors')
                .then((res) => {
                    this.associations = res.data.filter(color => !color.team_name.indexOf(this.team.team_name));
                });
            this.axios
                .get('http://localhost:8000/api/statement_colors')
                .then((res) => {
                    this.statements = res.data.filter(color => !color.team_name.indexOf(this.team.team_name));
                });
            this.axios
                .get('http://localhost:8000/api/city_colors')
                .then((res) => {
                    this.citys = res.data.filter(color => !color.team_name.indexOf(this.team.team_name));
                });
            this.axios
                .get('http://localhost:8000/api/earned_colors')
                .then((res) => {
                    this.earneds = res.data.filter(color => !color.team_name.indexOf(this.team.team_name));
                });
            this.axios
                .get('http://localhost:8000/api/classic_colors')
                .then((res) => {
                    this.classics = res.data.filter(color => !color.team_name.indexOf(this.team.team_name));
                });
            this.axios
                .get('http://localhost:8000/api/other_names')
                .then((res) => {
                    this.otherNames = res.data.filter(other => !other.team_name.indexOf(this.team.team_name));
                    console.log(this.otherNames)
                });
            this.axios
                .get('http://localhost:8000/api/retired_numbers')
                .then((res) => {
                    this.retiredNos = res.data.filter(number => !number.team_name.indexOf(this.team.team_name));
                });
            this.axios
                .get('http://localhost:8000/api/historic_players')
                .then((res) => {
                    this.historicPlayers = res.data.filter(player => !player.team_name.indexOf(this.team.team_name));
                });
            this.axios
                .get('http://localhost:8000/api/current_players')
                .then((res) => {
                    this.players = res.data.filter(player => !player.team_name.indexOf(this.team.team_name));
                });
        },
        methods: {
            changeColors (color) {
                this.color1 = color.color_1;
                this.color2 = color.color_2;
                this.color3 = color.color_3;
                this.color4 = color.color_4;
                if (color.color_gradient) {
                    this.colorg = color.color_gradient;
                } else {
                    this.colorg = null;
                }
            }
        }
    }
</script>
