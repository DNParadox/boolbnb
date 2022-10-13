const ctx = document.getElementById('myChart').getContext('2d');
// let statistics = getRandomStats();
// console.log(statistics)
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio','Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: 'Views mensili',
            data: [30, 25, 45, 80, 120, 140, 120, 160, 130, 110, 70, 100]
            ,
            fill: false,
            borderColor: ' #ff385c',
            tension: 0.2
        
        }],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// function getRandomStats() {
    
//     let stats = [];
//     for (let i = 0; i < 12; i++) {
//        stats.push(Math.floor((Math.random() * 200) + 1));
        
//     }
//     return stats;
// }


