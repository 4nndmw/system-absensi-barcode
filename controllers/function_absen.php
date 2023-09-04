 <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db = "presensi";


    $conn = mysqli_connect($hostname, $username, $password, $db);



    function getPegawai()
    {
        global $conn;
        $query = "SELECT * FROM table_absensi";
        $result = mysqli_query($conn, $query);
        $pegawai = [];

        while ($data = mysqli_fetch_assoc($result)) {
            $pegawai[] = $data;
        }

        return $pegawai;
    }


    function create($data)
    {
        global $conn;
        $nik = htmlspecialchars($data["nik"]);
        $nama_pegawai = htmlspecialchars($data["nama_pegawai"]);


        $query = "INSERT INTO table_absensi  
                               (nik, nama_pegawai, )            
                                       VALUES 
                             ('$nik', '$nama_pegawai', )";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    ?> 