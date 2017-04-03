<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	<!-- <script type="text/javascript" src="{{asset('js/core.js')}}"></script> -->
	<!-- <script type="text/javascript" src="{{asset('js/jquery.slim.min.js')}}"></script> -->
	<script type="text/javascript" src="{{asset('js/test.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap-datepicker.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/testcss.css')}}">
	<style >
		.bg-color{
			background-color:#234567;
		}
	</style>
	<script type="text/javascript">
		$( document ).ready(function() {
			$('.datepicker').datepicker({
			    format: 'dd/mm/yyyy',
			    startDate: '-3d'
			});
		});
		console.log("load lai home.blade")
	</script>
	@yield('script')
</head>
<body>

	<div class="">
		<div class="container-fluid text-white" style=" background-color: #000; font-weight: bold;">
			<div class="row">
				<div class="col-md-8">
					Home | My page | Project | Help
				</div>
				<div class="col-md-4">
					

					@if(auth()->guard('member')->check())					    
					    Logged in as  {{Auth::guard('member')->user()->memberNo}} | My Account |					    
					    {{link_to_route('logout','Sing out')}}					 
					@else
					    Please login, <a href="/logout"> Login </a>					    
					@endif
					
				</div>
			</div>
		</div>
		<div class="container-fluid bg-color text-white" style="height: 60px;" >
			<div class="row">
				<div class="col-md-8">
					<h4>Project Name</h4>
				</div>
				<div class="col-md-4 form-inline" >
					<div class="form-group">
						
						<!-- <label for="search" class=" control-label">Search: </label> -->
						{{Form::label('search','Search: ',['class'=>'control-label'])}}
						<!-- <div class="col-md-3" > -->
							<!-- <span class="">Search:</span> -->
						{{Form::text('search',null,array('class'=>'form-control'))}}
						<!-- </div> -->
					</div>
				</div>
			</div>		
		</div>
		<div class="container-fluid bg-color " >					
			<div class="row">
				<div class="col-md-12">
					<!-- <nav class="navbar  "> 
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-7"> 
							<ul class="nav navbar-nav"> 
								<li class="active">
									<a href="#">{{link_to_route('Overview','Overview')}}</a>
								</li> 
								<li><a href="#">{{link_to_route('Issues','Issues')}}</a></li> 
								<li><a href="#">{{link_to_route('NewIssues','New Issues')}}</a></li>
							</ul>
						</div>
					</nav> -->

					<nav class="navbar navbar-default">
					    <div class="container-fluid">					       					 
					        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					            <ul class="nav navbar-nav">
					                <li class="{{ Request::is('/') ? 'active' : Request::is('Overview') ? 'active' : '' }}">{{link_to_route('Overview','Overview')}}</li>
					                <li class="{{ Request::is('Issues*') ? 'active' : '' }}">{{link_to_route('Issues','Issues')}}</li>
					                <li class="{{ Request::is('NewIssues') ? 'active' : '' }}">{{link_to_route('NewIssues','New Issues')}}</li>
					            </ul>
					        </div>
					    </div>
					</nav>

					<!-- <nav class="navbar navbar-default">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="index.html">Laravel 5</a>
							</div>
							<div class="collapse navbar-collapse">
								<ul class="nav navbar-nav">
									<li>{{link_to_route('Overview','Overview')}}</li>
					                <li>{{link_to_route('Issues','Issues')}}</li>
					                <li>{{link_to_route('NewIssues','New Issues')}}</li>		
								</ul>
							</div>
						</div>
					</nav> -->

				</div>
			</div>		
		</div>
		<div class="container-fluid " >		
			<div class="row">
				
					@yield('content')
				
			</div>			
		</div>
	</div>
</body>
</html>