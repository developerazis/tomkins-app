<?php $this->load->view('partials/head.php') ?>
<body>
<div class="container">
      <?php $this->load->view('partials/nav.php') ?>

      <div class="row">
        <div class="col-sm-12"> 
        <div ng-view></div>
        <p>
            <b>Report</b>
            <a href="<?php echo site_url('report/pdf') ?>" class="btn btn-sm btn-primary float-right">Cetak PDF</a>
        </p>        
        <table class="table table-sm table-hover" id="table_1">
            <thead class="table-success">
                <th>Counter</th>
                <th>Sales</th>
                <th>Tanggal</th>
                <th>Artikel</th>
                <th>Size</th>
                <th>Dics</th>
                <th>Sub Total</th>
                <th>Grand Total</th>
            </thead>
            <tbody>
            <?php 
            foreach ($reports as $key => $report) {
            ?>
                <tr>
                    <td><?php echo $report['nama_counter'] ?></td>
                    <td><?php echo $report['nama'] ?></td>
                    <td><?php echo $report['tanggal'] ?></td>
                    <td><?php echo $report['artikel'] ?></td>
                    <td align="center"><?php echo $report['size'] ?></td>
                    <td align="center"><?php echo $report['disc'] ?></td>
                    <td align="center"><?php echo $report['sub_total'] ?></td>
                    <td align="center"><?php echo $report['total_jual'] ?></td>
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
<?php $this->load->view('partials/script_report.php') ?>
</html>