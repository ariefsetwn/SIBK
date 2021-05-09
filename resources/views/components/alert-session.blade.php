@if (!empty(session('pesan')))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button> 
	<strong>{{session('pesan')}}</strong>
</div>
@endif