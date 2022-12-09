<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" >

</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="text-center">Laravel Test</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('employee.create') }}"> Add Employee</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered" id="employeeTable">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Employee Profile Pic</th>
                    <th>Employee Contact No</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0
                @endphp
                @foreach ($employee as $row)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td><img src="{{ URL::to('/') }}/Employee_Profile_Pic/{{ $row->profile_pic }}" alt="employee profile pic" style="width:150px; height:150px;"></td>
                        <td>{{ $row->contactno }}</td>
                        <td>
                            <form action="{{ route('employee.destroy',$row->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('employee.edit',$row->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $employee->links() !!}
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#employeeTable').DataTable();
    });
</script>
</html>