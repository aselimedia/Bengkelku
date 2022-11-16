<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/admin" class="brand-link">
                <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Bengkel ku</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Ainun Naim</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item has-treeview menu-open">
                            <a href="/admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Statistic
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/bengkel" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bengkel</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/visitor" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Visitors</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/customer" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Costumers</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Mailbox
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/mailbox/mailbox.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inbox</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/logout" class="nav-link">
                                <i class="fas fa-sign-out-alt nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Data Visitor</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->renderSection('content'); ?>

            <!-- ./wrapper -->

            <!-- jQuery -->
            <script src="../../plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI -->
            <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- AdminLTE App -->
            <script src="../../dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../../dist/js/demo.js"></script>
            <!-- FLOT CHARTS -->
            <script src="../../plugins/flot/jquery.flot.js"></script>
            <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
            <script src="../../plugins/flot-old/jquery.flot.resize.min.js"></script>
            <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
            <script src="../../plugins/flot-old/jquery.flot.pie.min.js"></script>
            <!-- Page script -->
            <script>
                $(function() {
                    /*
                     * Flot Interactive Chart
                     * -----------------------
                     */
                    // We use an inline data source in the example, usually data would
                    // be fetched from a server
                    var data = [],
                        totalPoints = 100

                    function getRandomData() {

                        if (data.length > 0) {
                            data = data.slice(1)
                        }

                        // Do a random walk
                        while (data.length < totalPoints) {

                            var prev = data.length > 0 ? data[data.length - 1] : 50,
                                y = prev + Math.random() * 10 - 5

                            if (y < 0) {
                                y = 0
                            } else if (y > 100) {
                                y = 100
                            }

                            data.push(y)
                        }

                        // Zip the generated y values with the x values
                        var res = []
                        for (var i = 0; i < data.length; ++i) {
                            res.push([i, data[i]])
                        }

                        return res
                    }

                    var interactive_plot = $.plot('#interactive', [{
                        data: getRandomData(),
                    }], {
                        grid: {
                            borderColor: '#f3f3f3',
                            borderWidth: 1,
                            tickColor: '#f3f3f3'
                        },
                        series: {
                            color: '#3c8dbc',
                            lines: {
                                lineWidth: 2,
                                show: true,
                                fill: true,
                            },
                        },
                        yaxis: {
                            min: 0,
                            max: 100,
                            show: true
                        },
                        xaxis: {
                            show: true
                        }
                    })

                    var updateInterval = 500 //Fetch data ever x milliseconds
                    var realtime = 'on' //If == to on then fetch data every x seconds. else stop fetching
                    function update() {

                        interactive_plot.setData([getRandomData()])

                        // Since the axes don't change, we don't need to call plot.setupGrid()
                        interactive_plot.draw()
                        if (realtime === 'on') {
                            setTimeout(update, updateInterval)
                        }
                    }

                    //INITIALIZE REALTIME DATA FETCHING
                    if (realtime === 'on') {
                        update()
                    }
                    //REALTIME TOGGLE
                    $('#realtime .btn').click(function() {
                        if ($(this).data('toggle') === 'on') {
                            realtime = 'on'
                        } else {
                            realtime = 'off'
                        }
                        update()
                    })
                    /*
                     * END INTERACTIVE CHART
                     */


                    /*
                     * LINE CHART
                     * ----------
                     */
                    //LINE randomly generated data

                    var sin = [],
                        cos = []
                    for (var i = 0; i < 14; i += 0.5) {
                        sin.push([i, Math.sin(i)])
                        cos.push([i, Math.cos(i)])
                    }
                    var line_data1 = {
                        data: sin,
                        color: '#3c8dbc'
                    }
                    var line_data2 = {
                        data: cos,
                        color: '#00c0ef'
                    }
                    $.plot('#line-chart', [line_data1, line_data2], {
                        grid: {
                            hoverable: true,
                            borderColor: '#f3f3f3',
                            borderWidth: 1,
                            tickColor: '#f3f3f3'
                        },
                        series: {
                            shadowSize: 0,
                            lines: {
                                show: true
                            },
                            points: {
                                show: true
                            }
                        },
                        lines: {
                            fill: false,
                            color: ['#3c8dbc', '#f56954']
                        },
                        yaxis: {
                            show: true
                        },
                        xaxis: {
                            show: true
                        }
                    })
                    //Initialize tooltip on hover
                    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
                        position: 'absolute',
                        display: 'none',
                        opacity: 0.8
                    }).appendTo('body')
                    $('#line-chart').bind('plothover', function(event, pos, item) {

                        if (item) {
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2)

                            $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
                                .css({
                                    top: item.pageY + 5,
                                    left: item.pageX + 5
                                })
                                .fadeIn(200)
                        } else {
                            $('#line-chart-tooltip').hide()
                        }

                    })
                    /* END LINE CHART */

                    /*
                     * FULL WIDTH STATIC AREA CHART
                     * -----------------
                     */
                    var areaData = [
                        [2, 88.0],
                        [3, 93.3],
                        [4, 102.0],
                        [5, 108.5],
                        [6, 115.7],
                        [7, 115.6],
                        [8, 124.6],
                        [9, 130.3],
                        [10, 134.3],
                        [11, 141.4],
                        [12, 146.5],
                        [13, 151.7],
                        [14, 159.9],
                        [15, 165.4],
                        [16, 167.8],
                        [17, 168.7],
                        [18, 169.5],
                        [19, 168.0]
                    ]
                    $.plot('#area-chart', [areaData], {
                        grid: {
                            borderWidth: 0
                        },
                        series: {
                            shadowSize: 0, // Drawing is faster without shadows
                            color: '#00c0ef',
                            lines: {
                                fill: true //Converts the line chart to area chart
                            },
                        },
                        yaxis: {
                            show: false
                        },
                        xaxis: {
                            show: false
                        }
                    })

                    /* END AREA CHART */

                    /*
                     * BAR CHART
                     * ---------
                     */

                    var bar_data = {
                        data: [
                            [1, 10],
                            [2, 8],
                            [3, 4],
                            [4, 13],
                            [5, 17],
                            [6, 9]
                        ],
                        bars: {
                            show: true
                        }
                    }
                    $.plot('#bar-chart', [bar_data], {
                        grid: {
                            borderWidth: 1,
                            borderColor: '#f3f3f3',
                            tickColor: '#f3f3f3'
                        },
                        series: {
                            bars: {
                                show: true,
                                barWidth: 0.5,
                                align: 'center',
                            },
                        },
                        colors: ['#3c8dbc'],
                        xaxis: {
                            ticks: [
                                [1, 'January'],
                                [2, 'February'],
                                [3, 'March'],
                                [4, 'April'],
                                [5, 'May'],
                                [6, 'June']
                            ]
                        }
                    })
                    /* END BAR CHART */

                    /*
                     * DONUT CHART
                     * -----------
                     */

                    var donutData = [{
                        label: 'Series2',
                        data: 30,
                        color: '#3c8dbc'
                    }, {
                        label: 'Series3',
                        data: 20,
                        color: '#0073b7'
                    }, {
                        label: 'Series4',
                        data: 50,
                        color: '#00c0ef'
                    }]
                    $.plot('#donut-chart', donutData, {
                        series: {
                            pie: {
                                show: true,
                                radius: 1,
                                innerRadius: 0.5,
                                label: {
                                    show: true,
                                    radius: 2 / 3,
                                    formatter: labelFormatter,
                                    threshold: 0.1
                                }

                            }
                        },
                        legend: {
                            show: false
                        }
                    })
                    /*
                     * END DONUT CHART
                     */

                })

                /*
                 * Custom Label formatter
                 * ----------------------
                 */
                function labelFormatter(label, series) {
                    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
                        label +
                        '<br>' +
                        Math.round(series.percent) + '%</div>'
                }
            </script>