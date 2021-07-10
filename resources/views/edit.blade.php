@extends('layouts.master')

<body>
    <div class="container">
        <h1>Edit data</h1>
        <div>
            <form action="/home/{{ $student->id }}/update" method="POST">
                {{ csrf_field() }}        
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
        </div>
    </div>
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