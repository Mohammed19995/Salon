window.table;
window.table_notification_users;
var DatatablesDataSourceAjaxServer = {
    init: function () {
        table = $("#notification-table").DataTable({
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            "order": [[ 4, "desc" ]],
            "language": dataTableLanguage(),
            "drawCallback": function( settings ) {
                vm.filter_loading = false;
                vm.ids = [];
                $('.test-popup-link').magnificPopup({type:'image'});
            },
            ajax: {
                url: api_urls.admin.notification.get_remote,
                data: function (e) {
                    e.start_date = $('#start_date').val();
                    e.end_date = $('#end_date').val();

                }
            },
            columns: [
                {data: `title.ar`, name : `title->ar`},
                {data: `title.en`, name : `title->en`},
                {data: `message.ar`, name : `message->ar`},
                {data: `message.en`, name : `message->en`},
                {data: "created_at"},
                {data: "actions" , searchable : false , sortable : false},


            ],
            columnDefs: [
                { width: 200, targets: 1 }
            ],
        });
        table_notification_users = $("#notification-users-table").DataTable({
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,

            "language": dataTableLanguage(),
            "drawCallback": function( settings ) {
               // $('.test-popup-link').magnificPopup({type:'image'});
                if(vm.data && vm.data.id != -1) {
                    $('#notification_users').modal('show');
                }
                $('.notification-view-'+vm.data.id).removeClass('hidden');
                $('.notification-loader-'+vm.data.id).addClass('hidden');
            },
            ajax: {
                url: api_urls.admin.notification.notification_users,
                data: function (e) {
                    e.id = vm.data.id;
                }
            },
            columns: [
                {data: "show_image" , searchable : false , orderable : false },
                {data: "name" , width : "200px"},
                {data: "email"},
                {data: "phone_with_code" , name : 'phone' , class : 'dir-ltr' , width : "200px"},
            ],

        });
    }
};
jQuery(document).ready(function () {

    DatatablesDataSourceAjaxServer.init()
});
