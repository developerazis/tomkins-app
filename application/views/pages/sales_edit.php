<?php $this->load->view('partials/head.php') ?>
<body>
<div class="container">
      <?php $this->load->view('partials/nav.php') ?>

      <div class="row">
        <div class="col-sm-12"> 
        <div ng-view></div>
        <p>
          <b>Sales Edit</b>
          <a href="<?php echo site_url('sales') ?>" class="btn btn-sm btn-primary float-right">Back</a>
        </p>

        <p>
          <form method="post" action="<?php echo site_url('pic/edit_action/' . $counter[0]['pic_id']) ?>">
          <div class="col-sm-6 offset-sm-3" id="form-add" style="">
                    <input type="text" id="ctrlId" style="display: none">
            <div class="form-group row">
              <input type="text" value="<?php echo $result['nama'] ?>" class="form-control form-control-sm" id="ctrlName" placeholder="Nama">
            </div>
            <div class="form-group row">
              <input type="text" value="<?php echo $result['alamat'] ?>" class="form-control form-control-sm" name="ip" id="ctrlIp" placeholder="Alamat">
            </div>
            <div class="form-group row">
              <input type="text" value="<?php echo $result['no_telp'] ?>" class="form-control form-control-sm" name="ip" id="ctrlIp" placeholder="No Telephone">
            </div>
            <div class="form-group row">
              <select class="form-control form-control-sm" id="ctrlType">
                <?php foreach ($counter as $key => $value) {
                      $selected = ($result['counter']['counter_id'] == $value['counter_id']) ? "selected" : "" ;
                            ?>
                                <option <?php echo $selected ?> value="<?php echo $value['counter_id'] ?>"><?php echo $value['nama_counter'] ?></option>
                            <?php
                            } ?>
              </select>
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