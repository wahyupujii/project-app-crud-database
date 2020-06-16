<?php  require('functions.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2103191021 - Wahyu Puji R</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
      body{
          background-color: #242333;
          color: #fff;
          height: 100vh;
          font-family: 'Segoe UI', sans-serif;
          margin: 0;
      }

      .container{
          width: 800px;
          margin: auto;
          text-align: center;
          padding: 50px;
          box-sizing: border-box;
      }

      h1{
          font-size: 40px;
          font-weight: bold;
      }

      form{
          margin: auto;
          text-align: left;
      }

      table{
          width: 100%;
          margin: auto;
      }

      .tambah{
          position: absolute;
          left: 0%;
          bottom: 0%;
          top: 0%;
          right: 0%;
          padding-top: 10%;
          box-sizing: border-box;
          background: linear-gradient(rgba(0,0,0,.8) , rgba(0,0,0,.8));
          opacity: 0;
          transform: scale(0,0);
          transition: 0.3s;
      }

      .container2{
          display: inline-block;
          padding: 45px;
          box-sizing: border-box;
      }

      table tbody tr button{
          margin: 5px 10px;
      }
    </style>
</head>
<body>
  <div class="container">
    <h1> 🔥 Schedule List CRUD 🔥  </h1>
    <br>
    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" id="btn-tambah">
      Tambah
    </button>
    <br>

    <!-- Awal Untuk menambah data -->
    <div class="tambah">
      <div class="container2">
        <form class="w-full max-w-lg" action="" method="POST">
          <div class="flex flex-wrap -mx-2 mb-3">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-white-700 text-m font-bold mb-2" for="title">
                Title
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 title" type="text" required name="title" autocomplete="off">
            </div>
          </div>
          <div class="flex flex-wrap -mx-2 mb-3">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-white-700 text- font-bold mb-2" for="date">
                Date
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-1 mb-1 leading-tight focus:outline-none focus:bg-white date" type="date" name="date" autocomplete="off">
            </div>
            <div class="w-full md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-white-700 text-m font-bold mb-2" for="time">
                Time
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 time" type="time" name="time" autocomplete="off">
            </div>
          </div>
          <div class="flex flex-wrap -mx-2 mb-3">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-white-700 text-m font-bold mb-2" for="desc">
                Description
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 desc" type="text" name="desc" autocomplete="off">
            </div>
          </div>
          <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded submit" type="submit" name="tambah">
            Tambah
          </button>
          <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded cancel" type="reset">
            Cancel
          </button>
        </form>
      </div>
    </div>
    
    <?php 
      // menambah data
      if ( isset($_POST['tambah']) ){
        insert($_POST);
      }
    ?>
    <br>
    <!-- Akhir untuk menambah data -->
    
    <!-- Awal untuk menampilkan data -->
    <div class="tampil">
      <table class="table-fixed">
        <thead>
          <tr>
            <th class="w-1/5 px-4 py-2 text-white bg-teal-500">#</th>
            <th class="w-3/4 px-4 py-2 text-white bg-blue-500">Title</th>
            <th class="w-3/5 px-4 py-2 text-white bg-red-600">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            // mengambil data untuk ditampilkan
            $jadwal = tampil("SELECT * FROM LIST");
            $i = 1;
            foreach($jadwal as $list) :  ?>
          <tr>
            <td class="border px-4 py-2"><?= $i; ?></td>
            <td class="border px-4 py-2"><?= $list['JUDUL']; ?></td>
            <td class="border px-4 py-2">
              <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 px-2 border-b-2 border-blue-700 hover:border-blue-500 rounded"><a href="detail.php?id=<?= $list['ID']; ?>" style="text-decoration: none;" >Detail</a></button>
            </td>
          </tr>
          <?php
          $i++;
          endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- Akhir untuk menampilkan data -->
  </div>  <!--  container -->

  <script>
    const tambah = document.getElementById('btn-tambah');
    const cancel1 = document.querySelector('.cancel');
    const blokTambah = document.querySelector('.tambah');

    tambah.addEventListener('click' , function () {
        blokTambah.style.opacity = '1';
        blokTambah.style.transform = 'scale(1,1)';
        blokTambah.style.transition = '0.3s';
    });

    cancel1.addEventListener('click' , function () {
        blokTambah.style.opacity = '0';
        blokTambah.style.transform = 'scale(0,0)';
        blokTambah.style.transition = '0.3s';
    });
  </script>
</body>
</html>