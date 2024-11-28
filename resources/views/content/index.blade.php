@extends('layout.app')

@section('title', __('Dashboard'))

@section('content')
<div class="row">
    <div class="col-lg-6 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="fw-bold fs-4">{{ __('Charts') }}</div>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1" name="radio1">
                        <label class="form-check-label" for="inlineCheckbox1">{{ __('Chart') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2" name="radio1">
                        <label class="form-check-label" for="inlineCheckbox2">{{ __('Show Value') }}</label>
                    </div>
                    <div>
                        <span class="mdi mdi-dots-vertical"></span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <canvas id="chartDoughnut1" width="200" height="200" style="position: relative;"></canvas>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <canvas id="chartDoughnut2" width="200" height="200" class="chartjs-render-monitor" style="display: block; width: 200px; height: 200px;"></canvas>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <canvas id="chartDoughnut3" width="200" height="200" class="chartjs-render-monitor" style="display: block; width: 200px; height: 200px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title fw-bold">{{ __('Chart Order') }}</h5>
                    <p class="card-text">{{ __('Lorem ipsum dolor sit amet, consectetur adip.') }}</p>
                </div>
                <button class="btn btn-outline-primary my-h-fit-content" onclick="saveReport()">
                    <span class="mdi mdi-download-outline me-1"></span>
                    {{ __('Save Report') }}
                </button>
            </div>
            <div class="card-body">
                <canvas id="chartLine" width="200" height="200" class="chartjs-render-monitor" style="display: block; width: 200px; height: 200px;"></canvas>
            </div>
        </div>
    </div>
</div>



<script>
const centerTextPlugin = {
    id: 'centerTextPlugin',
    afterDraw: (chart) => {
        if (chart.config.type === 'doughnut') {
            const { ctx, chartArea: { width, height }, data } = chart;
            ctx.save();

            // Draw the white inner circle with shadow
            const innerRadius = chart.getDatasetMeta(0).data[0].innerRadius;
            const centerX = width / 2;
            const centerY = height / 2;

            // Set shadow properties to mimic box-shadow
            ctx.shadowColor = 'rgba(0, 0, 0, 0.12)';
            ctx.shadowBlur = 35;
            ctx.shadowOffsetY = 17;

            // Draw the white circle with shadow
            ctx.fillStyle = 'white';
            ctx.beginPath();
            ctx.arc(centerX, centerY, innerRadius, 0, 2 * Math.PI);
            ctx.closePath();
            ctx.fill();

            // Remove shadow settings for text
            ctx.shadowBlur = 0;
            ctx.shadowOffsetY = 0;
            ctx.restore();

            // Draw the centered percentage text
            ctx.font = '20px sans-serif';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillStyle = data.datasets[0].backgroundColor[0];

            // Calculate the percentage based on the first data value
            const total = data.datasets[0].data.reduce((a, b) => a + b, 0);
            const percentage = ((data.datasets[0].data[0] / total) * 100).toFixed(0) + '%';

            // Draw the text in the center of the white circle
            ctx.fillText(percentage, centerX, centerY);
        }
    }
};



Chart.register(centerTextPlugin);

var ctx1 = document.getElementById('chartDoughnut1').getContext('2d');
var chartDoughnut1 = new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: ['Green', 'Low Green'],
        datasets: [{
            label: 'Total Order',
            data: [81, 19],
            backgroundColor: [
                'rgba(255, 91, 91, 1)',
                'rgba(255, 91, 91, 0.15)'
            ],
            borderColor: [
                'rgba(255, 91, 91, 1)',
                'rgba(255, 91, 91, 0.15)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false},
            title: {
                display: true,
                text: 'Total Orders',
                position: 'bottom',
                font: {
                    size: 16
                },
                padding: {
                    top: 10,
                    bottom: 20
                }
            },
            tooltip: {
                enabled: false
            }
        }
    }

});

        var ctx2 = document.getElementById('chartDoughnut2').getContext('2d');
        var chartDoughnut2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue'],
                datasets: [{
                    label: 'Customer Growth',
                    data: [22, 78],
                    backgroundColor: [
                        'rgba(0, 176, 116, 1)',
                        'rgba(0, 176, 116, 0.15)'
                    ],
                    borderColor: [
                        'rgba(0, 176, 116, 1)',
                        'rgba(0, 176, 116, 0.15)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false},
                    title: {
                        display: true,
                        text: 'Customer Growth',
                        position: 'bottom',
                        font: {
                            size: 16
                        },
                        padding: {
                            top: 10,
                            bottom: 20
                        }
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            }
        });

        var ctx3 = document.getElementById('chartDoughnut3').getContext('2d');
        var chartDoughnut3 = new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue'],
                datasets: [{
                    label: 'Total Revenue',
                    data: [62, 38],
                    backgroundColor: [
                        'rgba(45, 156, 219, 1)',
                        'rgba(45, 156, 219, 0.15)'
                    ],
                    borderColor: [
                        'rgba(45, 156, 219, 1)',
                        'rgba(45, 156, 219, 0.15)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Total Revenue',
                        position: 'bottom',
                        font: {
                            size: 16
                        },
                        padding: {
                            top: 10,
                            bottom: 20
                        }
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            }
        });

        const ct4 = document.getElementById('chartLine').getContext('2d');

const chartLine = new Chart(ct4, {
    type: 'line',
    data: {
        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        datasets: [{
            data: [0, 300, 150, 350, 500, 450, 600],
            borderColor: 'rgba(45, 156, 219, 1)', // Line color
            borderWidth: 3,
            tension: 0.3,
            radius: 0,                                // Point radius (no points initially)
            hoverRadius: 6,
            pointBackgroundColor: '#2D9CDB',         // Point color on hover
            pointBorderColor: '#FFFFFF',             // Point border color on hover
            pointHoverBorderWidth: 5,                // Border width on hover                          // Point radius on hover
            fill: 'start',                     // Remove points on the line
            backgroundColor: (context) => {
                const chartArea = context.chart.chartArea;
                if (!chartArea) {
                    return null;  // Wait until the chart area is fully initialized
                }
                const gradientBackground = ct4.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                gradientBackground.addColorStop(0, '#6EC8EF');  // Start color at the top
                gradientBackground.addColorStop(1, '#FFFFFF');  // End color at the bottom
                return gradientBackground;
            }
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false                   // Remove "Orders" label from the top
            }
        },
        scales: {
            x: {
                grid: {
                    display: false               // Remove grid lines on x-axis
                },
                border: {
                    display: false               // Remove the x-axis line
                }
            },
            y: {
                display: false                    // Remove y-axis entirely
            }
        }
    }
});





        function saveReport() {
            alert('Report saved!');
        }

</script>


@endsection
