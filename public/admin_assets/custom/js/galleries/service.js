var vm = new Vue({
    el: '#app',
    data : {
        file1_data : {
            selector_id_image : 'image1',
            attr_name : 'src',
            src : JSON.parse(JSON.stringify(default_image)),
            type : 'image'
        },        types : types ,
        add: true,
        data: '',
        shock_event: '',
    },
    methods : {

        setData: function (add, data, image) {
            this.file1_data = {
                selector_id_image : 'image1',
                attr_name : 'src',
                src : add ? JSON.parse(JSON.stringify(default_image)) : data.src ,
                type : add || !data ? "image" : data.mime_type,
            };
            vm.add = add;
            vm.data = data;
            vm.shock_event = makeid(32);
        },
        editGallery : function (image) {
            this.setData(false ,image , image.src );
            $('#galleryImageForm').modal('show');
        },
        delete: function (data) {
            let this_ = this;

            Swal.fire(get_translations.admin.deleting);
            axios.delete(api_urls.admin.gallery.add + "/" + data.id).then(function (res) {

                var get_res = handle_response(this_ ,res.data , false , true);
                if (get_res.status) {
                    this_.$root.$emit('delete-gallery-event' , data);
                }

            }).catch(function (err) {
                handle_response(this_, err.response.data, false , true);
                vm.loading = false;
            });

        },
        deleteGallery : function (image) {
            Swal.fire({
                title: get_translations.admin.sure_delete,
                text: "",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: get_translations.admin.yes_delete,
                cancelButtonText: get_translations.admin.no_delete,
                reverseButtons: !0
            }).then(function (result) {

                if (result.value) {
                    vm.delete(image);
                } else {
                    result.dismiss && Swal.fire(get_translations.admin.cancelled_delete, get_translations.admin.didnt_delete, "error")
                }

            });
        },
    }
});

$(document).ready(function () {
    $('.add-button').on('click', function () {
        vm.setData(true, '', '');
      $('#galleryImageForm').modal('show');
    });
});