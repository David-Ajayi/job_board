<x-layout>
    <x-setting heading="Post a new Job">
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Post a New Job
        </h1>

{{--        <x-panel>--}}
            <form method="POST" action="/admin/jobs" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="thumbnail" type="file" />
                <x-form.input name="location" />
                <x-form.input name="salary" />
                <x-form.textarea name="short_description" />
                <x-form.textarea name="full_description" />



                <x-form.field>
                    <x-form.label name="category" />
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp


                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="category" />
                </x-form.field>





                <x-form.button>Post Job</x-form.button>
            </form>
{{--        </x-panel>--}}
    </section>
    </x-setting>
</x-layout>
