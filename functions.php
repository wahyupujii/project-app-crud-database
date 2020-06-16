<?php 

    function koneksi(){
        return oci_connect('mhs' , 'mahasiswa' , 'localhost/xe');
    }
    
    function insert($data){
        $title = $data['title'];
        $tanggal = $data['date'];
        $waktu = $data['time'];
        $desc = $data['desc'];
        $conn = koneksi();
        $sql = oci_parse($conn , "INSERT INTO LIST VALUES (NULL , '$title' , '$tanggal' , '$waktu' , '$desc')");
        oci_execute($sql);
    }

    function tampil($query){
        $conn = koneksi();
        $sql = oci_parse($conn , $query);
        oci_execute($sql);
        
        $rows = [];
        $i = 0;
        while ( ($row = oci_fetch_assoc($sql)) != false ){
            $rows[$i] = $row;
            $i++;
        }
        oci_free_statement($sql);
        oci_close($conn);
        return $rows;
    }

    function delete($id){
        $conn = koneksi();
        $sql = oci_parse($conn , "DELETE FROM LIST WHERE ID = $id");
        $result = oci_execute($sql);
        return $result;
    }

    function update($data){
        $conn = koneksi();

        $id = $data['id'];
        $title = $data['title'];
        $date = $data['date'];
        $time = $data['time'];
        $desc = $data['desc'];
        $query = "UPDATE LIST SET 
                JUDUL = '$title' , 
                TANGGAL = '$date' , 
                WAKTU = '$time' , 
                DESKRIPSI = '$desc'
            WHERE ID = '$id'";
        $sql = oci_parse($conn , $query);
        $result = oci_execute($sql);
        return $result;
    }
?>