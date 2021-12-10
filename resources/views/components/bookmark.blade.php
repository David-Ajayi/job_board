@props(['job', 'userBookmarks'])



<form method="POST" action="/bookmarks/{{$job->id}}" ><strong>Bookmark Job : </strong>
    @csrf


{{--    @auth()--}}
{{--       @if (App\Models\Bookmark::where('user_id', request()->user()->id)-> where('job_id', $job->id)->exists())--}}
{{--        <input type="checkbox" name="bookmark"  onClick="this.form.submit() " checked/>--}}

{{--         @else--}}
{{--        <input type="checkbox" name="bookmark"  onClick="this.form.submit()" />--}}
{{--         @endif--}}
{{--    @endauth--}}
    @auth()
        @foreach($userBookmarks as $bookmark)
        @if($bookmark == $job->id)
                        <input type="checkbox" id="bookmark" name="bookmark" value = "1" onClick="this.form.submit()" checked/>
                @break

            @endif
        @endforeach
    @if(!$job->isBookmarked())
            <input type="checkbox"  id="bookmark" name="bookmark"  onClick="this.form.submit() " />

            @endif
    @endauth

</form>
