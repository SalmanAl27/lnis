<!-- Modal -->
<div class="modal fade" id="ViewBerita<?= $dt['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Berita <?= $dt['berita'] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="../assets/images/<?= $dt['gambar'] ?>" alt="Gambar Berita" class="rounded mx-auto d-block" width="200">
        <table class="table">
          <tr>
            <td>Jenis</td>
            <td><?= $dt['barang'] ?></td>
          </tr>
          <tr>
            <td>Plat Nomor</td>
            <td><?= $dt['plat_nomor'] ?></td>
          </tr>
          <tr>
            <td>Atas Nama</td>
            <td><?= $dt['atas_nama'] ?></td>
          </tr>
          <tr>
            <td>Hubungi</td>
            <td><?= $dt['hubungi'] ?></td>
          </tr>
          <tr>
            <td>Komentar</td>
            <td><textarea cols="40" rows="5"><?= $dt['keterangan'] ?></textarea></td>
          </tr>
          <tr>
            <td>Waktu</td>
            <td><?= $dt['waktu'] ?></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>