@extends('layouts.app')
@section('content-area')

  <div class="w-10/12 mx-auto my-6 relative">
    <div class="panel">
      <div class="panel-header style-header">
        <div class="ml-auto flex flex-row gap-3">
          <h3>Members List</h3>
        </div>
        <div class="ml-auto flex flex-row gap-3">
          <a href="{{ route('members.create') }}" class="btn primary_btn f_semi w-100">Add Members</a>

        </div>
      </div>
      <div class="panel-body pt-6 px-6 pb-0">
        
      <form method="GET" action="{{ route('members.export') }}">

      <div class="flex flex-row justify-between items-center">
                <div>
                     
                </div>
                <div class="flex flex-row gap-3">
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal1" title="School v/s Members"><i class="fa fa-bar-chart" style="font-size:45px" aria-hidden="true"></i></a>
                <button type="submit"><i class="fa fa-file-excel-o" style="font-size:45px" aria-hidden="true"></i></button>          
                </div>
      </div>

    
        <div class="row g-2">
        <div class="col-6 col-md-3"> 
          <select class="country form-control" name="country" id="selectcountry" place-holder="Select Country">
            <option value="0">Select a Country</option>
            @foreach( App\Models\Country::all() as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
          </select>
        </div>
        
        <div class="col-6 col-md-3 mb-4">
          <select class="select2-multiple form-control" name="school" id="select2Multiple" place-holder="Select School">
            <option value="0">Select a School</option>
            @foreach( App\Models\school::all() as $school)
            <option value="{{ $school->id }}">{{ $school->name }}</option>
            @endforeach
          </select>
        </div>
        </div> 
        </form>
      </div>

      <div class="panel-body p-6">

        <table id="membersTable" class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>First Name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>

      </div>

      <div class="panel-body p-6 bg-light-blue">

        <div class="grid grid-cols-3 gap-6">
        </div>

      </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade enquiryPopup" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">  
          <div class="col-md-6">
            <h5 class="modal-title" id="exampleModalLabel1">Schools v/s Members</h5>
            <form class="row g-2">
            <canvas id="schoolMembersChart" width="400" height="200"></canvas>
            </form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>
<script src="{{  asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{  asset('js/bootstrap.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#membersTable').DataTable({
      serverSide: true,
      ajax: {
        url: "{{ route('members_list') }}",
        data: function(d) {
          d.school = $('#select2Multiple').val();
        }
      },
      columns: [{
          data: 'id'
        },
        {
          data: 'first_name'
        },
        {
          data: 'email_address'
        }
      ]
    });
  });

  $('#select2Multiple').on('change', function() {
    var selectedValue = $(this).val(); // Get the selected value
    var table = $('#membersTable').DataTable();

    table.ajax.reload({
      data: {
        school: selectedValue
      }
    });
  });

  $('#selectcountry').on('change', function() {
    var selectedValue = this.value; 
        $.ajax({
            url: '/get-schools/' + selectedValue, // Replace with your route
            type: 'GET',
            success: function (data) {
                var select2 = document.getElementById('select2Multiple');
                select2.innerHTML = '';

                data.forEach(function (option) {
                    var newOption = document.createElement('option');
                    newOption.value = option.id;
                    newOption.textContent = option.name;
                    select2.appendChild(newOption);
                });
                $('#select2Multiple').trigger('change');
            }
        });
  });
  
</script>

<script>
    var ctx = document.getElementById('schoolMembersChart').getContext('2d'); 
    var schools = @json($schools->pluck('name'));
    var memberCounts = @json($schools->pluck('cnt')); 
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: schools,
            datasets: [{
                label: 'Members Count',
                data: memberCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>