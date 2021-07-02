window.vm = new Vue({
    el: '#app',
    data: {
        ids: [],
        option_id: '',
        option_url: api_urls.admin.role.execute_option,
        options: options,
        permissions : permissions,

        add: true,
        data: '',
        shock_event: '',

        execute_loading: false,
    },
    created: function () {

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
            axios.delete(api_urls.admin.role.add + "/" + data.id).then(function (res) {

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
        }

    }
});


$(document).ready(function () {

    // init
    /////////////////////////////////////////
    dataTableOperation(table, vm);
    checkBoxOptionDataTable(table, vm);



    $('.btn-ch').click(function () {
        if( $(this).find('input').is(":checked")) {
            $(this).find('input').prop('checked' , false);
        }else {
            $(this).find('input').prop('checked' , true);
        }
        $('.ch_').change();

    });
    $('.btn-ch-all').click(function () {
        if( $(this).find('input').is(":checked")) {
            $(this).find('input').prop('checked' , false);
        }else {
            $(this).find('input').prop('checked' , true);
        }
        $('#ch_all').change();
    });

    /*********************** check if check all ************************/
    var parent_count = 0;
    var count_= 0;
    $('.ch_').each(function () {
        parent_count++;
        if ($(this).is(":checked")) {
            count_++;
        }
    });
    if (parent_count != count_) {
        $('#ch_all').prop('checked', false);
    } else {
        $('#ch_all').prop('checked', true);
    }

    /******************************************/
    $('.ch_').change(function () {
        var count = 0;

        $('.ch_').each(function () {
            if ($(this).is(":checked")) {
                count++;
            }
        });

        if (parent_count != count) {
            $('#ch_all').prop('checked', false);
        } else {
            $('#ch_all').prop('checked', true);
        }


    });
    $('#ch_all').change(function () {

        if ($(this).is(":checked")) {
            $('.ch_').each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $('.ch_').each(function () {
                $(this).prop("checked", false);
            });
        }

    });

});