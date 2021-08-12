<span style="width: 100px;">
    <span class="label label-lg font-weight-bold  {{salonStatusData()[$status]['class']}} label-inline">
        {{salonStatusData()[$status]['text']}}
    </span>
</span>
@if($status == 2)
    <span class="mt-3">
            {{$reject_reason}}
       </span>
@endif