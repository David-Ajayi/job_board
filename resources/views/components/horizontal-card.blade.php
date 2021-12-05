@props(['job'])




<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('storage/' . $job->thumbnail) }}" alt="Job Company Logo" class="rounded-xl">
        </div>


        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">

                  <x-category-button :category="$job->category" />
                    <x-bookmark :job="$job"/>


{{--                    <a href="#"--}}
{{--                       class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"--}}
{{--                       style="font-size: 10px">Updates</a>--}}
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{$job->title}}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                                       <time>{{ $job->created_at->diffForHumans() }}</time>
                                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{$job->short_desciption}}
                </p>

                <p class="mt-4">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>

            <div class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">Location : {{$job->location}}</h5>
{{--                        <h6 class="font-bold">Company: <a href="jobs/?company={{$job->user->company}}">{{$job->user->company}}</a></h6>--}}

                        <h6
                        @if (request('company'))

                            class="font-bold">Company: <a href="?company={{$job->user->company}}">{{$job->user->company}}</a>
                            @else
                            class="font-bold">Company: <a href="jobs/?company={{$job->user->company}}">{{$job->user->company}}</a>
                            @endif

                        </h6>

                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/jobs/{{$job->slug}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>

            </footer>
        </div>
    </div>
</article>
