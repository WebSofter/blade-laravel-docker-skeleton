@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

    <!-- Navbar Start -->
    @include('partials.nav')
    <!-- Navbar End -->

    <!-- Sidebar Start -->
    @include('partials.sidebar')
    <!-- Sidebar End -->

    <!-- Main Content Start -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-3">Расход энергии</div>

                <!-----------------SPEEEEEEED---------->
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/highcharts-more.js"></script>
                <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                <!--------------------LINE-------------------->
                <script src="https://code.highcharts.com/modules/data.js"></script>


                <figure class="container-fluid highcharts-figure">
                    <div class="row chart-counter pt-5 pb-1">                     
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center">
                            <p class="cnt-title">Счетчик №732164</p>
                            <p><span class="cnt-val" id="cnt-val1">0</span> <span class="cnt-qty">кВтч</span></p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center">
                            <p class="cnt-title">Счетчик №732164</p>
                            <p><span class="cnt-val" id="cnt-val2">0</span> <span class="cnt-qty">кВтч</span></p>
                        </div>
                    </div>
                    <div class="row chart-qty pb-5">                        
                        <h1 class="text-center">ЗАГРУЗКА НА ВВОДАХ</h1>
                        <div id="container-qty1" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 chart-container"></div>
                        <div id="container-qty2" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 chart-container"></div>
                    </div>
                    <div class="row chart-volt pb-5">
                        <h1 class="text-center">НАПРЯЖЕНИЕ</h1>
                        <div id="container-volt1" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 chart-container"></div>
                        <div id="container-volt2" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 chart-container"></div>
                    </div>
                </figure>

                <!---------------QTY SCRIPT------------>
                <script>
                    const setQtyVal = (qty1=0, qty2=0) => {
                        jQuery('#cnt-val1').html(qty1)
                        jQuery('#cnt-val2').html(qty2)
                    }

                    const gaugeOptions = {
                        chart: {
                            type: 'solidgauge'
                        },

                        title: null,

                        pane: {
                            center: ['50%', '85%'],
                            size: '140%',
                            startAngle: -90,
                            endAngle: 90,
                            background: {
                                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#fafafa',
                                borderRadius: 5,
                                innerRadius: '60%',
                                outerRadius: '100%',
                                shape: 'arc'
                            }
                        },

                        exporting: {
                            enabled: false
                        },

                        tooltip: {
                            enabled: false
                        },

                        // the value axis
                        yAxis: {
                            stops: [
                                [0.1, '#55BF3B'], // green
                                [0.5, '#DDDF0D'], // yellow
                                [0.9, '#DF5353'] // red
                            ],
                            lineWidth: 0,
                            tickWidth: 0,
                            minorTickInterval: null,
                            tickAmount: 2,
                            title: {
                                y: -70
                            },
                            labels: {
                                y: 16
                            }
                        },

                        plotOptions: {
                            solidgauge: {
                                borderRadius: 3,
                                dataLabels: {
                                    y: 5,
                                    borderWidth: 0,
                                    useHTML: true
                                }
                            }
                        }
                    };

                    // The speed gauge
                    const chartQty1 = Highcharts.chart(
                        'container-qty1', Highcharts.merge(gaugeOptions, {
                            yAxis: {
                                min: 0,
                                max: 200,
                                title: {
                                    text: ''
                                }
                            },

                            credits: {
                                enabled: false
                            },

                            series: [{
                                name: 'Qty1',
                                data: [80],
                                dataLabels: {
                                    format: '<div style="text-align:center">' +
                                        '<span style="font-size:25px">{y}</span><br/>' +
                                        '<span style="font-size:12px;opacity:0.4"></span>' +
                                        '</div>'
                                },
                                tooltip: {
                                    valueSuffix: ' кВтч'
                                }
                            }]

                        }));

                    // The QTY2 gauge
                    const chartQty2 = Highcharts.chart(
                        'container-qty2', Highcharts.merge(gaugeOptions, {
                            yAxis: {
                                min: 0,
                                max: 5,
                                title: {
                                    text: ''
                                }
                            },

                            series: [{
                                name: 'QTY2',
                                data: [1],
                                dataLabels: {
                                    format: '<div style="text-align:center">' +
                                        '<span style="font-size:25px">{y:.1f}</span><br/>' +
                                        '<span style="font-size:12px;opacity:0.4">' +
                                        ' ' +
                                        '</span>' +
                                        '</div>'
                                },
                                tooltip: {
                                    valueSuffix: ' revolutions/min'
                                }
                            }]

                        }));

                    // Bring life to the dials
                    // setInterval(function() {
                    //     // Qty1
                    //     let point,
                    //         newVal,
                    //         inc;

                    //     if (chartQty1) {
                    //         point = chartQty1.series[0].points[0];
                    //         inc = Math.round((Math.random() - 0.5) * 100);
                    //         newVal = point.y + inc;

                    //         if (newVal < 0 || newVal > 200) {
                    //             newVal = point.y - inc;
                    //         }

                    //         point.update(newVal);
                    //     }

                    //     // QTY2
                    //     if (chartQty2) {
                    //         point = chartQty2.series[0].points[0];
                    //         inc = Math.random() - 0.5;
                    //         newVal = point.y + inc;

                    //         if (newVal < 0 || newVal > 5) {
                    //             newVal = point.y - inc;
                    //         }

                    //         point.update(newVal);
                    //     }
                    // }, 2000);
                </script>

            

                <!---------------LINE SCRIPT---------------->
                <div class="ld-form d-none">
                    <div class="ld-row">
                        <label class="ld-label">
                            Enable Polling
                        </label>
                        <input type="checkbox" checked="checked" id="enablePolling">
                    </div>
                    <div class="ld-row">
                        <label class="ld-label">
                            Polling Time (Seconds)
                        </label>
                        <input class="ld-time-input" type="number" value="2" id="pollingTime">
                    </div>
                    <div class="ld-row">
                        <label class="ld-label">
                            CSV URL
                        </label>
                        <input class="ld-url-input" type="text" id="fetchURL">
                    </div>
                </div>
                <script>
                    const defaultData = '/api/energy/consumpt?format=csv';//'https://demo-live-data.highcharts.com/time-data.csv';
                    const urlInput = document.getElementById('fetchURL');
                    const pollingCheckbox = document.getElementById('enablePolling');
                    const pollingInput = document.getElementById('pollingTime');

                    function createChart() {
                        Highcharts.chart('container-volt1', {
                            chart: {
                                type: 'areaspline'
                            },
                            title: {
                                text: 'Live Data'
                            },
                            accessibility: {
                                announceNewData: {
                                    enabled: true,
                                    minAnnounceInterval: 15000,
                                    announcementFormatter: function(
                                        allSeries,
                                        newSeries,
                                        newPoint
                                    ) {
                                        if (newPoint) {
                                            return 'New point added. Value: ' + newPoint.y;
                                        }
                                        return false;
                                    }
                                }
                            },
                            plotOptions: {
                                areaspline: {
                                    color: '#32CD32',
                                    fillColor: {
                                        linearGradient: {
                                            x1: 0,
                                            x2: 0,
                                            y1: 0,
                                            y2: 1
                                        },
                                        stops: [
                                            [0, '#32CD32'],
                                            [1, '#32CD3200']
                                        ]
                                    },
                                    threshold: null,
                                    marker: {
                                        lineWidth: 1,
                                        lineColor: null,
                                        fillColor: 'white'
                                    }
                                }
                            },
                            data: {
                                csvURL: urlInput.value,
                                enablePolling: pollingCheckbox.checked === true,
                                dataRefreshRate: parseInt(pollingInput.value, 10)
                            }
                        });

                        Highcharts.chart('container-volt2', {
                            chart: {
                                type: 'areaspline'
                            },
                            title: {
                                text: 'Live Data'
                            },
                            accessibility: {
                                announceNewData: {
                                    enabled: true,
                                    minAnnounceInterval: 15000,
                                    announcementFormatter: function(
                                        allSeries,
                                        newSeries,
                                        newPoint
                                    ) {
                                        if (newPoint) {
                                            return 'New point added. Value: ' + newPoint.y;
                                        }
                                        return false;
                                    }
                                }
                            },
                            plotOptions: {
                                areaspline: {
                                    color: '#32CD32',
                                    fillColor: {
                                        linearGradient: {
                                            x1: 0,
                                            x2: 0,
                                            y1: 0,
                                            y2: 1
                                        },
                                        stops: [
                                            [0, '#32CD32'],
                                            [1, '#32CD3200']
                                        ]
                                    },
                                    threshold: null,
                                    marker: {
                                        lineWidth: 1,
                                        lineColor: null,
                                        fillColor: 'white'
                                    }
                                }
                            },
                            data: {
                                csvURL: urlInput.value,
                                enablePolling: pollingCheckbox.checked === true,
                                dataRefreshRate: parseInt(pollingInput.value, 10)
                            }
                        });

                        if (pollingInput.value < 1 || !pollingInput.value) {
                            pollingInput.value = 1;
                        }
                    }

                    urlInput.value = defaultData;

                    // We recreate instead of using chart update to make sure the loaded CSV
                    // and such is completely gone.
                    pollingCheckbox.onchange = urlInput.onchange =
                        pollingInput.onchange = createChart;

                    // Create the chart
                    createChart();
                </script>

                <script>
                    function fetchData() {
                        jQuery.ajax({
                            url: '/api/energy/consumpt', // Replace with your endpoint URL
                            type: 'GET',
                            success: function(data) {
                                // Process the response data
                                 /*
                                    [{
                                        "datetime": "2024-08-27 10:31:07",
                                        "voltage": "211.3",
                                        "current": "8.46",
                                        "active": "3895",
                                        "energy": "46",
                                        "record": 3723
                                    }]
                                 */
                                //console.log(data)
                                if(data.length) {
                                    last = data.at(-1)

                                    // Update QTY Chart
                                    if (chartQty1) {
                                        const point = chartQty1.series[0].points[0];
                                        point.update(last.current);
                                    }

                                    // QTY2
                                    if (chartQty2) {
                                        const point = chartQty2.series[0].points[0];
                                        point.update(last.current);
                                    }

                                    // Update QTY val
                                    setQtyVal(last?.energy, last?.energy)
                                }
                            },
                            error: (xhr, status, error) => console.error(error)
                        });
                    }

                    // Fetch data every 5 seconds (5000 milliseconds)
                    setInterval(fetchData, 1000);
                </script>
            </div>
        </div>
    </main>
    <!-- Main Content End -->
@endsection
