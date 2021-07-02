window.vm = new Vue({
    el: '#app',
    data: {

        ids: [],
        option_id: '',
        option_url: api_urls.admin.notification.execute_option,
        options: options,
        statuses : statuses,
        types : types,
        phone_code_statuses : phone_code_statuses,
        countries: countries,

        add: true,
        data: '',
        shock_event: '',

        filter_loading : false,
        execute_loading: false,
    },
    created: function () {
      //  this.setDefaultImage('');
    },
    methods: {
        setData: function (add, data) {

            this.add = add;
            this.data = data;
            this.shock_event = makeid(32);
        },
        delete: function (data) {
            let this_ = this;

            Swal.fire(get_translations.admin.deleting);
            axios.delete(api_urls.admin.notification.add + "/" + data.id).then(function (res) {

                var get_res = handle_response(this_, res.data, false, true);
                if (get_res) {
                    table.ajax.reload( null, false);
                }

            }).catch(function (err) {
                handle_response(this_, err.response.data, false , true);
                vm.loading = false;
            });

        },
        emitExecuteOption: function () {
            this.ids = [];
            $('#check_all').prop('checked', false);
            table.ajax.reload( null, false);
        },

        filterData : function () {
            this.filter_loading = true;
            table.ajax.reload();
        },

    }
});


$(document).ready(function () {

    // init
    $('.test-popup-link').magnificPopup({type: 'image'});
    $('#kt_datepicker_5').datepicker({
        format: 'yyyy-mm-dd',
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>',
        },
    });
    $("#select_user").select2({
        placeholder: "المستخدمين",
        allowClear: !0,
        ajax: {
            url: get_url + "/admin/list-users",
            dataType: "json",
            delay: 250,

            data: function (e) {
                return {q: e.term, page: e.page}
            },
            processResults: function (e, t) {
                return t.page = t.page || 1, {results: e.items, pagination: {more: e.incomplete_results}}
            },
            cache: !0
        },
        escapeMarkup: function (e) {
            return e
        },
        minimumInputLength: 3,
        language: {
            inputTooShort: function () {
                return 'الرجاء إدخال 3 أحرف أو أكثر';
            }
        },
        templateResult: function (e) {
            if (e.loading) return "جار البحث ...";
            return e.name || e.text;
        },
        templateSelection: function (e) {
            return e.name || e.text;
        },
    });
    /////////////////////////////////////////

    dataTableOperation(table, vm);
    checkBoxOptionDataTable(table, vm);

    table.on('click', '.view', function () {
        var row = $(this).closest('tr');

        if (row.attr('role') == undefined) {
            row = $(this).parent('tr'['role=row']);
        }
        vm.data = table.row(row).data();
        $('.notification-view-'+vm.data.id).addClass('hidden');
        $('.notification-loader-'+vm.data.id).removeClass('hidden');
        table_notification_users.ajax.reload();
    });
});
