<?php

include "koneksi.php"

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD - PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="container">

    <div class="mt-3">
      <h3 class="text-center">Tugas CRUD PHP dan MYSQL</h3>
      <h3 class="text-center">KipliDev</h3>
    </div>
    <div class="card mt-3">
      <div class="card-header bg-primary text-white">
        Data Penduduk
      </div>
      <div class="card-body">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
          Tambah Data
        </button>

        <table class="table table-bordered table-striped table-hover mt-3">
          <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>Status Perkawinan</th>
            <th>Pekerjaan</th>
            <th>Kewarganegaraan</th>
            <th>Berlaku Hingga</th>
            <th>Action</th>
          </tr>
          <?php

          $no = 1;
          $query = "SELECT * FROM tabel1";
          $tampil = mysqli_query($conn, $query);

          while ($data = mysqli_fetch_array($tampil)) :

          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['nama']; ?></td>
              <td><?= $data['tmpt_tgllahir']; ?></td>
              <td><?= $data['jenis_kelamin']; ?></td>
              <td><?= $data['alamat']; ?></td>
              <td><?= $data['agama']; ?></td>
              <td><?= $data['status_perkawinan']; ?></td>
              <td><?= $data['pekerjaan']; ?></td>
              <td><?= $data['kewarganegaraan']; ?></td>
              <td><?= $data['berlaku_hingga']; ?></td>
              <td>
                <a href="" class="btn btn-warning badge d-flex" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Edit</a>
                <a href="" class="btn btn-danger badge" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
              </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Penduduk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="aksi_crud.php" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="tmpt_tgllahir" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tmpt_tgllahir" name="tmpt_tgllahir" value="<?= $data['tmpt_tgllahir']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $data['jenis_kelamin']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" value="<?= $data['agama']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="status_perkawinan" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" value="<?= $data['status_perkawinan']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $data['pekerjaan']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="<?= $data['kewarganegaraan']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="berlaku_hingga" class="form-label">Berlaku Hingga</label>
                        <input type="text" class="form-control" id="berlaku_hingga" name="berlaku_hingga" value="<?= $data['berlaku_hingga']; ?>">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="aksi_crud.php" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="modal-body">
                      <h5 class="text-center">Apakah anda yakin akan menghapus data ini? <br>
                        <span class="text-danger"><?= $data['id']; ?> - <?= $data['nama']; ?></span>
                      </h5>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Penduduk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="aksi_crud.php" method="POST">
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="mb-3">
                    <label for="tmpt_tgllahir" class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="tmpt_tgllahir" name="tmpt_tgllahir">
                  </div>
                  <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <input type="text" class="form-control" id="agama" name="agama">
                  </div>
                  <div class="mb-3">
                    <label for="status_perkawinan" class="form-label">Status</label>
                    <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan">
                  </div>
                  <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                  </div>
                  <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan">
                  </div>
                  <div class="mb-3">
                    <label for="berlaku_hingga" class="form-label">Berlaku Hingga</label>
                    <input type="text" class="form-control" id="berlaku_hingga" name="berlaku_hingga">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>