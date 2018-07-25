<?php $this->load->view('partials/head.php') ?>
<body>
<div class="container">
      <?php $this->load->view('partials/nav.php') ?>

      <div class="row">
        <div class="col-sm-12"> 
        <div ng-view></div>
        <p>
          <b>Counter</b>
          <a href="<?php echo site_url('counter') ?>" class="btn btn-sm btn-primary float-right">Back</a>
        </p>

         <p>
          <form method="post" action="<?php echo site_url('counter/edit_action/' . $counter[0]['counter_id']) ?>">
          <div class="col-sm-6 offset-sm-3" id="form-add" style="">
                    <input type="text" id="ctrlId" style="display: none">
              <div class="form-group row">
                <input type="text" name="nama_counter" value="<?php echo $counter[0]['nama_counter'] ?>" class="form-control form-control-sm" id="ctrlName" placeholder="Nama Counter">
              </div>
                    <div class="form-group row">
                        <input name="alamat" type="text" value="<?php echo $counter[0]['alamat'] ?>" class="form-control form-control-sm" id="ctrlName" placeholder="Alamat Counter"> 
                    </div>
                    <div class="form-group row">
                        <select name="wilayah_id" class="form-control form-control-sm" id="ctrlType" required="">
                            <?php foreach ($region as $key => $value) {
                            ?>
                                <option value="<?php echo $value['wilayah_id'] ?>"><?php echo $value['nama_wilayah'] ?></option>
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
<?php $this->load->view('partials/script_counter.php') ?>
</html>