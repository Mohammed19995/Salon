window.vm = new Vue({
    el: '#app',
    data: {
        ids: [],
        option_id: '',
        option_url: api_urls.admin.salon_category.execute_option,
        options: options,

        file1_data: {
            selector_id_image: 'image1',
            attr_name: 'image',
            src: JSON.parse(JSON.stringify(default_image)),
            type: 'image'
        },
        add: true,
        data: '',
        shock_event: '',

        execute_loading: false,
        filter_loading: false,
    },
    created: function () {
        //  this.setDefaultImage('');
    },
    methods: {

        setData: function (add, data) {
            this.file1_data = {
                selector_id_image: 'image1',
                attr_name: 'image',
                src: add ? JSON.parse(JSON.stringify(default_image)) : data.image,
                type: add || !data.get_image ? "image" : data.get_image.mime_type,
            };
            this.add = add;
            this.data = data;
            this.shock_event = makeid(32);
        },
        delete: function (data) {
            let this_ = this;

            Swal.fire(get_translations.admin.deleting);
            axios.delete(api_urls.admin.salon_category.add + "/" + data.id).then(function (res) {

                var get_res = handle_response(this_, res.data, false, true);
                if (get_res) {
                    table.ajax.reload(null, false);
                }

            }).catch(function (err) {
                handle_response(this_, err.response.data, false, true);
                vm.loading = false;
            });

        },

        emitExecuteOption: function () {
            this.ids = [];
            $('#check_all').prop('checked', false);
            table.ajax.reload(null, false);
        },
        filterData: function () {
            this.filter_loading = true;
            table.ajax.reload(null, false);
        },


    }
});


$(document).ready(function () {

    // init
   $('.test-popup-link').magnificPopup({type: 'image'});

    /////////////////////////////////////////

    dataTableOperation(table, vm);
    checkBoxOptionDataTable(table, vm);

});