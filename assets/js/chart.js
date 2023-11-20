const ctx = document.getElementById('myChart');

$.ajax({
    url: 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-abouk/endpoint/getAllDosen',
    type: 'GET',
    success: function(res) {
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pria', 'Wanita'],
                datasets: [{
                    label: '# of Votes',
                    data: [res.filter(checkPria).length, res.filter(checkWanita).length],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            });
        
    },
    error: function(err) {
        console.log(err);
    }
});

function checkPria(data) {
    return data.jenis_kelamin == 'Pria';
}

function checkWanita(data) {
    return data.jenis_kelamin == 'Wanita';
}

