<div class="container mt-3">

  <div class='row'>
    <div class="col-lg-6"></div>
    <?php flasher::flash(); ?>
  </div>

  <h3 class="mt-3">Daftar Kelas</h3>
  <div class="row">
    <div class="col-6">
      <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data Kelas
      </button>
      <br><br>
      <ul class="list-group">
        <?php foreach ($data['kelas'] as $kelas) : ?>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <?= $kelas['kelas']; ?>
            <div class="d-flex justify-content-end gap-2">
              <a href="<?= BASEURL; ?>/kelas/detail/<?= $kelas['id']; ?>" class="badge text-bg-primary float-right ml-1">detail</a>
              <a href="<?= BASEURL; ?>/kelas/ubah/<?= $kelas['id']; ?>" class="badge badge-success badge text-bg-success float-right tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?=$kelas['id']; ?>">  ubah</a>
              <a href="<?= BASEURL; ?>/kelas/hapus/<?= $kelas['id']; ?>" class="badge badge-danger badge text-bg-danger float-right ml-1" onclick="return confirm('yakin?')">hapus</a>
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
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Kelas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/kelas/tambah" method="post">
         <input type='hidden' name="id" id="id">
          <div class="form-group">
            <label for="Kelas">Kelas</label>
            <input type="number" class="form-control" id="kelas" name="kelas"
             autocomplete="off" required>

          </div>

          <div class="form-group">
            <label for="id">ID</label>
            <input type="number" class="form-control" id="id" name="id">
          </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Tambah Data Kelas</button>
      </form>
    </div>
  </div>
</div>
</div>