window.endpoint = get_url;

// admin
window.api_admin_urls = {
    auth : {
        login : endpoint+'/admin/login',
        confirm :  endpoint+'/admin/confirm-account',
    },
    profile : {
        update : endpoint+'/admin/profile' ,
        change_password : endpoint+"/admin/change-password" ,
    },
    admin : {
        add : endpoint+'/admin/admins' ,
        get_remote : endpoint+'/admin/get-remote-admins',
        get_list : endpoint+'/admin/get-admin-list' ,
        execute_option : endpoint+'/admin/admins/execute-option' ,
        confirming : endpoint+'/admin/admins/confirm-account' ,
    },

    user : {
        add : endpoint+'/admin/users' ,
        execute_option : endpoint+'/admin/users/execute-option' ,
        get_remote : endpoint+'/admin/get-remote-users',

    },

    gallery : {
        add : endpoint+'/admin/galleries' ,
        get_remote : endpoint+'/admin/get-remote-galleries' ,
    },
    gallery_types : {
        get_remote : endpoint+'/admin/get-remote-gallery-types' ,
    },

    country : {
        add : endpoint+'/admin/countries' ,
        get_remote : endpoint+'/admin/get-remote-countries',
        execute_option : endpoint+'/admin/countries/execute-option' ,
    },
    category : {
        add : endpoint+'/admin/categories' ,
        get_remote : endpoint+'/admin/get-remote-categories' ,
        execute_option : endpoint+'/admin/categories/execute-option' ,
    },

    city : {
        add : endpoint+'/admin/cities' ,
        get_remote : endpoint+'/admin/get-remote-cities' ,
        get_country_cities : endpoint+'/admin/get-remote-country-cities' ,
        execute_option : endpoint+'/admin/cities/execute-option' ,
    },
    neighborhood : {
        add : endpoint+'/admin/neighborhoods' ,
        get_remote : endpoint+'/admin/get-remote-neighborhoods' ,
        get_city_neighborhoods : endpoint+'/admin/get-remote-city-neighborhoods' ,
        execute_option : endpoint+'/admin/neighborhoods/execute-option' ,
    },
    nationality : {
        add : endpoint+'/admin/nationalities' ,
        get_remote : endpoint+'/admin/get-remote-nationalities' ,
        execute_option : endpoint+'/admin/nationalities/execute-option' ,
    },


    role : {
        add : endpoint+'/admin/roles' ,
        get_remote : endpoint+'/admin/get-remote-roles' ,
        execute_option : endpoint+'/admin/roles/execute-option' ,
    },
    salon_category : {
        add : endpoint+'/admin/salon-branches' ,
        get_remote : endpoint+'/admin/get-remote-salon-branches' ,
        execute_option : endpoint+'/admin/salon-branches/execute-option' ,
    },

    salon : {
        add : endpoint+'/admin/salons' ,
        get_remote : endpoint+'/admin/get-remote-salons' ,
        execute_option : endpoint+'/admin/salons/execute-option' ,
    },
    slider : {
        add : endpoint+'/admin/sliders' ,
        get_remote : endpoint+'/admin/get-remote-sliders' ,
        execute_option : endpoint+'/admin/sliders/execute-option' ,
    },
    setting : {
        update :  endpoint+'/admin/settings' ,
    },
    notification : {
        get_remote : endpoint+'/admin/get-remote-notifications',
        add :  endpoint+'/admin/notifications' ,
        notification_users : endpoint+'/admin/notification-users' ,
    },

};

window.api_urls = {
    admin : api_admin_urls ,

};

