<style type="text/css">
	.danger {color: red;}
	.mauxanh {color:blue;}
</style>
@if (Session::has('message'))
<div class="{{ Session::get('mtb') }}">
	{{ Session::get('message') }}
</div>
@endif