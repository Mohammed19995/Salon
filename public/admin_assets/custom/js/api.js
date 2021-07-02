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
    complaint_category : {
        add : endpoint+'/admin/complaint-categories' ,
        get_remote : endpoint+'/admin/get-remote-complaint-categories' ,
        execute_option : endpoint+'/admin/complaint-categories/execute-option' ,
    },
    
    order : {
        add : endpoint+'/admin/orders' ,
        get_remote : endpoint+'/admin/get-remote-orders' ,
        execute_option : endpoint+'/admin/orders/execute-option' ,
    },

    role : {
        add : endpoint+'/admin/roles' ,
        get_remote : endpoint+'/admin/get-remote-roles' ,
        execute_option : endpoint+'/admin/roles/execute-option' ,
    },
    brand : {
        add : endpoint+'/admin/brands' ,
        get_remote : endpoint+'/admin/get-remote-brands' ,
        execute_option : endpoint+'/admin/brands/execute-option' ,
    },
    auction : {
        add : endpoint+'/admin/auctions' ,
        get_remote : endpoint+'/admin/get-remote-auctions' ,
        execute_option : endpoint+'/admin/auctions/execute-option' ,
        get_remote_auction_prices : endpoint+'/admin/get-remote-auction-prices' ,
    },
    setting : {
        update :  endpoint+'/admin/settings' ,
    },
    notification : {
        get_remote : endpoint+'/admin/get-remote-notifications',
        add :  endpoint+'/admin/notifications' ,
        notification_users : endpoint+'/admin/notification-users' ,
    },
    bank : {
        add : endpoint+'/admin/banks' ,
        get_remote : endpoint+'/admin/get-remote-banks' ,
        execute_option : endpoint+'/admin/banks/execute-option' ,
    },
    bank_transfer : {
        add : endpoint+'/admin/bank-transfers' ,
        get_remote : endpoint+'/admin/get-remote-bank-transfers' ,
        execute_option : endpoint+'/admin/bank-transfers/execute-option' ,
    },
};

window.api_urls = {
    admin : api_admin_urls ,

};

