<div class="modal fade" id="DataUsers<?= $users['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="../assets/images/users/<?= ($users['gambar'] == '') ? 'no_photo.png' : $users['gambar'] ?>" class="rounded mx-auto d-block" width="150" alt="Profil">
        <table class="table m-auto" style="width: 300px;">
          <tr>
            <td> Username </td>
            <td>: <?= $users['username'] ?> </td>
          </tr>
          <tr>
            <td> Password </td>
            <td>: <?= $users['password'] ?> </td>
          </tr>
          <tr>
            <td> Nama </td>
            <td>: <?= $users['nama'] ?> </td>
          </tr>
          <tr>
            <td> No_Telp </td>
            <td>: <?= $users['no_telp'] ?> </td>
          </tr>
          <!-- <tr>
            <td> Pelanggaran </td>
            <td>: <?= $users['pelanggaran'] ?> </td>
          </tr> -->
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>