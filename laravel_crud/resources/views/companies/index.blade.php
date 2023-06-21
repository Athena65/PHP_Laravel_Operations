<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Laravel 9 crud operations</title>
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
                    <h2>Laravel 9 CRUD Operations</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success"href="{{route('companies.create')}}">Create Company</a>
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
                    <th>Company Name</th>
                    <th>Company Email</th>
                    <th>Company Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{$company->id}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->address}}</td>
                    <td>
                        <form id="delete_edit"action="{{ route('companies.destroy',$company->id)}}" method="Post">
                            <a class="btn btn-primary" href="{{ route('companies.edit',$company->id)}}" >Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" id="delete" >Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $companies->links() !!}
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