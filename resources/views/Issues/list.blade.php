@extends('home.home')

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script>
<script type="text/javascript" src="{{asset('js/angularController.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/dirPagination.js')}}"></script> 
<script  src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-resource.min.js">
	
</script>
<script  type="text/javascript" src="https://code.angularjs.org/1.3.11/angular-route.js"></script>
<script defer src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-resource.min.js"></script>
<!--ggg-->
{{$title='ahihi'}}
@stop

@section('content')
<div class="col-md-12" ng-app="tickedApp" ng-controller="TickedController">
	<div class="row ">
		<div class="col-md-12" >
			<table class="table table-hover" >
				<tr>
					<th class="col-md-3">Ticked</th>
					<th class="col-md-3">Tracker</th>
					<th class="col-md-3">Subject</th>
					<th class="col-md-3">Asigne</th>			
				</tr>				
				<tr ng-repeat="ticked in posts">
					<td>ahihi</td>
					<td><% ticked.trackerName %></td>
					<td><% ticked.subject %></td>
					<td><% ticked.assigneMemberNo %></td>
				</tr>

			</table>			
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-2">			
		</div>
		<div class="col-md-10">
			 <posts-pagination></posts-pagination>			
		</div>
	</div>
</div>
@stop