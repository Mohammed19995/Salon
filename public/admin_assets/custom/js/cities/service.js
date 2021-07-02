window.vm = new Vue({
    el: '#app',
    data: {
        ids: [],
        option_id: '',
        option_url: api_urls.admin.city.execute_option,
        options: options,

        add: true,
        data: '',
        shock_event: '',
        countries: countries,

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
            axios.delete(api_urls.admin.city.add + "/" + data.id).then(function (res) {

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
    $('#select_filter_country').change(function () {
        table.ajax.reload();
    });
    $('#select_filter_state').change(function () {
        table.ajax.reload();
    });

    /////////////////////////////////////////
    dataTableOperation(table, vm);
    checkBoxOptionDataTable(table, vm);
});