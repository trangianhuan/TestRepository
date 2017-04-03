@extends('home.home')

@section('content')
<div>
	<div class="col-md-8 fontBlack" style="">
		<div class="row " style="">	
			@if(Session::has('message_info'))
		        <div class="alert alert-info">
		            {{ Session::get('message_info') }}
		        </div>
		    @endif		
			<div class="pull-left padLef titleTicked">
				<h3><b>{{$ticked->trackerName}} #{{$ticked->tickedNo}}</b></h3>
			</div>
			<div class="pull-right form-horizontal">
				Edit | Coppy | Watch
			</div>	
			
		</div>
		
		<div class="" style="background-color: #FFF9C4; padding-bottom: 15px;">
			<div class="mg-left" >
				<div class="row">
					<div class="col-md-12">
						<h4 class="pull-left col-md-10">{{$ticked->subject}}</h4>
						<div class="pull-right ">
							<< Prev | Next >>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						Add by
						<a href="#">{{$ticked->author}}</a>
						about 1 month ago. update 4 day ago.
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">Status:</div>
					<div class="col-md-3">Close</div>
					<div class="col-md-3">Start date:</div>
					<div class="col-md-3">{{$ticked->startDate}}</div>
				</div>
				<div class="row">
					<div class="col-md-3">Priority:</div>
					<div class="col-md-3">{{$ticked->priority}}</div>
					<div class="col-md-3">Due date:</div>
					<div class="col-md-3">{{$ticked->dueDate}}</div>
				</div>
				<div class="row">
					<div class="col-md-3">Assignee</div>
					<div class="col-md-3">{{$ticked->assigneMemberNo}}</div>
					<div class="col-md-3"></div>
					<div class="col-md-3"></div>
				</div>
				<hr />

				<div >
					Description</br>
					{!! nl2br($ticked->descript)!!}

				</div>
			</div>
		</div>
		<div class="mg-top10" style="height: 200px; ">
			History
		</div>
	</div>
	<div class="col-md-4" style="background-color: #f9f9f9; height: 100vh;" >
		Isses content !
		<!-- background-color: #203563;  -->
	</div>
<div>
@endsection