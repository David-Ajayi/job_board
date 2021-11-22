<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Post a New Job
        </h1>

        <x-panel>
            <form method="POST" action="/admin/jobs" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="title"
                    >
                        Job Title
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="title"
                           id="title"
                           value="{{ old('title') }}"
                           required
                    >

                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="salary"
                    >
                        Salary
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="salary"
                           id="salary"
                           value="{{ old('salary') }}"
                           required
                    >

                    @error('salary')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="location"
                    >
                        Location
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="location"
                           id="location"
                           value="{{ old('location') }}"
                           required
                    >

                    @error('location')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="slug"
                    >
                        Slug
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="slug"
                           id="slug"
                           value="{{ old('slug') }}"
                           required
                    >

                    @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="excerpt"
                    >
                        Short Description
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                              name="short_description"
                              id="short_description"
                              required
                    >{{ old('short_description') }}</textarea>

                    @error('short_description')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="full_description"
                    >
                        Body
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                              name="full_description"
                              id="full_description"
                              required
                    >{{ old('full_description') }}</textarea>

                    @error('full_description')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="category_id"
                    >
                        Category
                    </label>
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

                    @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="company_id"
                    >
                        Company
                    </label>
                    @php
                        $companies = \App\Models\Company::all();
                    @endphp


                    <select name="company_id" id="category_id">
                        @foreach ($companies as $company)
                            <option
                                value="{{ $company->id }}"
{{--                                in our loop if the old company id is equal to the old company id make that--}}
{{--                                the selected value in the dropdown--}}
                                {{ old('company_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($company->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="thumbnail"
                    >
                        Company Thumbnail
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="file"
                           name="thumbnail"
                           id="thumbnail"
                           required
                    >

                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <x-submit-button>Publish</x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>
