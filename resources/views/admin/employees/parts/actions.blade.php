<div style="display: inline-flex;">
    @check_role('edit_user')
    <a href="javascript:;"
       class="edit m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
       title="Edit">
        <i class="la la-edit"></i>
    </a>
    @endcheck_role

    @check_role('delete_user')
    <a href="javascript:;"
       class="delete m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
       title="Delete">
        <i class="la la-trash"></i>
    </a>
    @endcheck_role
</div>

