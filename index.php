<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project sekai character</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="margin: 50px">
    <img src="Asset/logo.png" style="width: 200px;">  
    <h1 style="position:absolute; left:260px; top:55px;">Character List</h1>
    <br>
    <br>
    <br>
    <a type="button" class="btn btn-primary" href="tambah.php" role="button">Tambah karakter</a>
    <br>
    <table class="table" table-bordered>
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Unit</th>
                <th>Pengisi Suara</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $servername = "localhost";
            $username = "root";
            $password ="";
            $database = "character";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Koneksi gagal: ". $conn->connect_error);
            }
            $sql = "SELECT * FROM characterdatabase ";
            $result = $conn->query($sql);
            if (!$result) {
                die("kueri invalid: ". $conn->error);
            }
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td><img src='data:image/png;base64," . base64_encode($row["gambar"]) . "' width='150' height='206''</td>
                    <td>" . $row["namaKarakter"] . "</td>
                    <td>" . $row["deskripsi"] . "</td>
                    <td>" . $row["unit"] . "</td>
                    <td>" . $row["pengisiSuara"] . "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='update'>Update</a>
                        <a class='btn btn-danger btn-sm' href='/TUGAS3/hapus.php?id=$row[id]'>Hapus</a>

                    </td>
                </tr>";
            }

         
            ?>
        </tbody>
    </table>
</body>
</html>