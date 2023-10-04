<div class="container mt-3">

  <div class='row'>
    <div class="col-lg-6"></div>
    <?php flasher::flash(); ?>
  </div>

  <h3 class="mt-3">Daftar Mahasiswa</h3>
  <div class="row">
    <div class="col-6">
      <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data Mahasiswa
      </button>
      <br><br>
      <ul class="list-group">
        <?php foreach ($data['mhs'] as $mhs) : ?>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <?= $mhs['nama']; ?>
            <div class="d-flex justify-content-end gap-2">
              <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge text-bg-primary float-right ml-1">detail</a>
              <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success badge text-bg-success float-right tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?=$mhs['id']; ?>">  ubah</a>
              <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger badge text-bg-danger float-right ml-1" onclick="return confirm('yakin?')">hapus</a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
         <input type='hidden' nama="id" id="id">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama"
             autocomplete="off" required>

          </div>

          <div class="form-group">
            <label for="nrp">NRP</label>
            <input type="number" class="form-control" id="nrp" name="nrp">
          </div>

          <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email">
      </div>

      <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <select class="form-control" id="jurusan" name="jurusan">
          <option value="Rekayasa perangkat lunak">Rekayasa perangkat lunak</option>
          <option value="Multimedia">Multimedia</option>
          <option value="Akuntansi">Akuntansi</option>
          <option value="Bisnis Retail">Bisnis Retail</option>
        </select>
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Tambah Data Siswa</button>
      </form>
    </div>
  </div>
</div>
</div>