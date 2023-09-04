<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Absensi Karyawan</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Scanner Absensi Karyawan</h2>
        <input type="text" id="barcode-input" class="p-2 border rounded w-full focus:outline-none focus:ring focus:border-blue-300" autofocus>
        <div id="result" class="mt-4"></div>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#barcode-input").on("keypress", function(e) {
                if (e.which === 13) { // Tekan Enter
                    var barcodeData = $(this).val();
                    $(this).val(""); // Reset input setelah pemindaian

                    // Kirim data ke server PHP untuk diproses
                    $.ajax({
                        type: "POST",
                        url: "./controllers/function_scann.php",
                        data: {
                            barcodeData: barcodeData
                        },
                        success: function(response) {
                            $("#result").html(response);
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>