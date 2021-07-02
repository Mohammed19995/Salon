window.handle_response = function(vue_object ,response , show_message , show_swal , hide_form = true ) {

    let message = response.message;

    if(response.status) {
        if(show_message) {
            vue_object.msg.success = message;
            vue_object.msg.error = "";
            scrollToDiv("#kt_body");
        }
        if(show_swal) {
            Swal.fire("تم", message, "success");
        }

        if(hide_form) {
            setTimeout(function () {
                $('.show-form').addClass('hidden');
            } , 1500);
        }
        vue_object.traffic_cop = false;
        vue_object.can_update_anyway = 0;

    }else {

        if(show_message) {
            vue_object.msg.success = "";
            vue_object.msg.error = message;
            vue_object.traffic_cop = response.data['error_code'] == 409 ? true : false;
            scrollToDiv("#kt_body");
        }
        if(show_swal) {

            Swal.fire("خطأ", message, "error");
        }
    }

    setTimeout(function () {
        vue_object.msg.success = '';
    } , 1500);


    return response;
}

window.handle_website_response = function(vue_object , vue_param ,response , show_message , show_swal , scroll_div_selector = '' ) {

    let message = response.message;
    if(response.status) {
        if(show_message) {
            vue_object[vue_param].success = message;
            vue_object[vue_param].error = "";
            if(scroll_div_selector != '') {
                scrollToDiv(scroll_div_selector);
            }

        }
        if(show_swal) {
            vue_object.$swal("تم", message, "success");
        }


    }else {
        if(show_message) {
            vue_object[vue_param].success = "";
            vue_object[vue_param].error = message;
            if(scroll_div_selector != '') {
                scrollToDiv(scroll_div_selector);
            }
        }
        if(show_swal) {
            vue_object.$swal("خطأ", message, "error");
        }
    }

    setTimeout(function () {
        vue_object[vue_param].success = '';
    } , 1500);


    return response;
}
window.clear_message = function(vue_object) {
    vue_object.msg.success = '';
    vue_object.msg.error = '';
}
window.show_swal_loading = function (title) {
    Swal.fire({
        title: title,
        onOpen: function() {
            Swal.showLoading()
        }
    });
},

window.pluck_ = key => array => Array.from(new Set(array.map(obj => obj[key])));

window.sort_number= function(a, b) {
    return a - b;
}

window.read_url = function(input, selector) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $(selector).attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
}


window.makeid = function(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

window.scrollToDiv = function(selector) {
    $("html, body").animate({
        scrollTop: $(selector).offset().top
    }, 800);

}
window.scrollDownDiv = function (selector) {
    $(selector).animate({
        scrollTop: $(selector)[0].scrollHeight - $(selector)[0].clientHeight
    }, 300);
},


window.convertTimeToHuman = function (time) {
    let dateObj = new Date(time * 1000);
    let hours = dateObj.getUTCHours();
    let minutes = dateObj.getUTCMinutes();
    let seconds = dateObj.getSeconds();

    return hours.toString().padStart(2, '0') + ':' +
        minutes.toString().padStart(2, '0') + ':' +
        seconds.toString().padStart(2, '0');
};
// multi language
window.getMultiLangField = function(default_value = '') {
    let fields = {};
    locales.forEach(function (value) {
        fields[value] = default_value;
    });
    return fields;
}
window.getFileDataMultiLangField = function(selector_id_image , attr_name , add , service_files) {
    let files_lang_data = [];
    let get_service_file = '';
    locales.forEach(function (value) {
        get_service_file = add ? '' : service_files.find(el => el.language == value);
        files_lang_data.push({
            locale : value ,
            selector_id_image : selector_id_image+value,
            attr_name : attr_name,
            src : add ? '' : get_service_file ? get_service_file.src : '',
            type : add ? '' : get_service_file ? get_service_file.mime_type : '',
        });
    });
    return files_lang_data;
}
window.setFileDataMultiLangField = function (service_files) {
    let files = {};
    let get_service_file = '';
    locales.forEach(function (value) {
        get_service_file = service_files.find(el => el.language == value);
        files[value] = get_service_file ? get_service_file.file_id : '';
    });
    return files;
}


// axios
window.makeAxiosRequest = async function (this_ , config) {

    try {
         return await axios(config);
    } catch (err) {
        handle_response(this_, err.response.data, true, false);
    }

}
window.makeApiAxiosRequest = async function (this_ , param,show_message , show_swal , scroll_div_selector , config) {
    try {
       // config.headers = {'Accept-Language' : _locale};
        return await axios(config);
    } catch (err) {

        if(err.response.status == 401) {
            show_swal = true;
        }
        handle_website_response(this_ , param, err.response.data, show_message , show_swal , scroll_div_selector);
    }

}
