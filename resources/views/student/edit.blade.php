@extends('layouts.admin_master')

@section('header', "Edit Student Form")

@section('content')
	<div class="container">
		<div class="col-md-11">
			<form action="{{ route('students.update', $id) }}" method="post" enctype="multipart/form-data">
				
				{{ csrf_field() }}

				{{ method_field('PUT') }}
				@foreach($student as $stu)
				<div class="form-group">
			    	<input type="text" class="form-control" id="name" name="name" value="{{ $stu->name }}">
			  	</div>

			  	<div class="form-group">
			    	<input type="text" class="form-control" id="father_name" name="father_name" value="{{ $stu->father_name }}">
			  	</div>

			  	<div class="form-group">
			    	<input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ $stu->phone_no }}">
			  	</div>

			  	<div class="form-group">
			  		<textarea class="form-control" name="address" rows="8" cols="5" value="">{{ $stu->address }}</textarea>
			  	</div>
				
				<div class="form-group">
					<select name="grade" id="" class="form-control">
						<option value="">{{ $stu->grade }}</option>
						@foreach($grades as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<select name="section" id="" class="form-control">
						<option value="">{{ $stu->section }}</option>
						@foreach($sections as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>
			  
			  	<button type="submit" class="btn btn-success btn-sm">Update Student</button>
			 @endforeach 	
			</form>
		</div>
	</div>
@endsection