<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
                     
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>

<?php
    include './proses/koneksi.php';

    if(isset($_POST['simpan'])){
        $judul_buku = $_POST['judul_buku'];
        $penulis = $_POST['penulis'];
        $jenis_buku = $_POST['jenis_buku'];
        $image = $_FILES['gambar_buku']['name'];
        $target = "images/".basename($image);
        

        $sql = "INSERT INTO nama_buku (judul_buku, penulis, jenis_buku, gambar_buku) VALUES('$judul_buku','$penulis','$jenis_buku','$image')";
        $result= mysqli_query($conn, $sql);
        if($result){

            $sql2= "INSERT INTO jenisbuku (jenis_buku) VALUES ('$jenis_buku')";
            $result2= mysqli_query($conn, $sql2);
            echo "<div class='alert alert-primary alert-success' role='alert'> <a href='tampil.php' >Kembali</a> <br> Tambah Data Sukses</div>";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $conn->close();

?>