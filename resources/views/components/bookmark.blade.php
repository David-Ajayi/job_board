@props(['job'])



<form method="POST" action="/bookmarks/{{$job->id}}" ><strong>Bookmark Job : </strong>
    @csrf

{{--    <input type="hidden" name="bookmark" value="0" onClick="this.form.submit()"/>--}}
    <input type="checkbox" name="bookmark" value="1" onClick="this.form.submit()" />

</form>
