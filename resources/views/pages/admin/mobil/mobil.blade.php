<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mobil</title>
    <!-- Sertakan file CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    @include('includes.admin.style')

</head>
<body>

    @include('includes.admin.navbar')

    @include('includes.admin.sidebar')


    <br>
    <br>
    
    <div class="container-mobil mx-15">
        <h2 class="mb-4">CRUD Mobil</h2>

        <!-- Form untuk Menambah Data -->

        <form id="addForm" method="POST" action="/mobil/simpan_mobil">
        <!-- {{csrf_field()}} -->
        @csrf
        @method('POST')
            <div class="form-group"></div>
            <div class="mb-3">
              <label for="Brand" class="form-label d"> Brand  :</label>
              <select id="Brand" class="form-control" name="brand_id" required="">
              <option selected value="">Pilih...</option>
              @foreach($brand as $brands)
              <option value="{{$brands->nama}}">{{$brands->nama}}</option>
              @endforeach
            </select>
            </div>

                <label for="mobilName">Nama</label>:</label>
                <input type="text" class="form-control" id="mobilName" name="nama" required>

                <label for="mobilName">Deskripsi</label>:</label>
                <input type="text" class="form-control" id="mobilName" name="deskripsi" required>

                <label for="mobilName">Harga</label>:</label>
                <input type="text" class="form-control" id="mobilName" name="harga" required>

                <div class="mb-3">
                  <label for="status" class="form-label d"> Status  :</label>
                  <select id="status" class="form-control" name="status" required="">
                  <option selected value="">Pilih...</option>
                  <option value="1">Aktif</option>
                  <option value="0">Non Aktif</option>
                
                </select>
                </div>

                <button type="submit"  class="btn btn-primary" >Tambah Mobil</button>
              </div>
           
        </form>
<!-- Button trigger modal -->


        <div class="container-mobil">
        <!-- Tabel untuk Menampilkan Data -->
        <table class="table mt-4">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Brand</th> 
                  <th>Nama Mobil</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Status</th>                   
                  <th>Aksi</th>
              </tr>
          </thead>    

          <tbody>

          </tbody>
          @foreach ($mobil as $mobils)
          <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$mobils->brand_id}}</td>
          <td>{{$mobils->nama}}</td>
          <td>{{$mobils->deskripsi}}</td>
          <td>{{$mobils->harga}}</td>
          <td>{{$mobils->status}}</td>
          <td>

          <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$mobils->id}}">
              Edit
              </button>
                          <form action="{{ route('hapus_mobil', $mobils->id) }}" method="POST" style="display: inline-block;">
                          @csrf  
                          @method('delete')
                              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                          </form>

        <!-- Modal -->
<div class="modal fade" id="exampleModal{{$mobils->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Mobil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form id="addForm" action="{{ route('update_mobil', $mobils->id) }}" method="POST">
          @csrf  
          @method('PUT')
          <div class="form-group">
            <div>                
              <label for="rentalName">Brand</label>:</label>
              
              <select id="Brand" class="form-control" name="brand_id" required="">
                <option selected value="">Pilih...</option>
                @foreach($brand as $brands)
                <option value="{{$brands->nama}}">{{$brands->nama}}</option>
                @endforeach
              </select>
            </div>

              <label for="mobilName">Nama</label>:</label>
              <input type="text" class="form-control" id="mobilName" value="{{$mobils->nama}}" name="nama" required>

              <label for="mobilName">Deskripsi</label>:</label>
              <input type="text" class="form-control" id="mobilName" value="{{$mobils->deskripsi}}" name="deskripsi" required>

              <label for="mobilName">Harga</label>:</label>
              <input type="text" class="form-control" id="mobilName" value="{{$mobils->harga}}" name="harga" required>

              <div class="mb-3">
                <label for="Brand" class="form-label d"> Status  :</label>
                <select id="Brand" class="form-control" name="status" required="">
                <option selected value="{{$mobils->status}}">Pilih...</option>
                <option value="1">Aktif</option>
                <option value="0">Non Aktif</option>
              
              </select>
              </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button></button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
  @endforeach 
</td>
</tr>
</table>
</div>
</div> 
</div>
</div>

    

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
