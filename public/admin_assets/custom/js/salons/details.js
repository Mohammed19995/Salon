window.vm = new Vue({
    el: '#app',
    data: {
        ids: [auction.id],
        option_id: '',
        auction : auction ,
        option_url: api_urls.admin.auction.execute_option,
        options : options,
    },
    created: function () {

    },
    methods: {
        emitExecuteOption: function (value) {
            setTimeout(function () {
                if(value.option_id == 3) {
                    window.location = get_url+"/admin/auctions";
                }else {
                    window.location = "";
                }

            },1000);
        },
    }
});

window.table;
var DatatablesDataSourceAjaxServer = {
    init: function () {
        table = $("#auction-prices-table").DataTable({
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            order: [[ 5, "desc" ]],
            "language": dataTableLanguage(),
            "drawCallback": function( settings ) {

                $('.test-popup-link').magnificPopup({type:'image'});
            },
            ajax: {
                url: api_urls.admin.auction.get_remote_auction_prices,
                data: function (e) {
                    e.id = auction.id;
                }
            },
            columns: [
                {data: "show_image" , searchable : false , orderable : false },
                {data: 'name'},
                {data: 'email'},
                {data: 'phone_with_code' , name : 'phone'},
                {data: 'price' , searchable : false },
                {data: 'auction_price' , searchable : false },
            ],
            columnDefs: [
                { width: 200, targets: 1 }
            ],
        });

    }
};
jQuery(document).ready(function () {
    $('.test-popup-link').magnificPopup({type: 'image'});
    DatatablesDataSourceAjaxServer.init()
});