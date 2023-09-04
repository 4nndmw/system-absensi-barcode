 <?php
   $hostname = "localhost";
   $username = "root";
   $password = "root";
   $db = "presensi";


   $conn = mysqli_connect($hostname, $username, $password, $db);

   $mahasiswa = mysqli_query($conn, "SELECT * FROM pegawai");


   // function query($ambil)
   // {
   //    global $conn;
   //    $result = mysqli_query($conn, $ambil);
   //    $rows = [];
   //    while ($row = mysqli_fetch_assoc($result)) {
   //       $rows[] = $row;
   //    }
   //    return $rows;
   // }

   function getPegawai()
   {
      global $conn;
      $query = "SELECT * FROM pegawai";
      $result = mysqli_query($conn, $query);
      $pegawai = [];

      while ($data = mysqli_fetch_assoc($result)) {
         $pegawai[] = $data;
      }

      return $pegawai;
   }


   function tambah($data)
   {
      global $conn;
      $nik = htmlspecialchars($data["nik"]);
      $nama_pegawai = htmlspecialchars($data["nama_pegawai"]);

      // upload gambar
      $gambar = upload();
      if (!$gambar) {
         return false;
      }

      $query = "INSERT INTO pegawai 
                              (nik, nama_pegawai, gambar)            
                                      VALUES 
                            ('$nik', '$nama_pegawai', '$gambar')";

      mysqli_query($conn, $query);
      return mysqli_affected_rows($conn);
   }


   function upload()
   {
      $namaFile = $_FILES['gambar']['name'];
      $ukuranFile = $_FILES['gambar']['size'];
      $error = $_FILES['gambar']['error'];
      $tmpName = $_FILES['gambar']['tmp_name'];

      //cek apakah gambar tidak ada yg di upload
      if ($error === 4) {
         echo "<script>
                alert('pilih gambar terlebih dahulu');
                </script>";
         return false;
      }

      // cek upload hanya gambar
      $ekstesiGambarValid = ['jpg', 'jpeg', 'png'];
      $ekstesiGambar = explode('.', $namaFile);
      $ekstesiGambar = strtolower(end($ekstesiGambar));
      if (!in_array($ekstesiGambar, $ekstesiGambarValid)) {
         echo "<script>
            alert('yang anda upload bukan file');
            </script>";
         return false;
      }

      // cek ukuran terlalu besar
      if ($ukuranFile > 100000000) {
         echo "<script>
            alert('ukuran gambar terlalu besar');
            </script>";
      }

      // lolos pengecekan, gambar sia di upload
      // generate nama gambar baru
      $namaFileBaru = uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstesiGambar;
      move_uploaded_file($tmpName, './image/' . $namaFileBaru);

      return $namaFileBaru;




      function barcode_qrcode()
      {
         $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
         echo $generator->getBarcode(12345, $generator::TYPE_CODE_128);
      }
   }
   ?> 