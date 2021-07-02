var vm_sidebar = new Vue({
    el : '#vm_sidebar',
    data : {
        user : user ,
        categories : categories ,
        _locale : _locale,
        latest_products : latest_products,
        most_sales_products : most_sales_products
    }
});
var vm_cart = new Vue({
    el : '#vm_cart'
});
var vm_header = new Vue({
    el : '#vm_header',
    data : {
        user : user,
        search : search,
    }
});


//
function myFunction() {
    document.getElementById("myDropdown-bell").classList.toggle("show");
}
function myFunction1() {
    document.getElementById("myDropdown-user").classList.toggle("show");
}
function goToAuth() {
    window.location = get_url+"/auth";
}
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn-user')) {
        var dropdowns = document.getElementsByClassName("dropdown-content-user");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                // openDropdown.classList.remove('show');
            }
        }
    }
};

window.onclick = function(event) {
    if (!event.target.matches('.dropbtn-bell')) {
        var dropdowns = document.getElementsByClassName("dropdown-content-bell");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                // openDropdown.classList.remove('show');
            }
        }
    }
};

$('.btn-bar').click(function(){
    $('.mobile-side-bar').toggleClass("open");
});
$('.car-icon').click(function(){
    $('.mobile-buy-car').toggleClass("open");
});
$('.btn-bar-close').click(function(){
    $('.mobile-side-bar').toggleClass("open");
});
$('.btn-car-close').click(function(){
    $('.mobile-buy-car').toggleClass("open");
});
