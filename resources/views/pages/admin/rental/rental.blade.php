<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Rental</title>
    <!-- Sertakan file CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    @include('includes.admin.style')

</head>
<body>

    @include('includes.admin.navbar')

    @include('includes.admin.sidebar')


    <br>
    <br>

      
    <div class="container-rental mx-15">
        <h2 class="mb-4">CRUD Rental</h2>

        <!-- Form untuk Menambah Data -->

        <form id="addForm" method="POST" action="/rental/simpan_rental">
        <!-- {{csrf_field()}} -->
        @csrf
        @method('POST')
            <div class="form-group"> </div>
              <div>                
                <label for="rentalName">Mobil Id</label>:</label>
                <select id="Mobil" class="form-control" name="mobil_id" required="">
                  <option selected value="">Pilih...</option>
                  @foreach($mobil as $mobils)
                  <option value="{{$mobils->nama}}">{{$mobils->nama}}</option>
                  @endforeach
                </select>
              </div>
        
                <label for="rentalName">nama pelanggan</label>:</label>
                <input type="text" class="form-control" id="rentalName" name="nama_pelanggan" required>

                <label for="rentalName">Tanggal sewa</label>:</label>
                <input type="date" class="form-control" id="rentalName" name="tanggal_sewa" required>

                <label for="rentalName">Sampai Tanggal Sewa</label>:</label>
                <input type="date" class="form-control" id="rentalName" name="sampai_tanggal_sewa" required>

                <label for="rentalName">Biaya</label>:</label>
                <input type="text" class="form-control" id="rentalName" name="biaya" required>
            
            <button type="submit"  class="btn btn-primary mb-4" >Tambah Rental</button>
            <br>
            <a href="{{route('cetak_pdf')}}" class="btn btn-primary" ><i class="bi bi-download"></i></a>
        </form>




        <!-- Tabel untuk Menampilkan Data -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mobil</th> 
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Sewa</th>
                    <th>Sampai Tanggal Sewa</th>
                    <th>Biaya</th>                   
                    <th>Aksi</th>
                </tr>
            </thead>    

            <tbody>

            </tbody>
            @foreach ($rental as $rentals)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$rentals->mobil_id}}</td>
            <td>{{$rentals->nama_pelanggan}}</td>
            <td>{{$rentals->tanggal_sewa}}</td>
            <td>{{$rentals->sampai_tanggal_sewa}}</td>
            <td>{{$rentals->biaya}}</td>
            
            <td>

            <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$rentals->id}}">
                Edit
                </button>
                            <form action="{{ route('hapus_rental', $rentals->id) }}" method="POST" style="display: inline-block;">
                            @csrf  
                            @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                          
              <!-- Modal -->
      <div class="modal fade" id="exampleModal{{$rentals->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Rental</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="{{ route('update_rental', $rentals->id) }}" method="POST">
                @csrf  
                @method('PUT')
                <div class="form-group">
                  <div>                
                    <label for="rentalName">Mobil</label>:</label>
                    <select id="Mobil" class="form-control" name="mobil_id" required="">
                      
                      <option selected value="">Pilih...</option>
                      @foreach($mobil as $mobils)
                      <option value="{{$mobils->nama}}">{{$mobils->nama}}</option>
                      @endforeach
                    </select>
                  </div>

                    <label for="rentalName">nama pelanggan</label>:</label>
                    <input type="text" class="form-control" id="rentalName" value="{{$rentals->nama_pelanggan}}" name="nama_pelanggan" required>

                    <label for="rentalName">Tanggal sewa</label>:</label>
                    <input type="date" class="form-control" id="rentalName" value="{{$rentals->tanggal_sewa}}" name="tanggal_sewa" required>

                    <label for="rentalName">Sampai Tanggal Sewa</label>:</label>
                    <input type="date" class="form-control" id="rentalName" value="{{$rentals->sampai_tanggal_sewa}}" name="sampai_tanggal_sewa" required>

                    <label for="rentalName">Biaya</label>:</label>
                    <input type="text" class="form-control" id="rentalName" value="{{$rentals->biaya}}" name="biaya" required>
        
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
