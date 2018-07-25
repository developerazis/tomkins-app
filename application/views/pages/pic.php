<?php $this->load->view('partials/head.php') ?>
<body>
<div class="container">
      <?php $this->load->view('partials/nav.php') ?>

      <div class="row">
        <div class="col-sm-12"> 
        <div ng-view></div>
        <p>
          <b>PIC</b>
          <button id="btn-add" class="btn btn-sm btn-primary float-right">Add New</button>
        </p>

        <span id="loader" style="display: none"></span>
        <p>
          <form method="post" action="<?php echo site_url('pic/add') ?>">
          <div class="col-sm-6 offset-sm-3" id="form-add" style="display: none">
                    <input type="text" id="ctrlId" style="display: none">
            <div class="form-group row">
              <input type="text" name="pic[nama]" class="form-control form-control-sm" id="ctrlName" placeholder="Nama">
            </div>
            <div class="form-group row">
              <input type="text" name="pic[alamat]" class="form-control form-control-sm" name="ip" id="ctrlIp" placeholder="Alamat">
            </div>
            <div class="form-group row">
              <input type="text" name="pic[no_telp]" class="form-control form-control-sm" name="ip" id="ctrlIp" placeholder="No Telephone">
            </div>
            <div class="form-group row">
              <button id="btn-save" class="btn btn-primary btn-sm btn-block">Save</button>
            </div>
          </div>
          </form>
        </p>
          
        <table id="table" class="table table-sm table-hover">
          <thead class="table-success">
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telephone</th>
            <th>#</th>
          </thead>
         <tbody>
            <?php 
            foreach ($pic as $key => $data) {
            ?>
                <tr>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['no_telp'] ?></td>
                    <td>
                        <a href="<?php echo site_url('pic/edit/' . $data['pic_id']) ?>" class="btn btn-sm btn-outline-info btn-edit">Edit</a>
                        <a href="<?php echo site_url('pic/delete/' . $data['pic_id']) ?>" class="btn btn-sm btn-outline-danger btn-delete">Delete</a>
                    </td>
                </tr>
            <?php
            } ?>
          </tbody>
        </table>

        </div>
      </div>



      <?php $this->load->view('partials/footer.php') ?>
</div>
</body>

<?php $this->load->view('partials/scripts.php') ?>
<?php $this->load->view('partials/script_pic.php') ?>
</html>