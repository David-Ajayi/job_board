<x-layout>
    @include ('jobs._header')




    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($jobs->count()!==0)
        @foreach($jobs as $job)
        <x-horizontal-card :job="$job" />




        @endforeach
            {{ $jobs->links() }}
{{--            render the pagination links--}}
        @else

            <p class="text-center">No Job postings to display</p>


        @endif



        <div class="lg:grid lg:grid-cols-2">
{{--            <x-grid-card/>--}}
{{--            <x-grid-card/>--}}



        </div>

        <div class="lg:grid lg:grid-cols-3">
{{--            <x-grid-card/>--}}








        </div>
    </main>



</x-layout>



{{--    <title>All jobs</title>--}}

{{--    @foreach($jobs as $job)--}}
{{--        <h1>--}}
{{--            <a href = "/jobs/{{$job->id}}">--}}
{{--                {{$job->title}}--}}
{{--            </a>--}}

{{--        </h1>--}}

{{--        <a href = "/categories/{{$job->category->id}}">{{$job->category->name}}</a>--}}

{{--        <div>--}}
{{--            <p>{{$job-> description}}</p>--}}
{{--        </div>--}}

{{--    @endforeach--}}






