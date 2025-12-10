@props([
    'post' => null,
    'delete' => null,
    'put' => null,
    'patch' => null,
    'flat' => false
])

@php
    $method = $post || $delete || $put || $patch ? 'POST' : 'GET';
@endphp

<form {{ $attributes->class(['gap-4 flex flex-col' => !$flat]) }} method="{{ $method }}">
    @if ($method != 'GET')
        @csrf
    @endif

    @if ($put)
        @method('PUT')
    @endif

    @if ($patch)
        @method('PATCH')
    @endif

    @if($delete)
        @method('DELETE')
    @endif

    {{ $slot }}
</form>
