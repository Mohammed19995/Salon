window.vm = new Vue({
    el: '#app',
    data: {

        data: '',
        shock_event: '',
        settings : {
            place : place.value ,
            phone : phone.value ,
            email : email.value ,
            facebook : facebook.value ,
            twitter : twitter.value ,
            instagram : instagram.value ,
            snapchat : snapchat.value ,
            privacy_policy : privacy_policy.value ,
            prevented_goods : prevented_goods.value ,
            about_us : about_us.value ,
            about_app : about_app.value ,
            app_ratio : app_ratio.value,

        },
    },
    created: function () {

    },
    methods: {

    }
});


$(document).ready(function () {
    // init
    $('.custom-summernote').summernote({
        tabsize: 2,
        height: 150
    });
});