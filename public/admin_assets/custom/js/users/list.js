window.table;
var DatatablesDataSourceAjaxServer = {
    init: function () {
        table = $("#user-table").DataTable({
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            order: [[ 9, "desc" ]],
            "language": dataTableLanguage(),
            "drawCallback": function( settings ) {
                vm.filter_loading = false;
                vm.ids = [];
                $('.test-popup-link').magnificPopup({type:'image'});
            },
            ajax: {
                url: api_urls.admin.user.get_remote,
                data: function (e) {
                    e.start_date = $('#start_date').val();
                    e.end_date = $('#end_date').val();
                    e.status = $('#select_filter_status').val();
                    e.phone_code_status = $('#select_filter_phone_code_status').val();
                    e.country_id = $('#select_filter_country').val();
                    e.city_id = $('#select_filter_city').val();
                    e.type = 1;

                }
            },
            columns: [
                {data: "select_record" , searchable : false , orderable : false },
                {data: "show_image" , searchable : false , orderable : false },
                {data: "name" , width : "200px"},
                {data: "email"},
                {data: "phone_with_code" , name : 'phone' , class : 'dir-ltr' , width : "200px"},
                {data: "show_code" , searchable : false , orderable : false},
                {data: `city.country.name.${_locale}` ,searchable : false , orderable : false },
                {data: `city.name.${_locale}` ,searchable : false , orderable : false },
                {data: "show_status" ,name : 'status' },
                {data: "created_at"},
                {data: "actions" , searchable : false , orderable : false},

            ],
            columnDefs: [
                { width: 200, targets: 1 }
            ],
        });

    }
};
jQuery(document).ready(function () {

    DatatablesDataSourceAjaxServer.init()
});
