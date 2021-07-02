@if($children_count > 0)
    <a href="javascript:;" class="show_children">
        {{$name}}
    </a>
@else
    {{$name}}
@endif