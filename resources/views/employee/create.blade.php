<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2 class="text-center">Add Employee</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Employee Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Employee Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Employee Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Employee Email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Employee Profile Pic:</strong>
                        <input type="file"  name="profile_pic" class="form-control" placeholder="Employee profile pic">
                        @error('profile_pic')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group" id="multipleRow">
                        <strong>Employee Contact No:</strong>
                        <div class="row mb-2">
                            <div class="col-xs-11 col-sm-11 col-md-11">
                                <input type="number" name="contactno[]" class="form-control" placeholder="Employee Contact No">
                            </div>
                            <div class="col-xs-1 col-sm-1 col-md-1">
                                <button class="btn btn-success add" type="button">Add</button>
                            </div>
                        </div>
                        @error('contactno')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".add").click(function(){
            $('#multipleRow').append( '<div class="row mb-2"><div class="col-xs-11 col-sm-11 col-md-11"><input type="number" name="contactno[]" class="form-control" placeholder="Employee Contact No"></div><div class="col-xs-1 col-sm-1 col-md-1"><button class="btn btn-danger remove" type="button" id="removerow">Remove</button></div></div>' );
        });
        $('body').on('click', '#removerow', function() {
            $(this).parent().parent().remove();
        });
    });
</script>
</html>