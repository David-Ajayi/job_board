<ul>

    @if($bookmarks->count()!==0)
@foreach($bookmarks as $bookmark)
<li>Job : {{$bookmark->job->short_description}}</li>



    @endforeach
</ul>
@else

    <p class="text-center">No Bookmarks to display</p>


@endif


