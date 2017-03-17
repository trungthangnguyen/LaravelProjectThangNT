@extends ('test_view')
<marquee behavior="" direction="">Chao mung ban den voi website</marquee>
@section('title','test ke thua tu test_view.blade')
@section('sidebar')
@parent
<p>
	this is appended to the master sidebar
</p>
{{--*/ $diem = 'test' /*--}}

@php

$diem=5
@endphp
@if ($diem<4)
Ban te qua di!
@else 
Ban cung ko den noi te.
@endif
<hr>for <br>
@for ($i = 0; $i < 9; $i++)
{{$i}}
<br>
@endfor
<hr> while <br>
{{-- vong lap while --}}
@php
$i=0
@endphp
@while ($i <= 12)
{{ $i }}
@php
$i++
@endphp
@endwhile
@stop

id cua ban la :{{ $id +2}}
</br>