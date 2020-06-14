<?php 
    require ('functions.php');
    // menangkap title dari url
    $id = $_GET['id'];
    // jalankan query untuk mengambil 1 baris data
    $detail = tampil("SELECT * FROM LIST WHERE ID = $id");
    foreach($detail as $row) {}

    if ( isset($_POST['hapus']) ){
        delete($id);
        echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'index.php';
            </script>
        ";
    }

    if ( isset($_POST['edit']) ){
        update($_POST);
        echo "
            <script>
                alert('Data berhasil diupdate');
            </script>
        ";
        $detail = tampil("SELECT * FROM LIST WHERE ID = $id");
        foreach($detail as $row) {}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Page</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #242333;
            color: #fff;
            height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }
        .container {
            margin: auto;
            text-align: center;
            left: 0%;
            bottom: 0%;
            top: 0%;
            right: 0%;
            padding-top: 10%;
            box-sizing: border-box;
        }
        .container2{
            text-align: left;
            display: inline-block;
            padding: 45px;
            box-sizing: border-box;
            font-size: 22px;
        }

        button { font-size: 18px; }

        .update{
            position: absolute;
            left: 0%;
            bottom: 0%;
            top: 0%;
            right: 0%;
            padding-top: 10%;
            box-sizing: border-box;
            background: linear-gradient(rgba(0,0,0,.9) , rgba(0,0,0,.9));
            opacity: 0;
            transform: scale(0,0);
            transition: 0.3s;
        }

        .container3{
            display: inline-block;
            padding: 45px;
            box-sizing: border-box;
        }
        
        #satu{
            display: inline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container2">
            <table border="1" cellpadding="8" style="margin-bottom: 20px;">
                <tr><td colspan="2" style="font-size: 28px; font-weight: bold;">Detail</td></tr>
                <tr>
                    <td>Title</td>
                    <td>:</td>
                    <td><?= $row['JUDUL']; ?></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>:</td>
                    <td><?= $row['TANGGAL']; ?></td>
                </tr>        <tr>
                    <td>Time</td>
                    <td>:</td>
                    <td><?= $row['WAKTU']; ?></td>
                </tr>        <tr>
                    <td>Desc</td>
                    <td>:</td>
                    <td><?= $row['DESKRIPSI']; ?></td>
                </tr>
            </table>

            <button class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" id="edit">Edit</button>

            <form action="" method="POST" id="satu">
                <button class="bg-red-400 hover:bg-red-300 text-white font-bold py-2 px-4 border-b-4 border-red-600 hover:border-red-500 rounded" type="submit" name="hapus" onclick="return confirm('Yakin ingin menghapus ? ')">Hapus</button>
                <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                <a href="index.php" style="text-decoration: none;">Kembali Home</a></button>
            </form>
        </div>
        
        <div class="update">
            <div class="container3">
                <form class="w-full max-w-lg" action="" method="POST">
                    <div class="flex flex-wrap -mx-2 mb-3">
                        <div class="w-full px-3">
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="hidden" required name="id" autocomplete="off" value="<?= $row['ID']; ?>">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-2 mb-3">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-white-700 text-m font-bold mb-2">
                            Title </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" required name="title" autocomplete="off" value="<?= $row['JUDUL']; ?>">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-2 mb-3">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-white-700 text- font-bold mb-2">Date </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-1 mb-1 leading-tight focus:outline-none focus:bg-white date" type="date" name="date" autocomplete="off" value="<?= $row['TANGGAL']; ?>">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-white-700 text-m font-bold mb-2"> Time </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="time" name="time" autocomplete="off" value="<?= $row['WAKTU']; ?>">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-2 mb-3">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-white-700 text-m font-bold mb-2"> Description </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="desc" autocomplete="off" value="<?= $row['DESKRIPSI']; ?>">
                        </div>
                    </div>
                    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit" name="edit" onclick="return confirm('Ingin mengubah ? ')"> Edit </button>
                    <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="reset" id="cancel"> Cancel </button>
                </form>
            </div> 
        </div>  <!-- Akhir update -->
    </div> <!-- Akhir container -->
    
    <script>
        const edit = document.querySelector('#edit');
        const blokEdit = document.querySelector('.update');
        const cancel2 = document.querySelector('#cancel');

        edit.addEventListener('click' , function () {
            blokEdit.style.opacity = '1';
            blokEdit.style.transform = 'scale(1,1)';
            blokEdit.style.transition = '0.3s';
        });     
                
        cancel2.addEventListener('click' , function () {
            blokEdit.style.opacity = '0';
            blokEdit.style.transform = 'scale(0,0)';
            blokEdit.style.transition = '0.3s';
        });
    </script>
</body>
</html>