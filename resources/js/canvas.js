//START USER ENGAGEMENT ANALYTICS

var ctx = document.getElementById('userEngagement').getContext('2d');
        
var myLineChart = new Chart(ctx, {
    type: 'line',  
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],  
        datasets: [{
            label: "User Engagement",
            data: [10, 25, 40, 30, 50, 70],  
            borderColor: "green", 
            backgroundColor: "rgba(0, 123, 255, 0.1)", 
            borderWidth: 2,
            tension: 0.4  
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

// END USER ENGAGEMENT ANALYTICS

// START MONTHLY ACCUMULATED SALES

var ctx = document.getElementById('monthlySales').getContext('2d');
        
var myLineChart = new Chart(ctx, {
    type: 'line',  
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],  
        datasets: [{
            label: "Monthly Sales",
            data: [10, 80, 40, 20, 50, 90],  
            borderColor: "green", 
            backgroundColor: "rgba(0, 123, 255, 0.1)", 
            borderWidth: 2,
            tension: 0.4  
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

// END MONTHLY ACCUMULATED SALES