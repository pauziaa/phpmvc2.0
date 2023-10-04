<div class="container mt-4">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataGuru" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah guru
            </button>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>guru/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari guru..." name="keyword" id="keyword" aria-describedby="button-addon" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <h1>Daftar Guru</h1>
    <ul class="list-group">
        <?php foreach ($data['guru'] as $guru) : ?>
            <li class="list-group-item d-flex flex-row justify-content-between">
                <?= $guru['guru']; ?>
                <div class="d-flex gap-2">
                    <a href="<?= BASEURL; ?>guru/detail/<?= $guru['id'] ?>" class="badge text-bg-primary text-decoration-none float-right">detail</a>
                    <a href="<?= BASEURL; ?>guru/ubah/<?= $guru['id'] ?>" class="badge text-bg-success text-decoration-none float-right tampilModalUbahGuru" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $guru['id']; ?>">ubah</a>
                    <a href="<?= BASEURL; ?>guru/hapus/<?= $guru['id'] ?>" class="badge text-bg-danger text-decoration-none float-right" onclick="return confirm('yakin?')">hapus</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
</div>

<!-- Modal -->
<!-- ... Bagian HTML lainnya ... -->

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabelGuru" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabelGuru">Tambah Data Guru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>guru/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="guru" class="form-label">Nama: </label>
                        <input type="text" class="form-control" id="guru" name="guru">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi: </label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Guru</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

$(function() {
    
$(".tombolTambahDataGuru").on("click", function() {
        $("#formModalLabelGuru").html("Tambah Data Guru");
        $(".modal-footer button[type=submit]").html("Tambah Data");
        $("#guru").val("");
    });

    $(".tampilModalUbahGuru").on("click", function() {
        $("#formModalLabelGuru").html("Ubah Data Guru");
        $(".modal-footer button[type=submit]").html("Ubah Data");
        $(".modal-body form").attr(
            "action",
            "http://localhost/phpmvc/public/guru/ubah"
        );

        const id = $(this).data("id");

        $.ajax({
            url: "http://localhost/phpmvc/public/guru/getubah",
            data: {
                id: id
            },
            method: "post",
            dataType: "json",
            success: function(data) {
                $("#guru").val(data.guru);
                $("#deskripsi").val(data.deskripsi);
                $("#id").val(data.id);
            },
        });
    });
  });
</script>