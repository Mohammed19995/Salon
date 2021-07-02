window.table;
var DatatablesDataSourceAjaxServer = {
    init: function () {
        table = $("#state-table").DataTable({
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            "language": dataTableLanguage(),
            "drawCallback": function( settings ) {
                vm.ids = [];
            },
            ajax: {
                url: api_urls.admin.state.get_remote,
                data: function (e) {
                }
            },
            columns: [
                {data: "select_record" , searchable : false , orderable : false },
                {data: `name.${_locale}`, name : `name->${_locale}`, width : "200px"},
                {data: `country.name_${_locale}` ,searchable : false , orderable : false },
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