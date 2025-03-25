<div {{ $attributes->merge(['class' => "flex flex-col"]) }}>
    <label for="{{ $id }}" class="text-[{{ $labelColor }}] {{ $labelSize }}">{{ $label }}</label>
    <input type="{{ $inputType }}" name="{{ $name }}" id="{{ $id }}" class="{{ $inputColor }} {{ $inputClass}} py-1 px-2">
</div>
