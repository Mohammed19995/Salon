window.vm = new Vue({
    el: '#app',
    data: {
        ids: [],
        option_id: '',
        option_url: api_urls.admin.user.execute_option,
        options: options,
        statuses : statuses,
        types : types,
        phone_code_statuses : phone_code_statuses,

        file1_data : {
            selector_id_image : 'image1',
            attr_name : 'flag',
            src : JSON.parse(JSON.stringify(default_image)),
            type : 'image'
        },
        add: true,
        data: '',
        shock_event: '',
        countries: countries,

        filter_loading : false,
        execute_loading: false,
    },
    created: function () {
      //  this.setDefaultImage('');
    },
    methods: {
        setData: function (add, data) {
            this.file1_data = {
                selector_id_image : 'image1',
                attr_name : 'image',
                src : add ? JSON.parse(JSON.stringify(default_image)) : data.image ,
                type : add || !data.get_image ? "image" : data.get_image.mime_type,
            };
            this.add = add;
            this.data = data;
            this.shock_event = makeid(32);
        },
        delete: function (data) {
            let this_ = this;

            Swal.fire(get_translations.admin.deleting);
            axios.delete(api_urls.admin.user.add + "/" + data.id).then(function (res) {

                var get_res = handle_response(this_, res.data, false, true);
                if (get_res) {
                    table.ajax.reload( null, false);
                }

            }).catch(function (err) {
                handle_response(this_, err.response.data, false , true);
                vm.loading = false;
            });

        },
        confirm_account : function (data) {
            let this_ = this;
            show_swal_loading(get_translations.admin.confirming);
            let set_data = {
                ids : [data.id] ,
                option_id : 4
            };
            axios.post(api_urls.admin.user.execute_option, set_data).then(function (res) {
                var get_res = handle_response(this_ ,res.data , false , true);
                if(res.data['status']) {
                    table.ajax.reload( null, false);
                }
            }).catch(function (err) {

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
    /////////////////////////////////////////

    dataTableOperation(table, vm);
    checkBoxOptionDataTable(table, vm);

    table.on('click' , '.confirm_account' , function () {
        var row = $(this).closest('tr');
        if (row.attr('role') == undefined) {
            row = $(this).parent('tr'['role=row']);
        }
        Swal.fire({
            title: get_translations.admin.sure_confirm,
            text: "",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: get_translations.admin.yes_confirm,
            cancelButtonText: get_translations.admin.no_confirm,
            reverseButtons: !0
        }).then(function (result) {
            if (result.value) {
                vm.confirm_account(table.row(row).data());
            } else {
                result.dismiss && Swal.fire(get_translations.admin.cancelled_confirm, get_translations.admin.didnt_confirm, "error");
            }
        });

    })
});
