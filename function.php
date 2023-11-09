<?php
$servername = "localhost";
$username = "root";
$password ="";
$database = "character";
$conn = new mysqli($servername, $username, $password, $database);
function ubah($data){
    global $conn;
    $id = $data ["id"];
    $gambar =$data["gambar"];
    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];
    $unit = $data["unit"];
    $VA = $data["VA"];

    $query = "UPDATE characterdatabase SET
        gambar = '$gambar',
        namaKarakter = '$nama',
        deskripsi = '$deskripsi',
        unit = '$unit',
        VA = '$VA'
        WHERE id = $id
        ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
}
function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;

    }
    return $rows;
}

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';}
?>