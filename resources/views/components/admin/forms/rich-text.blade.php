@props([
    'id',
    'name',
    'value' => '',
    'label' => null,
])

<div>
    @if($label)
        <label
            for="{{ $id }}"
            class="mb-1 block text-xs font-semibold uppercase
                   tracking-wide text-sp-slate"
        >
            {{ $label }}
        </label>
    @endif

    <div
        id="{{ $id }}"
        data-admin-rich-text
        data-name="{{ $name }}"
        data-value="{{ $value }}"
        {{ $attributes }}
    ></div>

    <x-admin.forms.field-error
        :name="$name"
        class="mt-2"
    />
</div>