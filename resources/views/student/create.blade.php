@extends('layouts.admin_master')

@section('header', "Create Student Form")

@section('content')
	<div class="container">
		<div class="col-md-11">
			<form action="{{ route('students.store') }}" method="post">

				{{ csrf_field() }}
				<div class="form-group">
			    	<input type="text" class="form-control" id="name" name="name" 
					placeholder="Enter Student name" autofocus>
			  	</div>

			  	<div class="form-group">
			    	<input type="text" class="form-control" id="father_name" name="father_name" 
					placeholder="Enter Father name" autofocus>
			  	</div>

			  	<div class="form-group">
			    	<input type="text" class="form-control" id="phone_no" name="phone_no" 
					placeholder="Enter Phone no" autofocus>
			  	</div>

			  	<div class="form-group">
			  		<textarea class="form-control" name="address" placeholder="Enter Address" autofocus rows="5" cols="5"></textarea>
			  	</div>
				
				<div class="form-group">
					<select name="grade" id="" class="form-control">
						<option value="">Choose Grade</option>
						@foreach($grades as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<select name="section" id="" class="form-control">
						<option value="">Choose Section</option>
						@foreach($sections as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>
			  
			  	<button type="submit" class="btn btn-success btn-sm">Create Student</button>
			  	
			</form>
		</div>
	</div>
@endsection