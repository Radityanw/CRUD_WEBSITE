<?php 
$conn = mysqli_connect("localhost", "root", "", "character");
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

    $id = $_GET["id"];
    $sql = "SELECT * FROM characterdatabase WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $gambar = $row['gambar'];
    $nama = $row['namaKarakter'];
    $deskripsi = $row['deskripsi'];
    $unit = $row['unit'];
    $VA = $row['pengisiSuara'];

if(isset($_POST["submit"])) {
    if($_FILES["gambar"]["error"]){
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $deskripsi_new = str_replace("'", "''", "$deskripsi"); //biar deskripsi bisa pake kutip '
    $unit = $_POST["unit"];
    $VA = $_POST["VA"];
    $query = "UPDATE characterdatabase SET namaKarakter = '$nama', deskripsi = '$deskripsi', unit = '$unit', pengisiSuara = '$VA' WHERE id = $id";
    
    } else{
        $gambar = addslashes(file_get_contents($_FILES["gambar"]["tmp_name"]));
        $gambar_tmp = $_FILES["gambar"]["tmp_name"];
        $nama = $_POST["nama"];
        $deskripsi = $_POST["deskripsi"];
        $deskripsi_new = str_replace("'", "''", "$deskripsi"); //biar deskripsi bisa pake kutip '
        $unit = $_POST["unit"];
        $VA = $_POST["VA"];
        $query = "UPDATE characterdatabase SET gambar = '$gambar', namaKarakter = '$nama', deskripsi = '$deskripsi', unit = '$unit', pengisiSuara = '$VA' WHERE id = $id";
    }
    
    if (mysqli_query($conn, $query)) {
        echo '<script type="text/javascript">'; 
    echo 'alert("Data berhasil dihapus!");';
    echo 'window.location.href = "index.php";';
    echo '</script>';

    } else {
        phpAlert(   "Data tidak berhasil ditambahkan!". mysqli_error($conn)   );
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="margin: 80px">
    <h1>Edit karakter</h1>
    <br>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row["id"];?>">
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="gambar" value="">
            <img style="width : 100px" src="data:image/jpeg;base64,<?php echo base64_encode($gambar);?>">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Karakter</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Hatsune Miku" value="<?php echo $nama;?>">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="A VIRTUAL SINGER with characteristic turquoise hair in long pig tails" value="<?php echo $deskripsi;?>"></input>
        </div>
        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <input type="text" name="unit" class="form-control" id="unit" placeholder="Virtual Singer" value="<?php echo $unit;?>">
        </div>
        <div class="mb-3">
            <label for="VA" class="form-label">Pengisi Suara</label>
            <input type="text" name="VA" class="form-control" id="VA" placeholder="Saki Fujita" value="<?php echo $VA;?>">
        </div>
        <div class="row mb-3">
            <div class="col-sm-3 d-grid">
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a type="button" class="btn btn-danger" href="index.php" role="button">Cancel</a>
            </div>
            <div class="col-sm-3 d-grid">
                <a type="button" class="btn btn-warning" href="index.php" role="button">Kembali</a>
            </div>
        </div>
    </form>
</body>
</html>