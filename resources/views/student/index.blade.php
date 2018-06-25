<script src="{{ asset('js/jquery.js') }}"></script>
@extends("layouts.admin_master")

@section('header', "All Student")

@section("content")
  
<select name="grade" id="grade" class="form-control">
    <option value="">Choose Grade</option>
    @foreach($grades as $key => $value)
      <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>
<hr>
<table class="table table-bordered" id="students-table">
  <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Father Name</th>
        <th>Phone No</th>
        <th>Address</th>
        <th>Grade</th>
        <th>Section</th>
        <th></th>
        <th></th>
    </tr>
  </thead>
</table>  
      
@stop
@push('scripts')
<script>
var result;
$(function() {
    result = $('#students-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('students.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'father_name', name: 'father_name'},
            { data: 'phone_no', name: 'phone_no' },
            { data: 'address', name: 'address' },
            { data: 'grade', name: 'grade' },
            { data: 'section', name: 'section' },
            { data: 'edit', name: 'edit' },
            { data: 'delete', name: 'delete' }
        ]
    });
});

$("#grade").on("change", function() {
  result.search(this.value).draw();
});
</script>

<!-- <script>
  
  $(document).ready(function() {
    $("#grade").on('change', function() {
      var my = $(this).val();
      if(my) {
        $.ajax({
          url: '/serviceprofit-for/' + my,
          type: "GET",
          dataType: "json",
          success: function(result) {
            
          },       
        });
      }
    });
  });

</script> -->

@endpush