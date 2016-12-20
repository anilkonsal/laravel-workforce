@extends('layouts.layout')
@section('content')


<form class="form" role="form" action="/calculate" method="POST">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="">Your Name</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="">Your DOB</label>
        <input type="text" name="dob" class="form-control datepicker" required />
    </div>
    <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary" />
    </div>
    

</form>
@endsection

@section('scripts')
<script>
  $( function() {
    $( ".datepicker" ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
  } );
  </script>
@endsection