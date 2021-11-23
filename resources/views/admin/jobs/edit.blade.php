<x-layout>
    <x-setting :heading="'Edit Job: ' . $job->title">
        <form method="POST" action="/admin/jobs/{{ $job->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
{{--            we want to edit so wee patch--}}

            <x-form.input name="title" :value="old('title', $job->title)" required />
            <x-form.input name="slug" :value="old('slug', $job->slug)" required />
            <x-form.input name="salary" :value="old('slug', $job->salary)" required />
            <x-form.input name="location" :value="old('slug', $job->location)" required />
            <x-form.input name="company" :value="old('company', $job->user->company)" disabled />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $job->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $job->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.textarea name="short_description" required>{{ old('excerpt', $job->short_description) }}</x-form.textarea>
            <x-form.textarea name="full_description" required>{{ old('body', $job->full_description) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $job->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
{{--                <select name="company_id" id="company_id" required>--}}
{{--                    @foreach (\App\Models\Company::all() as $company)--}}
{{--                        <option--}}
{{--                            value="{{ $company->id }}"--}}
{{--                            {{ old('company_id', $job->company_id) == $job->id ? 'selected' : '' }}--}}
{{--                        >{{ ucwords($company->name) }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
