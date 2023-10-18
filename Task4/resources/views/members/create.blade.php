@extends('layouts.app')
@section('content-area')

<body>
  <div class="w-10/12 mx-auto my-6 relative">
    <div class="panel">
      <div class="panel-header style-header p-6 flex flex-col justify-center items-center">
        <div class="panel-head text-2xl">Add New Member</div>
      </div>

      <form method="POST" action="{{ route('members.store') }}">
        @csrf
        <div class="panel-body p-6">
          <div class="row g-2">
            <div class="col-12 col-md-6">
              <label class="form-label">Name *</label>
              {!! Form::text('first_name', old('name'), array('class'=>'form-control')) !!}
              <span class="text-danger" style="color:#e03b3b">{{ $errors->first('first_name') }}</span>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label">Email *</label>
              {!! Form::text('email_address', old('email_address'), array('class'=>'form-control')) !!}

              <span class="text-danger" style="color:#e03b3b">{{ $errors->first('email_address') }}</span>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label">School *</label>
              <select class="select2-multiple form-control" name="school[]" id="select2Multiple" multiple="multiple place-holder=" Select School">
                <option value="">Select a School</option>
                @foreach( $schools as $school)
                <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
              </select>
              <span class="text-danger" style="color:#e03b3b">{{ $errors->first('school') }}</span>
            </div>

            <button class="btn primary_btn f_semi w-100" type="submit">Add Member</button>

          </div>
        </div>
      </form>
      <div class="panel-body p-6 bg-light-blue">
        <div class="grid grid-cols-3 gap-6">
        </div>
      </div>
    </div>
  </div>


</body>

</html>

<!-- Common script -->
<script src="{{  asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{  asset('js/bootstrap.min.js')}}"></script>
<script src="{{  asset('js/select2.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
    // Select2 Multiple
    $('.select2-multiple').select2({
      placeholder: "Select",
      allowClear: true
    });

  });
</script>
<script type="text/javascript">
  $(function() {

    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('members.index') }}",
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'email',
          name: 'email'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });

  });
</script>