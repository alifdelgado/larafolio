@props(['items' => []])

@foreach ($items as $item)
    <a href="{{ $item->link }}" class="text-sm font-semibold leading-6 text-gray-900">{{ $item->label }}</a>
@endforeach
