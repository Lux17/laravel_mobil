<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent a Car</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 0.3em 0;
        }

        section {
            text-align: center;
            padding: 2em;
            margin-bottom: 60px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }

        footer {
            
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h1>Rent a Car</h1>
        <p>Explore the world with our rental services</p>
    </header>

    <section>
  
        <form action="{{route('directwa')}}" method="get">
            @foreach($mobil as $car)
            <input type="hidden" id="phone" name="phone" value="6283827371667" >
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="nama" required>

            <label for="carType">Select Car Type:</label>
            <select id="carType" name="mobil">
                <option value="{{$car->nama}}">{{$car->nama}}</option>
            </select>

            <label for="pickupDate">Pickup Date:</label>
            <input type="date" id="pickupDate" name="tanggal_sewa" required>

            <label for="returnDate">Return Date:</label>
            <input type="date" id="returnDate" name="sampai_tanggal_sewa" required>

            <label for="biaya">Harga sewa /12Jam</label>
            <select id="biaya" name="biaya" required>
                <option value="{{$car->harga}}">{{$car->harga}}</option>
            </select>
            <button type="submit" >Pesan</button>
            @endforeach
        </form>
    </section>
    <footer>
        <p>&copy; 2024 Rent a Car. All rights reserved.</p>
    </footer>
</body>

</html>
