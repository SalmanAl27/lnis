<?php
include "../function/koneksi.php";
session_start();
if ($_SESSION['level'] != 'user') {
    header("location:login.php");
}

$id = $_SESSION['username'];
$akun = take_data("SELECT * FROM user where username = '$id'");
$i_hb = $_SESSION['u_hb'];
$t_hb = take_data("SELECT username from user WHERE username = '$i_hb'");

$information = query("SELECT user.id,user.username,user.nama,informasi.*,jenis.barang FROM user INNER JOIN informasi ON user.username = informasi.pengirim INNER JOIN jenis ON informasi.jenis = jenis.id");
?>
<?php
include "template_index/head_index.php";
include "template_index/nav_index.php";

?>

<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Berita Kehilangan</h2>
            <h3 class="section-subheading text-muted">Semoga barang anda cepat di temukan</h3>
        </div>
        <div class="row">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($information as $data_information) : ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header fs-5">
                            <?= $data_information['nama'] ?>
                            <?php
                            if($data_information['username'] == $akun['username']): ?>
                            <div class="float-end">
                                <a class="me-2 fs-5" href="edit_berita.php?id_edit=<?=$data_information['id']?>"><i
                                        class="bi bi-pencil-square"></i></a>
                                <a class="me-2 fs-5"
                                    href="function/delete_beritapribadi.php?id_hapus=<?=$data_information['id']?>"><i
                                        class="bi bi-trash"></i></a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <img style="width: 345px; height: 250px;"
                            src="../assets/images/<?= $data_information['gambar'] ?>"
                            class="card-img-top ps-3 pt-3 pe-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Informasi <?= $data_information['berita'] ?></h5>
                            <table class="table">
                                <tr>
                                    <td>Jenis</td>
                                    <td> <?= $data_information['barang'] ?></td>
                                </tr>
                                <tr>
                                    <td>Plat Nomor</td>
                                    <td style="text-transform: uppercase;"> <?= $data_information['plat_nomor'] ?></td>
                                </tr>
                                <tr>
                                    <td>Atas Nama</td>
                                    <td> <?= $data_information['atas_nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Hubungi</td>
                                    <td> <?= $data_information['hubungi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td><?= $data_information['keterangan'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted "><?= $data_information['waktu'] ?></small>
                            <!-- <a href="komentar.php?information_id=<?= $data_information['id'] ?>" <i class="bi bi-chat-dots-fill float-end"></i></a> -->
                            <button style="margin-top: -10px;" type="button" class="btn btn-link float-end"
                                data-bs-toggle="modal" data-bs-target="#CommentPost<?= $data_information['id'] ?>"><i
                                    class="bi bi-chat-dots-fill float-end fs-5"></i> </button>
                            <?php include "template_index/modal_komen.php" ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php
include "template_index/footer_index.php";
?>