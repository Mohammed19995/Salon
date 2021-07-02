window.table;
var DatatablesDataSourceAjaxServer = {
    init: function () {
        table = $("#neighborhood-table").DataTable({
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            "language": dataTableLanguage(),
            "drawCallback": function( settings ) {
                vm.ids = [];
            },
            ajax: {
                url: api_urls.admin.neighborhood.get_remote,
                data: function (e) {
                    e.country_id = $('#select_filter_country').val();
                    e.city_id = $('#select_filter_city').val();
                }
            },
            columns: [
                {data: "select_record" , searchable : false , orderable : false },
                {data: `name.${_locale}`, name : `name->${_locale}`, width : "200px"},
                {data: `city.country.name_${_locale}` ,searchable : false , orderable : false },
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