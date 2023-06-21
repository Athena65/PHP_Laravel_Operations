<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Laravel 9 crud operations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>

</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add User</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success"href="{{route('users.index')}}">Home Page</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{session('status')}}
        </div>
        @endif
        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col md-12">
                    <div class="form-group">
                        <strong>User Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="User Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>User Surname:</strong>
                        <input type="text" name="surname" class="form-control" placeholder="User Surname">
                        @error('surname')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>User Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="User Email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>User Address:</strong>
                        <input type="text" name="address" class="form-control" placeholder="User Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>User Company:</strong>
                    <select class="form-control" aria-label="Default select example"  name="company_id" id="company_id" >
                    @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                    </select>
                    @error('company_id')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3" >Create User</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
</body>

</html>