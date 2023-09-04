 <?php


    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db = "presensi";


    $conn = mysqli_connect($hostname, $username, $password, $db);

    require './controllers/function_pegawai.php';



    if (isset($_POST['submit'])) {


        if (tambah($_POST) > 0) {
            echo "
            <script>
                alert('Data berhasil di tambahkan');
            </script>
        ";
        } else {
            echo "
            <script>
                alert('Data gagal di tambahkan');
            </script>
        ";
        }
    }












    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home</title>
     <link href="/dist/output.css" rel="stylesheet">
     <script src="https://cdn.tailwindcss.com"></script>


 </head>

 <body>

     <nav class="bg-white border-gray-200 dark:bg-gray-900">
         <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
             <a href="https://flowbite.com/" class="flex items-center">
                 <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" /> -->
                 <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PMDK</span>
             </a>
             <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                 <span class="sr-only">Open main menu</span>
                 <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                 </svg>
             </button>
             <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                 <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                     <li>
                         <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                     </li>
                     <li>
                         <a href="./absensi.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">Absensi</a>
                     </li>
                     <li>
                         <a href="./scann.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">Absensi</a>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>


     <div class="flex items-center justify-center ">
         <form class="flex flex-col bg-slate-900 rounded shadow-lg p-12 mt-32" method="post" action="" enctype="multipart/form-data">

             <label class="font-semibold text-lg text-white mt-3" for="NIKField">NIK</label>
             <input class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text" name="nik">

             <label class="font-semibold text-lg text-white" for="namapegawaiField">NAMA PEGAWAI</label>
             <input class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text" name="nama_pegawai">


             <input class=" mt-5 text-white" aria-describedby="file_input_help" name="gambar" id="file_input" type="file">

             <button class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700" name="submit">Simpan</button>

         </form>
     </div>

 </body>

 </html>