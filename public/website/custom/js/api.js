window.endpoint = get_url;

// website
window.api_urls = {
    auth : {
        login : endpoint+'/login',
        register : endpoint+'/register',
        reset_password : endpoint+'/api/password/reset',
        send_reset_password : endpoint+'/api/password/forget',
    },
    product : {
        get_list : endpoint+'/api/products'
    },
    cart : {
        get_list : endpoint+'/api/cart' ,
        add : endpoint+'/api/cart/add-or-update-product' ,
        delete : endpoint+'/api/cart/delete-product' ,
    },
    checkout : {
        data :  endpoint+'/api/checkout' ,
    },
    order :{
        get_list     : endpoint+'/api/orders' ,
        add          : endpoint+'/api/orders' ,
        add_to_cart  : endpoint+'/api/add-order-to-cart',

        my_orders     : endpoint+'/api/my-orders' ,
        my_sub_orders : endpoint+'/api/my-sub-orders' ,
        approve_order : endpoint+'/api/approve-order' ,
        reject_order : endpoint+'/api/reject-order' ,

        order_products : endpoint+'/api/order-products' ,

    },
    my_account : {
        update : endpoint+'/api/my-account/update-profile' ,
    },
    pharmacy : {
        pharmacies : endpoint+'/api/pharmacies' ,
    },
    bank : {
        bank_transfer : endpoint+'/api/bank-transfer' ,
    },
    notification : {
        notifications : endpoint+'/api/notifications' ,
    }

};

window.api_urls = {
    website : api_urls ,

};

