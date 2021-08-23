<!-- Modal -->
<div class="modal fade" id="ubahPasswordSuplier" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/ubahPasswordSuplier" method="post" role="form">
          {{csrf_field()}}
          <div class="modal-body">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputPassword1">Password Lama</label>
                <input type="password" class="form-control" id="passwordlama" name="passwordlama" placeholder="Masukan Password">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
