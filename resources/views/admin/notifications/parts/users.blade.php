<!-- Modal-->
<div class="modal fade" id="notification_users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{trans('admin.users')}} : <span v-text="data.title ? data.title.ar : ''"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-separate table-head-custom table-checkable" id="notification-users-table">
                    <thead>
                    <tr>
                        <th>{{trans('admin.image')}}</th>
                        <th>{{trans('admin.name')}}</th>
                        <th>{{trans('admin.email')}}</th>
                        <th>{{trans('admin.phone')}}</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                    {{trans('admin.cancel')}}
                </button>
            </div>
        </div>
    </div>
</div>