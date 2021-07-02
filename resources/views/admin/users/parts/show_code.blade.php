@if(is_null($verified_at))
    <span class="label label-light-primary font-weight-bold label-inline mr-2" style="font-size: 15px;padding-top: 8px;padding-bottom: 8px">
        {{$code}}
    </span>
    <br>
    <button type="button" class="btn btn-primary btn-sm mt-3 confirm_account">
        {{trans('admin.confirm')}}
    </button>
@else
    <span class="label label-light-default font-weight-bold label-inline mr-2" >
        {{trans('admin.confirmed')}}
    </span>
@endif