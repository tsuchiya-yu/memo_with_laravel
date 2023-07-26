<x-mail::message>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('おっと！')
@else
# @lang('こんにちは！')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
今後とも{{ config('app.name') }}をよろしくお願いします。
@endif

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "もし 「:actionText」 ボタンが動かない場合はこのURLをコピーしてブラウザに貼り付けてください。\n".
    ': [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
</x-slot:subcopy>
@endisset
</x-mail::message>
