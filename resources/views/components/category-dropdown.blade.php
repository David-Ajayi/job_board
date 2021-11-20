
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
            <x-dropdown>
                <x-slot name="trigger">
                    <button  class="py-2 pl-3 pr-9 text-sm font-semibold w-32 text-left inline-flex">


                        {{isset($currentCategory) ? ucwords($currentCategory-> name ): 'Categories'}}


                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                             height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>

                    </button>

                </x-slot>


{{--php http build query function takes in an array and builds a query string so[name=>joh] changes to
name=john. [name=>john, pet=>dog] changes to name=john&pet=dog essentialu builds a query string--}}


{{--                                        binding these options to x-data if truthy then show links options otherwise don't--}}
                    @foreach($categories as $category)
{{--                        <a href="/jobs/?category={{$category->slug}}"--}}
{{--                now this works for the reverse if we want to search and then select a category because ethe query string is appended--}}
{{--                previously if you search then select a category it reverts the query string to search based on selected category only--}}
                    <a href="/jobs/?category={{$category->slug}} & {{ http_build_query(request()->except('category','page'))}}"
                           class="block text-left px-3 text-s leading-6
                    hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white
                     {{isset($currentCategory) && $currentCategory->slug ===$category->slug ? 'bg-blue-500 hover:text-white' : ''}}
                               "
                        >{{ucwords($category->name)}}</a>

                @endforeach

            </x-dropdown>
