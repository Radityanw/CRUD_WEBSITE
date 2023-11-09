<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
if ( isset( $_GET["id"] ) ) {
    $id =( $_GET["id"] );
 $servername = "localhost";
 $username = "root";
 $password ="";
 $database = "character";

 $conn = new mysqli($servername, $username, $password, $database);
$sql = "DELETE FROM characterdatabase WHERE id=$id";
$conn->query($sql);
}
echo '<script type="text/javascript">'; 
echo 'alert("Data berhasil dihapus!");';
echo 'window.location.href = "index.php";';
echo '</script>';
exit;
?>