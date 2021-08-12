@check_role('edit_auction')
<a href="{{url('admin/salons')."/".$id."/edit"}}"
   class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
    <i class="la la-edit"></i>
</a>
@endcheck_role

{{--@check_role('view_auction')--}}
{{--<a href="{{url('admin/salons')."/".$id}}"--}}
   {{--class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">--}}
    {{--<i class="la la-eye"></i>--}}
{{--</a>--}}
{{--@endcheck_role--}}

@check_role('delete_auction')
<a href="javascript:;"
   class="delete m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
   title="Delete">
    <i class="la la-trash"></i>
</a>
@endcheck_role


