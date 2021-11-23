@props(['name'])
{{--type maps to a type of text. passed through as a prop. type will be text as default unless overidden as we do--}}
{{--with the file type for out thumbnail field--}}

<x-form.field>
{{--    our form field is a div--}}
    <x-form.label name="{{ $name }}"/>

    <input class="border border-gray-400 p-2 w-full"
{{--           type="{{ $type }}"--}}
           name="{{ $name }}"
           id="{{ $name }}"
           {{$attributes (['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
