@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
تحيات,<br>
فريق عمل كيورز لايف
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
{{--@lang(--}}
{{--    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".--}}
{{--    'into your web browser:',--}}
{{--    [--}}
{{--        'actionText' => $actionText,--}}
{{--    ]--}}
{{--) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>--}}
<p>إذا كنت تواجه مشكلة انقر فوق على زر إعادة تعيين كلمة المرور , انسخ والصق عنوان URL أدناه في متصفح الويب الخاص بك</p>
<span class="break-all">{{ $displayableActionUrl }}</span>
@endslot
@endisset
@endcomponent
