// dataTable
window.dataTableLanguage = function() {
    return {
        "processing": '<div class="blockUI blockMsg blockElement"\n' +
        '                         style="z-index: 1011; padding: 0px; margin: 0px; width: 200px; top: 0px; left: 412px; text-align: center; color: rgb(0, 0, 0); border: 0px; cursor: wait;">\n' +
        '                        <div class="blockui "><span>' +
        get_translations.pagination.processing +
        '</span><span\n' +
        '                                    class="spinner spinner-loader spinner-primary "></span></div>\n' +
        '                    </div>',

        "search": get_translations.pagination.search,
        "lengthMenu": get_translations.pagination.lengthMenu,
        "info": get_translations.pagination.info,
        "sZeroRecords": get_translations.pagination.sZeroRecords,
        "previous": get_translations.pagination.previous,
        "next": get_translations.pagination.next,

        paginate: {
            previous: get_translations.pagination.previous,
            next: get_translations.pagination.next
        }

    };
}
window.checkBoxOptionDataTable = function(table , vm) {
    // checkbox
    $('#check_all').change(function () {
        var if_checked = this.checked;
        vm.ids = [];
        table.rows().every(function (rowIdx, tableLoop, rowLoop) {
            var data = this.data();
            if(data.is_super != 1) {
                $('#option-row-' + (data.id)).prop('checked', if_checked);
                if(if_checked) {
                    vm.ids.push(data.id);
                }
            }

        });
    });
    table.on('change' , '.option-row' , function () {
        let if_all_checked = true;
        vm.ids = [];
        table.rows().every(function (rowIdx, tableLoop, rowLoop) {

            var data = this.data();
            if(!$('#option-row-' + (data.id)).is(":checked")) {
                if_all_checked = false;
            }else {
                vm.ids.push(data.id);
            }

        });
        if(if_all_checked) {
            $('#check_all').prop('checked', true);
        }else {
            $('#check_all').prop('checked', false);
        }

    });

}


window.dataTableOperation= function(table ,vm) {
    $('.add-button').on('click', function () {
        vm.setData(true, '');
        $('.show-form').removeClass('hidden');
        scrollToDiv('#kt_body');
    });
    $('.cancel-button').on('click', function () {
        $('.show-form').addClass('hidden');
    });

    table.on('click', '.edit', function () {
        var row = $(this).closest('tr');
        if (row.attr('role') == undefined) {
            row = $(this).parent('tr'['role=row']);
        }
        vm.edit_row = row;
        vm.setData(false, table.row(row).data());

        $('.show-form').removeClass('hidden');
        scrollToDiv('#kt_body');
    });
    table.on('click', '.delete', function () {

        var row = $(this).closest('tr');
        if (row.attr('role') == undefined) {
            row = $(this).parent('tr'['role=row']);
        }


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
                vm.delete(table.row(row).data());
            } else {
                result.dismiss && Swal.fire(get_translations.admin.cancelled_delete, get_translations.admin.didnt_delete, "error")
            }

        });

    });

    $('#refresh-data').on('click', function () {
        $('#refresh-data').addClass('spinner spinner-white spinner-left');
        $('#refresh-data').prop('disabled' , true);
        table.ajax.reload( function () {
            $('#refresh-data').removeClass('spinner spinner-white spinner-left');
            $('#refresh-data').prop('disabled' , false);
            let getRowData = table.rows( function ( idx, data, node ) {return data.id == vm.data.id;}).data();
            vm.setData(false,getRowData[0]);
            $('.show-form').removeClass('hidden');
            scrollToDiv('#kt_body');
        } );

    });

}
