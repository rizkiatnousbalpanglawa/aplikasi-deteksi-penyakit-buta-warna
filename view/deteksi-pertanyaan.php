<div class="container">
    <h3 class="mt-2"> <i class="fa fa-search-plus"></i> Deteksi</h3>
    <hr class="mt-0 bg-biru">

    <form action="deteksi-pertanyaan-hasil.php" method="post" enctype="multipart/form-data">

        <?php $get = $koneksi->query("SELECT * FROM pertanyaan") ?>
        <?php while ($set = $get->fetch_assoc()) : ?>
            <div class="card shadow mb-2">
                <div class="text-center mt-3">
                    <img src="../assets/img/<?= $set['soal'] ?>" alt="" class="" width="75%">
                </div>
                <div class="card-body text-center">
                    <!-- <label for="" class="">Angka Berapa Yang Anda Lihat?</label> -->
                    <input type="hidden" name="id_<?= $set['id_pertanyaan'] ?>" value="<?= $set['id_pertanyaan'] ?>">
                    <input type="number" class="form-control" name="jawaban_<?= $set['id_pertanyaan'] ?>" placeholder="Angka yang anda lihat">
                </div>
            </div>
        <?php endwhile ?>
        <br>
        <div class="form-group">
            <button class="btn bg-pink btn-block rounded-0 shadow" name="simpan"><i class="fa fa-stethoscope"></i> SIMPAN</button>
        </div>
    </form>

</div>