<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Laravel 9 crud relations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <style>
    footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #f5f5f5;
      padding: 10px;
      text-align: center;
    }
    
  </style>

</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Relations</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success"href="{{route('users.create')}}">Create User</a>
                </div>
            </div>
        </div>
        @if($message=Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th> 
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Address</th>
                    <th>User's Company</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td> 
                    <td>{{$user->company->name}}</td>
                  
                    <td>
                        <form id="delete_edit"action="{{ route('users.destroy',$user->id)}}" method="Post">
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id)}}" >Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" id="delete" >Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>
    <footer>
    <p>&copy; 2023 Burak Tamince. All rights reserved.</p>
  </footer>
  @include('sweetalert::alert')

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
  <script>
document.getElementById('delete').addEventListener('click', function(event) {
  event.preventDefault(); // Formun otomatik olarak gönderilmesini engeller
  
  Swal.fire({
    title: 'Delete',
    text: 'Are you sure to delete company?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('delete_edit').submit(); // Formu gönder
    }
  });
});
  </script>

</html>