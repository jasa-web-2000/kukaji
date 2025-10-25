<div class="mt-1 flex items-center justify-start gap-x-2.5 **:w-auto! [&_input]:scale-125 [&_label]:text-[13px]!">
    <input type="radio" id="{{ $id }}" name="{{ $name }}" value="{{ $id }}"
        {{ old($name) == $id || $value == $id ? 'checked' : '' }} required @disabled($disabled) />
    <label for="{{ $id }}">
        {{ $label }}
    </label>
</div>
