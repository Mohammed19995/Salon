window.tagify = null;
window.vm = new Vue({
    el: '#app',
    data: {
        ids: [],
        option_id: '',
        countries : countries,
        categories : categories,
        branches : branches,

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
    }
});


$(document).ready(function () {


    if(salon != -1) {
        vm.setData(false, salon);
        $('.show-form').removeClass('hidden');
        scrollToDiv('#kt_body');
    }else {
        vm.setData(true, '');
        $('.show-form').removeClass('hidden');
        scrollToDiv('#kt_body');
    }
    $('#refresh-data').on('click', function () {
        window.location = "";
    });


});