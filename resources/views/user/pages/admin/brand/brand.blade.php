<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Brand</title>
    <!-- Sertakan file CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    @include('includes.admin.style')

</head>
<body>

    @include('includes.admin.navbar')

    @include('includes.admin.sidebar')


    <br>
    <br>
    
    <div class="container-brand mx-15">
        <h2 class="mb-4">CRUD Brand</h2>

        <!-- Form untuk Menambah Data -->

        <form id="addForm" method="POST" action="/brand/simpan_brand">
        <!-- {{csrf_field()}} -->
        @csrf
        @method('POST')
            <div class="form-group">
                <label for="mobilName">Nama</label>:</label>
                <input type="text" class="form-control" id="brandName" name="nama" required>

            </div>
            <button type="submit"  class="btn btn-primary" >Tambah Brand</button>
        </form>
<!-- Button trigger modal -->



        {{$i=1;}}
        <!-- Tabel untuk Menampilkan Data -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>                    
                    <th>Aksi</th>
                </tr>
            </thead>    

            <tbody>

            </tbody>
            @foreach ($brand as $brands)
            <tr>
            <td>{{$i++}}</td>
            <td>{{$brands->nama}}</td>
            <td>

            <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$brands->id}}">
                Edit
                </button>
                            <form action="{{ route('hapus_brand', $brands->id) }}" method="POST" style="display: inline-block;">
                            @csrf  
                            @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>

          <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$brands->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Brand</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addForm" action="{{ route('update_brand', $brands->id) }}" method="POST">
            @csrf  
            @method('PUT')
            <div class="form-group">
                    <label for="mobilName">Nama</label>:</label>
                    <input type="text" class="form-control" id="brandName" name="nama" value="{{$brands->nama}}" required>
    
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button></button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>


    @endforeach 
    </td>
    </tr>
    </table>

    
    

    <!-- Sertakan file JavaScript Bootstrap dan file jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @include('includes.admin.script')

    <script>
        // Logika JavaScript untuk menangani CRUD akan ditambahkan di sini
    </script>
</body>
</html>
