@props(['job'])



<form method="POST" action="/bookmarks/{{$job->id}}" ><strong>Bookmark Job : </strong>
    @csrf


    @auth()
       @if (App\Models\Bookmark::where('user_id', request()->user()->id)-> where('job_id', $job->id)->exists())
        <input type="checkbox" name="bookmark" value="1" onClick="this.form.submit() " checked/>

         @else
        <input type="checkbox" name="bookmark" value="0" onClick="this.form.submit()" />
         @endif
    @endauth

</form>
