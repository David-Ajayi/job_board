<x-layout>



<section class="px-6 py-8">


    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
{{--                <img src="/images/illustration-1.png" alt="" class="rounded-xl">--}}

                <p class="mt-4 block text-gray-400 text-xs">
{{--                    Published <time>1 day ago</time>--}}
                    Published
                    <time>{{ $job->created_at->diffForHumans() }}</time>
                </p>


                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="{{ asset('storage/' . $job->thumbnail) }}" alt="" class="rounded-xl">

                    <div class="ml-3 text-left">
                        <h5 class="font-bold">Posted By: {{$job->user->company}}</h5>


                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/jobs"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Jobs
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category="$job->category" />
                        <form method="POST" action="/bookmarks/{{$job->id}}" >
                            @csrf
{{--                            <button>favourite me</button>--}}
                            <input type="hidden" name="bookmark" value="0" onClick="this.form.submit()"/>
                            <input type="checkbox" name="bookmark" value="1" onClick="this.form.submit()" />
                        </form>

                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                   {{$job->title}}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">{{$job->full_description}}</div>
            </div>

            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @include ('jobs._add-comment-form')

                {{--                <x-job-comment />--}}
{{--                <x-job-comment />--}}
{{--                <x-job-comment />--}}
                @foreach ($job->comments as $comment)
                    <x-job-comment :comment="$comment" />
                @endforeach
            </section>
        </article>
    </main>


</section>


</x-layout>


{{--<p>--}}
{{--    Posted by <a href =#>{{$job->company}}</a>Category:<a href = "/categories/{{$job->category->id}}">{{$job->category->name}}</a>--}}
{{--</p>--}}
