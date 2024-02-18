<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kassel Job</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/icon.png') }}" type="image/x-icon">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- bootsrtap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- all css -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <!-- slick css -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <!-- metisMenu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- lineProgressbar css -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.lineProgressbar.css') }}">
    <!-- responsive fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <style>
        .contact-form button {
            font-weight: 600;
            border: 1px solid #365486;
            border-radius: 28px;
            box-shadow: 0 5px 15px 0 rgba(54, 83, 134, .19);
            color: #fff;
            outline: 0 none;
            transition: all .5s ease-out 0s;
            -webkit-border-radius: 28px;
            -moz-border-radius: 28px;
            -ms-border-radius: 28px;
            -o-border-radius: 28px;
            -webkit-transition: all .5s ease-out 0s;
            -moz-transition: all .5s ease-out 0s;
            -ms-transition: all .5s ease-out 0s;
            -o-transition: all .5s ease-out 0s;
            background: #365486;
            font-size: 12px;
            padding: 12px 33px;
            cursor: pointer;
            text-transform: capitalize !important;
        }

        .contact-form {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 565px) {
            .contact-form {
                width: auto;
            }
        }

        .contact-form .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .contact-form h3 {
            font-size: 45px;
            color: #333;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .contact-form p {
            font-size: 18px;
            color: #666;
        }

        .contact-form form {
            display: grid;
            gap: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            padding: 10px;
            width: 100%;
            margin:3px;
            outline: none;
            border: 2px solid #eee;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        .contact-form input:hover,
        .contact-form textarea:hover {
            border-color: #ccc;
        }

        .contact-form .error {
            color: red;
            margin-top: 5px;
            font-size: 14px;
        }

        .contact-form button:hover {
            color: #365486;
            background: #fff;
            transform: scale(1.05);
        }

        .contact-job {
            padding-top: 250px;
            padding-bottom: 100px;
        }

        .handler {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .file-upload,
        {
            display: flex;
            flex-direction: column;
        }

        .file-upload label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        .file-upload input[type="file"]:hover {
            border-color: #aaa;
        }

        .file-upload input[type="file"]:focus {
            border-color: #498caca2;
        }

        .file-upload input[type="file"]::file-selector-button {
            display: none;
        }

        .inputs {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .action-buttons {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 30px;
        }

        .create-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .create-button:hover {
            background-color: #0056b3;
        }

        button {
            /* cursor: pointer; */
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            /* font-size: 14px; */
             /* width: 150px; */
        }

        .update-button {
            background-color: #4CAF50;
            color: white;
        }
        .logout-button {
            background-color: #eb0f0f;
            color: white;
            width: 200px;

        }

        .delete-button {
            background-color: #f44336;
            color: white;
        }

        .create-button {
            background-color: #365486;
            color: white;
        }

        table img {
            width: 80px;
        }
        .col-md-12 button {
            width: 100%;
            padding: 2px;
            margin-top: 30px;
            margin-bottom: 30px;
            background-color: #4CAF50;
            color: #000;
        }

        .wrapper{
            display: inline-flex;
            width: 100%;
        }
    </style>

</head>

<body>


    @include('website.layout.sidebar')
    <!-- top-bar start -->
    @include('website.layout.header')
    <!-- top-bar end -->


    <!-- main-content start -->
    <div class="main-content">
        @yield('contant')
    </div>
    <!-- main-content end -->



    <!-- jquery js -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- bootstrap min j -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- bootstrap.bundl js -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- metisMenu js -->
    <script src="{{ asset('assets/js/metisMenu.js') }}"></script>
    <!-- canvasjs js -->
    <script src="{{ asset('assets/js/jquery.canvasjs.min.js') }}"></script>
    <!-- lineProgressbar js -->
    <script src="{{ asset('assets/js/jquery.lineProgressbar.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- Chart js -->
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        var ctx = document.getElementById('revenueChart').getContext('2d');
        var gradientColor = ctx.createLinearGradient(0, 0, 0, 400);
        gradientColor.addColorStop(0, "rgba(253, 104, 62, 1)");
        gradientColor.addColorStop(1, "rgba(255, 255, 255, 0)");
        var ctx = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: '',
                    data: [5, 25, 17, 36, 30, 50],
                    backgroundColor: gradientColor,
                    borderColor: gradientColor,
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false,
                    labels: {
                        fontColor: '#ffffff'
                    }
                },
                scales: {
                    yAxes: [{

                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                    name: 'Males',
                    data: [0.4, 0.65, 0.76, 0.88, 1.5, 2.1, 2.9, 3.8, 3.9, 4.2, 4, 4.3, 4.1, 4.2, 4.5,
                        3.9, 3.5, 3
                    ]
                },
                {
                    name: 'Females',
                    data: [-0.8, -1.05, -1.06, -1.18, -1.4, -2.2, -2.85, -3.7, -3.96, -4.22, -4.3, -4.4,
                        -4.1, -4, -4.1, -3.4, -3.1, -2.8
                    ]
                }
            ],
            chart: {
                type: 'bar',
                height: 300,
                stacked: true,

            },
            colors: ['#FD683E', '#2BC155'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    barHeight: '100%',
                    // borderRadius: 7,
                    radiusOnLastStackedBar: true,
                },

            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
                colors: ["#fff"]
            },

            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: true,
                    }
                }
            },
            yaxis: {
                min: -15,
                max: 15,
            },
            tooltip: {
                shared: false,
                x: {
                    formatter: function(val) {
                        return val
                    }
                },
                y: {
                    formatter: function(val) {
                        return Math.abs(val) + "%"
                    }
                }
            },
            xaxis: {
                categories: ['85+', '80-84', '75-79', '70-74', '65-69', '60-64', '55-59', '50-54',
                    '45-49', '40-44', '35-39', '30-34', '25-29', '20-24', '15-19', '10-14', '5-9',
                    '0-4'
                ],
                labels: {
                    formatter: function(val) {
                        return Math.abs(Math.round(val)) + "%"
                    }
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
    @stack('scripts')


</body>

</html>
