@if (auth()->user()->role->nama == "$x")
{{$slot}}
@endif