

/***************************************************************/
var orders_price_statistic_ctx = document.getElementById('chart_order_price_area').getContext('2d');
window.myOrderPriceBar = new Chart(orders_price_statistic_ctx, {
    type: 'bar',
    data: chart_orders_price_statistic.chart_area,
    options: {
        responsive: true,
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'الدفعات'
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

/****************************************************************/

var auctions_config = {
    type: 'line',
    data: chart_auctions.chart_area,
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'المزادات'
        },
        tooltips: {
            mode: 'index',
        },
        hover: {
            mode: 'index'
        },
        scales: {
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: chart_auctions.xAxes
                }
            }],
            yAxes: [{
                stacked: true,
                scaleLabel: {
                    display: true,
                    labelString: chart_auctions.yAxes
                }
            }]
        }
    }
};
var auctions_ctx = document.getElementById('chart_auction_area').getContext('2d');
window.myLine = new Chart(auctions_ctx, auctions_config);
/***************************************************************/

var count_users_type_config = {
    type: 'pie',
    data: users_statistic.count_users_type,
    options: {
        responsive: true
    }
};
var count_users_type_ctx = document.getElementById('count_users_type').getContext('2d');
window.myPie = new Chart(count_users_type_ctx, count_users_type_config);

/*********************************************************************/

var users_statistic_ctx = document.getElementById('users_statistic').getContext('2d');
window.myBar = new Chart(users_statistic_ctx, {
    type: 'bar',
    data: users_statistic.chart_area,
    options: {
        responsive: true,
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'المستخدمين'
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

/*********************************************************************/

var orders_config = {
    type: 'line',
    data: chart_orders_statistic.chart_area,
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'الطلبات'
        },
        tooltips: {
            mode: 'index',
        },
        hover: {
            mode: 'index'
        },
        scales: {
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: chart_orders_statistic.xAxes
                }
            }],
            yAxes: [{
                stacked: true,
                scaleLabel: {
                    display: true,
                    labelString: chart_orders_statistic.yAxes
                }
            }]
        }
    }
};
var orders_ctx = document.getElementById('chart_order_area').getContext('2d');
window.myOrderLine = new Chart(orders_ctx, orders_config);

var count_orders_payment_method_config = {
    type: 'pie',
    data: chart_orders_statistic.orders_payment_method,
    options: {
        responsive: true
    }
};
var count_orders_payment_method_ctx = document.getElementById('count_orders_payment_method').getContext('2d');
window.myPie = new Chart(count_orders_payment_method_ctx, count_orders_payment_method_config);
