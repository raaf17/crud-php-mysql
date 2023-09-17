<?php

include "koneksi.php";

if (isset($_POST['simpan'])) {
  $query = "INSERT INTO tabel1 (nama, tmpt_tgllahir, jenis_kelamin, alamat, agama, status_perkawinan, pekerjaan, kewarganegaraan, berlaku_hingga) 
  VALUES ('$_POST[nama]',
          '$_POST[tmpt_tgllahir]',
          '$_POST[jenis_kelamin]',
          '$_POST[alamat]',
          '$_POST[agama]',
          '$_POST[status_perkawinan]',
          '$_POST[pekerjaan]',
          '$_POST[kewarganegaraan]',
          '$_POST[berlaku_hingga]'
  )";
  $simpan = mysqli_query($conn, $query);

  if ($simpan) {
    echo "<script>
            alert('Simpan data sukses');
            document.location='index.php';
          </script>";
  } else {
    echo "<script>
            alert('Simpan data gagal');
            document.location='index.php';
          </script>";
  }
}

if (isset($_POST['ubah'])) {
  $query = "UPDATE tabel1 SET
                            nama = '$_POST[nama]',
                            tmpt_tgllahir = '$_POST[tmpt_tgllahir]',
                            jenis_kelamin = '$_POST[jenis_kelamin]',
                            alamat = '$_POST[alamat]',
                            agama = '$_POST[agama]',
                            status_perkawinan = '$_POST[status_perkawinan]',
                            pekerjaan = '$_POST[pekerjaan]',
                            kewarganegaraan = '$_POST[kewarganegaraan]',
                            berlaku_hingga = '$_POST[berlaku_hingga]'
                            WHERE id = '$_POST[id]'
                            ";
  $ubah = mysqli_query($conn, $query);

  if ($ubah) {
    echo "<script>
            alert('Ubah data sukses');
            document.location='index.php';
          </script>";
  } else {
    echo "<script>
            alert('Ubah data gagal');
            document.location='index.php';
          </script>";
  }
}

if (isset($_POST['hapus'])) {
  $query = "DELETE FROM tabel1 WHERE id = '$_POST[id]'";
  $hapus = mysqli_query($conn, $query);

  if ($hapus) {
    echo "<script>
            alert('Hapus data sukses');
            document.location='index.php';
          </script>";
  } else {
    echo "<script>
            alert('Hapus data gagal');
            document.location='index.php';
          </script>";
  }
}
