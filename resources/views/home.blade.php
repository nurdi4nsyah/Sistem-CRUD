<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href={{asset ('style/css/bootstrap.min.css') }} rel="stylesheet">

    <!-- Custom CSS -->
    <link href={{asset ("style/css/simple-sidebar.css") }} rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="col-6">
    <h1>Data Mahasiswa</h1>
</div>
<div>
    <form action="/home/{id}/edit" method="POST">
        {{ csrf_field() }}
</div>

<div class="card-tools">
    <a href="{{ route('tamdat') }}" class="btn btn-success ">Create data<i class="fas fa-plus-square"></i></a>
</div>

<div class="card-tools">
    <a href="{{ url('logout') }}" class="btn btn-danger ">Log out</a>
</div>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">NPM</th>
            <th scope="col">Email</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
        <tbody>
        @foreach ($student as $std)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <th>{{ $std->nama }}</th>
                <th>{{ $std->npm }}</th>
                <th>{{ $std->email }}</th>
                <th>{{ $std->jurusan }}</th>
                <th>
                    <a href="home/{{ $std->id }}/edit" type="button" class="btn btn-warning">
                        <i class="fas fa-edit">Edit</i>
                    </a>
                    <a href="home/delete/{{ $std->id }}" type="button" class="btn btn-danger">
                        <i class="fas fa-trash">Delete</i>
                    </a>
                    
                </th>
            </tr>
        @endforeach
        </tbody>
    </form>
</table>
<!-- /#wrapper -->

 <!-- jQuery -->
 <script src="{{ asset('js/jquery.js') }}"></script>

 <!-- Bootstrap Core JavaScript -->
 <script src="{{ asset('js/bootstrap.min.js') }}"></script>

 <!-- Menu Toggle Script -->
 <script>
    $("#menu-toggle").click(function(e) {
     e.preventDefault();
     $("#wrapper").toggleClass("toggled");
 });
 </script>
</body>
                    


