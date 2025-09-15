<div>
    <label for="{{ $field }}">{{ $placeholder }}
        <input
            class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 mb-2 w-full"
            name="{{ $field }}" id="{{ $field }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
            @if ($isRequired) required @endif {{ $attributes }} />
        <x-forms.input-error field="{{ $field }}" />
    </label>
</div>
