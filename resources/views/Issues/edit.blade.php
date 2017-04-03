@extends('home.home')

@section('content')

	<div class="col-md-12">
		<div>
			<h3>
				<b>New issue</b>
			</h3>
		</div>
		<div>

		@if ( $errors->any() )
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>	
		@endif
		</div>
		{{Form::open(['method' => 'POST', 'route' => 'CreateIssues'])}}
		<div class="bg-gray">
			<div class="row p-top10">
				<div class="col-md-2 text-right">Tracker *</div>
				<div class="col-md-10">
					{{Form::select('tracker',$trackers)}}					
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 text-right">Issue template</div>
				<div class="col-md-10">{{Form::select('issueTemp',['L'=>'Large'])}} </div>
			</div>
			<div class="row">
				<div class="col-md-2 text-right">Subject *</div>
				<div class="col-md-10">{{Form::text('subject')}} </div>
			</div>
			<div class="row">
				<div class="col-md-2 text-right">Description</div>
				<div class="col-md-10">{{Form::textarea('descript',null,['class'=>'width90'])}} </div>
			</div>
			<div class="row">
				<div class="col-md-2 text-right">Status *</div>
				<div class="col-md-3">{{Form::select('status',$status)}} </div>
				<div class="col-md-3 text-right">Parent task</div>
				<div class="col-md-4">{{Form::text('parent')}} </div>
			</div>
			<div class="row">
				<div class="col-md-2 text-right">Priority *</div>
				<div class="col-md-3">{{Form::select('priority',['1'=>'Low','2'=>'Normal','3'=>'Height'])}} </div>
				<div class="col-md-3 text-right">Start date*</div>
				<div class="col-md-4">
					<div class="input-group date" data-provide="datepicker">
						{{Form::text('startdate',null,['class'=>'form-control',])}} 
					    <div class="input-group-addon">
					        <span class="glyphicon glyphicon-th"></span>
					    </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 text-right">Assignee *</div>
				<div class="col-md-3">
					{{Form::select('assignesMember',$assignes)}}

				</div>
				<div class="col-md-3 text-right">Due date*</div>
				<div class="col-md-4">
					<div class="input-group date" data-provide="datepicker">
						{{Form::text('duedate',null,['class'=>'form-control',])}} 
					    <div class="input-group-addon">
					        <span class="glyphicon glyphicon-th"></span>
					    </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 text-right">File </div>
				<div class="col-md-10">{{Form::button('Choose File')}} </div>
			</div>
			
		</div>
		<div class="row p-top10">
			<div class="col-md-2">
				{{Form::submit('Create')}}
				<a href="#">Preview</a>
			</div>
		</div>
		{{Form::close()}}
	</div>
@endsection