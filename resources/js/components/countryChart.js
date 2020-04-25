import $ from 'jquery';
import Chart from 'chart.js';

export default class CountryChart{
    constructor(){
        if ($('body').data('content') === "countryPage"){
            this.initEls();
            this.initEvents();
        }
    }

    initEls(){
        this.$els ={
            countryStatsContainer: $('.js-countryStatsContainer'),
            searchISO: $('.js-iso'),
            messageError: $('.js-messageError'),
            countryDailyContainer: $('.js-dailyStatsCountry'),
        }
    }

    initEvents(){
        this.getCountriesStat();
        this.getDailyStats();
    }

    getCountriesStat(){
        let iso = this.getPath();
        const api = {
            endpoint:'https://corona.lmao.ninja/v2/historical/'+iso,
        };
        $.ajaxSetup({cache:false});
        $.getJSON(api.endpoint)
            .then((response) =>{
                this.historicalChart(response);
            })
            .catch((e) =>{
                console.log('error with the quote :', e);
                this.$els.messageError.text("No data found...");
            });
    }

    getDailyStats(){
        let iso = this.getPath();
        const api = {
            endpoint:'https://corona.lmao.ninja/v2/countries/'+iso,
        };
        $.ajaxSetup({cache:false});
        $.getJSON(api.endpoint)
            .then((response) =>{
                this.dailyChart(response);
            })
            .catch((e) =>{
                console.log('error with the quote :', e);
                this.$els.messageError.text("No data found...");
            });
    }

    getPath(){
        let path = location.pathname;
        let iso = path.split('/').pop();
        if (iso === 'country'){
            iso = this.$els.searchISO.text();
        }
        return iso;
    }

    dailyChart(data){
        console.log(data.todayCases);
        var dailyChart = new Chart(this.$els.countryDailyContainer, {
            type: 'bar',
            data: {
                labels: ['Cases'],
                datasets: [{
                    label: 'Cases',
                    data: [data.todayCases],
                    backgroundColor: [
                        'rgba(108, 92, 231, .2)'
                    ],
                    borderColor: [
                        'rgba(108, 92, 231, 1)'
                    ],
                    borderWidth: 1
                },{
                    label: 'Deaths',
                    data: [data.todayDeaths],
                    backgroundColor: [
                        'rgba(232, 129, 116, .2)'
                    ],
                    borderColor: [
                        'rgba(232, 129, 116, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    historicalChart(data){
        let casesObject = data.timeline.cases;
        let recoveredObject = data.timeline.recovered;
        let deathsObject = data.timeline.deaths;

        let casesDate = [];
        let casesNumber = [];
        let comp = 0;
        for (const property in casesObject) {
            casesDate[comp] = property;
            casesNumber[comp] = casesObject[property];
            comp++;
        }

        let recoveredNumber = [];
        comp = 0;
        for (const property in recoveredObject) {
            recoveredNumber[comp] = recoveredObject[property];
            comp++;
        }

        let deathsNumber = [];
        comp = 0;
        for (const property in deathsObject) {
            deathsNumber[comp] = deathsObject[property];
            comp++;
        }

        var historicalChart = new Chart(this.$els.countryStatsContainer, {
            type: 'line',
            data: {
                labels: casesDate,
                datasets: [
                    {
                    label: 'Cases',
                    data: casesNumber,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0)',
                    ],
                    borderColor: [
                        'rgba(108, 92, 231, 1)'
                    ],
                    borderWidth: 3,
                    fill:false,
                },
                {
                    label: 'Recovered',
                    data: recoveredNumber,
                    backgroundColor: [
                        'rgba(55, 99, 232, 0)'
                    ],
                    borderColor: [
                        'rgba(81, 232, 156, 1)'
                    ],
                    borderWidth: 3,
                    fill:false,
                },
                {
                    label: 'Deaths',
                    data: deathsNumber,
                    backgroundColor: [
                        'rgba(155, 199, 32, 0)'
                    ],
                    borderColor: [
                        'rgba(232, 129, 116, 1)'
                    ],
                    borderWidth: 3,
                    fill:false,
                },
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
}


