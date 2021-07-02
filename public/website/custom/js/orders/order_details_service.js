vm_order_details = new Vue({
    el : '#vm_order_details',
    data : {
        order_id : order_id,
        can_edit : user.parent_id == null
    }
});

$(document).ready(function () {
    $("#select-products").select2({
        placeholder: "ابحث عن المنتجات",
        allowClear: !0,
        ajax: {
            url: get_url + "/api/list-products",
            dataType: "json",
            delay: 250,

            data: function (e) {
                return {q: e.term, page: e.page}
            },
            processResults: function (e, t) {
                return t.page = t.page || 1, {results: e.items, pagination: {more: e.incomplete_results}}
            },
            cache: !0
        },
        escapeMarkup: function (e) {
            return e
        },
        minimumInputLength: 3,
        language: {
            inputTooShort: function () {
                return 'الرجاء إدخال 3 أحرف أو أكثر';
            }
        },
        templateResult: function (e) {
            if (e.loading) return "جار البحث ...";
            return e.name || e.text;
        },
        templateSelection: function (e) {
            return e.name || e.text;
        },
    });
});