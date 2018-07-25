<?php $this->load->view('partials/head.php') ?>
<body>
<div class="container">
      <?php $this->load->view('partials/nav.php') ?>

      <div class="row">
        <div class="col-sm-12"> 
        <div ng-view></div>
        <p>
          <b>PIC Edit</b>
          <a href="<?php echo site_url('pic') ?>" class="btn btn-sm btn-primary float-right">Back</a>
        </p>

        <p>
          <form method="post" action="<?php echo site_url('pic/edit_action/' . $result['pic_id']) ?>">
          <div class="col-sm-6 offset-sm-3" id="form-add" style="">
                    <input type="text" id="ctrlId" style="display: none">
            <div class="form-group row">
              <input type="text" name="pic[nama]" value="<?php echo $result['nama'] ?>" class="form-control form-control-sm" id="ctrlName" placeholder="Nama">
            </div>
            <div class="form-group row">
              <input type="text" name="pic[alamat]" value="<?php echo $result['alamat'] ?>" class="form-control form-control-sm"  id="ctrlIp" placeholder="Alamat">
            </div>
            <div class="form-group row">
              <input type="text" name="pic[no_telp]" value="<?php echo $result['no_telp'] ?>" class="form-control form-control-sm"  id="ctrlIp" placeholder="No Telephone">
            </div>
            <div class="form-group row">
              <button id="btn-save" class="btn btn-primary btn-sm btn-block">Save</button>
            </div>
          </div>
          </form>
        </p>
          
        </div>
      </div>



      <?php $this->load->view('partials/footer.php') ?>
</div>
</body>

<?php $this->load->view('partials/scripts.php') ?>
<?php $this->load->view('partials/script_sales.php') ?>
</html>