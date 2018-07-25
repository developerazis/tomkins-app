<?php $this->load->view('partials/head.php') ?>
<body>
<div class="container">
      <?php $this->load->view('partials/nav.php') ?>

      <div class="row">
        <div class="col-sm-12">	
        <div ng-view></div>
        <p>
        	<b>Counter</b>
        	<button id="btn-add" class="btn btn-sm btn-primary float-right">Add New</button>
        </p>

        <span id="loader" style="display: none"></span>
        <p>
            <form method="post" action="<?php echo site_url('counter/add') ?>">
            	<div class="col-sm-6 offset-sm-3" id="form-add" style="display: none">
                        <input type="text" id="ctlId" style="display: none">
        				<div class="form-group row">
        					<input type="text" name="counter[nama_counter]" class="form-control form-control-sm" id="ctrlName" placeholder="Nama Counter">
        				</div>
                        <div class="form-group row">
                            <input type="text" name="counter[alamat]" class="form-control form-control-sm" idr="ctrlName" placeholder="Alamat Counter">
                        </div>
                        <div class="form-group row">
                            <select name="counter[wilayah_id]" class="form-control form-control-sm" id="ctrlType" required="">
                                <?php foreach ($region as $key => $value) {
                                ?>
                                    <option value="<?php echo $value['wilayah_id'] ?>"><?php echo $value['nama_wilayah'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
        				<div class="form-group row">
        					<button id="btn-save" type="submit" class="btn btn-primary btn-sm btn-block">Save</button>
        				</div>
      			  </div>
                
            </form>
        </p>
        	
        <table id="table" class="table table-sm table-hover">
        	<thead class="table-success">
        		<th>Nama Counter</th>
        		<th>Alamat</th>
        		<th>Wilayah</th>
        		<th>#</th>
        	</thead>
        	<tbody>
        	<?php 
            foreach ($counters as $key => $counter) {
            ?>
                <tr>
                    <td><?php echo $counter['nama_counter'] ?></td>
                    <td><?php echo $counter['alamat'] ?></td>
                    <td><?php echo $counter['nama_wilayah'] ?></td>
                    <td>
                        <a href="<?php echo site_url('counter/edit/' . $counter['counter_id']) ?>" class="btn btn-sm btn-outline-info btn-edit">Edit</a>
                        <a href="<?php echo site_url('counter/delete/' . $counter['counter_id']) ?>" class="btn btn-sm btn-outline-danger btn-delete">Delete</a>
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
<?php $this->load->view('partials/script_counter.php') ?>
</html>