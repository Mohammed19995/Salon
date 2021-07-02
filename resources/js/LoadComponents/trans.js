module.exports = {
    data: function () {
        return {
            get_url: get_url,
            msg: {
                success: '',
                error: ''
            },
            loading: false,
            locales: locales,
            locale: _locale,
        }
    },

    methods: {
        /**
         * Translate the given key.
         */
        __(key, replace) {
            let translation, translationNotFound = true

            try {
                translation = key.split('.').reduce((t, i) => t[i] || null, window._translations[window._locale].php)

                if (translation) {
                    translationNotFound = false
                }
            } catch (e) {
                translation = key
            }

            if (translationNotFound) {
                translation = window._translations[window._locale]['json'][key]
                    ? window._translations[window._locale]['json'][key]
                    : key
            }

            _.forEach(replace, (value, key) => {
                translation = translation.replace(':' + key, value)
            })

            return translation
        },

        show_loading: function () {
            this.loading = true;
            $('#refresh-anyway').addClass('spinner spinner-white spinner-left');
            $('#refresh-anyway').prop('disabled' , false);
        },
        hide_loading: function () {
            this.loading = false;
            $('#refresh-anyway').removeClass('spinner spinner-white spinner-left');
            $('#refresh-anyway').prop('disabled' , false);
        },

        ///////////////// image  ////////////////////////
        getEmitFile: function (file, attr_name) {
            this.obj_data[attr_name] = file;
        },
        getAdvanceEmitFile: function (file, attr_name, key_has_multi, multi_file) {
            if (key_has_multi && key_has_multi != null) {
                this.obj_data[key_has_multi][attr_name] = multi_file ? file : (file.file != null ? file.file : file.id);
            } else {

                if(multi_file) {
                    let merge_files = this.obj_data[attr_name];
                    file.forEach(function (value) {
                        if(!merge_files.find(el => el.id == value.id)) {
                            merge_files.push(value);
                        }
                    });
                    this.obj_data[attr_name] = merge_files;
                }else {
                    this.obj_data[attr_name] = ( file.file != null ? file.file : file.id);

                }

                this.$nextTick(function () {
                    this.shock_event_multi_file = makeid(100);
                });

            }


        },
        clearEmitFile: function (file1_data) {
            if (this.key_has_multi && this.key_has_multi != null) {
                this.obj_data[file1_data.attr_name][file1_data.locale] = null;
            } else {
                this.obj_data[file1_data.attr_name] = null;
            }

        },

        SelectImageFromGallery: function (attr_name, selector_id_image, multi_file = false) {
            this.multi_file = multi_file;
            this.key_has_multi = null;
            this.attr_name = attr_name;
            this.selector_id_image = selector_id_image;

            this.shock_reset_file = makeid(100);
            $('#GalleryImages').modal('show');
        },

        SelectMultiLangImageFromGallery: function (key_has_multi, attr_name, selector_id_image, multi_file = false) {
            this.multi_file = multi_file;
            this.key_has_multi = key_has_multi;
            this.attr_name = attr_name;
            this.selector_id_image = selector_id_image;
            $('#GalleryImages').modal('show');
        },

        /////////////////////////////////////////////////

        blockUI: function (attr) {
            KTApp.block(attr, {
                state: 'primary',
                message: this.__('pagination.processing')
            });
        },
        UnblockUI: function (attr) {
            KTApp.unblock(attr, {});
        },

        ////////////////////////////////////////
        convertTimeToHuman: function (time) {
            if (time != null) {
                return convertTimeToHuman(time.seconds);
            }
        },

        ////////////////////////////////////
        getUploadsPath: function (path) {
            return get_url + "/uploads/" + path;
        },

        //////////////////////////////
        setFileOrImage: function (mime_type, selector_id_image, selected_image) {
            if (mime_type.includes('image')) {
                $('#' + selector_id_image).prop('src', selected_image.src);
                $('#ancor-' + selector_id_image).addClass('hidden');
                $('#' + selector_id_image).removeClass('hidden');
            } else {
                $('#ancor-' + selector_id_image).find('a').prop('href', selected_image.src);
                $('#ancor-' + selector_id_image).removeClass('hidden');
                $('#' + selector_id_image).addClass('hidden');
            }
        },
        ////////////////////////////
        getGender: function (gender) {
            switch (gender) {
                case 1 :
                    return this.__('admin.male');
                case 2 :
                    return this.__('admin.female');
                default :
                    return "";

            }
        },

        pluck: function (array, key) {
            return array.map(function (obj) {
                return obj[key];
            });
        },

        setParamInUrl: function (key, value) {
            var url = new URL(document.location.href);
            var query_string = url.search;
            var search_params = new URLSearchParams(query_string);
            search_params.set(key, value);
            url.search = search_params.toString();
            var new_url = url.toString();
            window.history.pushState({path: new_url}, '', new_url);

        },

        showConfirmAlert: function (this_, data) {

            return this_.$swal({
                title: data.title,
                text: data.text,
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: data.confirmButtonText,
                cancelButtonText: data.cancelButtonText,
                showCloseButton: true,
                showLoaderOnConfirm: true
            });
        },

        updateAnyway: function () {
            this.can_update_anyway = 1;
            this.makeAction();
        }
    },
}
