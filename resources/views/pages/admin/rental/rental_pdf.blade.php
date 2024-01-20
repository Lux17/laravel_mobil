<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Rental</title>
    <!-- Sertakan file CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container-rental mx-15">
        <h2 class="mb-4">Data Transaksi Rental Sewa Mobil</h2>

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
            
            @endforeach
    </td>
    </tr>
  </table>
  </div>
  </div>

    



    <script>
        // Logika JavaScript untuk menangani CRUD akan ditambahkan di sini
    </script>
</body>
</html>
