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
<div class="container">
    <h1>Edit data</h1>
<div>
    <form action="/home/{{ $student->id }}/update" method="POST">
        {{ csrf_field() }}        
</div>
        <div class="form-group">
            <label for=""><strong>Nama</strong></label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" value="{{ $student->nama }}">
        </div>
        <div class="form-group">
            <label for="" class="form-label">NPM</label>
            <input type="number" name="npm" id="npm" class="form-control" placeholder="Input NPM" value="{{ $student->npm }}">
          </div>
        <div class="form-group">
            <label for=""><strong>Email</strong></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $student->email }}">
        </div>
        <div class="form-group">
            <label for=""><strong>Jurusan</strong></label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Jurusan" value="{{ $student->jurusan }}">
        </div>
            <button type="submit" class="btn btn-primary">Ubah data</button>
    </form>
<!-- /#wrapper -->

 <!-- jQuery -->
 <script src="js/jquery.js"></script>

 <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>

 <!-- Menu Toggle Script -->
 <script>
    $("#menu-toggle").click(function(e) {
     e.preventDefault();
     $("#wrapper").toggleClass("toggled");
 });
</script>
</div>
</body>