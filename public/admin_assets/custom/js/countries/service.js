var vm = new Vue({
    el: '#app',
    data: {
        ids: [],
        option_id: '',
        option_url: api_urls.admin.country.execute_option,
        options: options,

        file1_data : {
            selector_id_image : 'image1',
            attr_name : 'flag',
            src : JSON.parse(JSON.stringify(default_image)),
            type : 'image'
        },

        add: true,
        data: '',
        shock_event: '',

    },
    created: function () {
    },
    methods: {

        setData: function (add, data) {
            this.file1_data = {
                selector_id_image : 'image1',
                attr_name : 'flag',
                src : add ? JSON.parse(JSON.stringify(default_image)) : data.flag ,
                type : add || !data.get_flag ? "image" : data.get_flag.mime_type,
            };

            this.add = add;
            this.data = data;
            this.shock_event = makeid(32);

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
    $('.test-popup-link').magnificPopup({type: 'image'});

    /////////////////////////////////////////

    dataTableOperation(table, vm);
    checkBoxOptionDataTable(table, vm);
});