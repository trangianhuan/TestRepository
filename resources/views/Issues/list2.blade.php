@extends('home.home')

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script> 
<!--ggg-->
@stop

@section('content')
<div class="col-md-12" >
	<div class="row ">
		<div class="col-md-12">
			<table class="table table-hover">
				<tr>
					<th class="col-md-3">Ticked</th>
					<th class="col-md-3">Tracker</th>
					<th class="col-md-3">Subject</th>
					<th class="col-md-3">Asigne</th>			
				</tr>
				@foreach($tickeds as $ticked)
				<tr>
					<td>{{link_to_route('IssuesDetail','#'.$ticked->tickedNo,[$ticked->tickedNo])}}</td>
					<td>{{$ticked->trackerName}}</td>
					<td>{{$ticked->subject}}</td>
					<td>{{$ticked->assigneMemberNo}}</td>
				</tr>
				@endforeach		

			</table>			
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-2">			
		</div>
		<div class="col-md-10">
			{{ $tickeds->links('vendor.pagination.paging') }}
		</div>
	</div>
</div>
@stop