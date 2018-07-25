<script type="text/javascript" src="<?php echo base_url() ?>public/datatable.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	
		// process the data table 
		var table = $('#table_1');
		var oTable = table.dataTable({

		// Internationalisation. For more info refer to http://datatables.net/manual/i18n
		"language": {
		    "aria": {
		        "sortAscending": ": activate to sort column ascending",
		        "sortDescending": ": activate to sort column descending"
		    },
		    "emptyTable": "Data tidak ada",
		    "info": "Tampilkan _START_ sampai _END_ dari _TOTAL_ data",
		    "infoEmpty": "Daftar tidak ada",
		    "infoFiltered": "(pencarian dari _MAX_ total data)",
		    "lengthMenu": "_MENU_ data",
		    "search": "Cari:",
		    "zeroRecords": "Tidak ada data yang cocok"
		},

		buttons: [],

		// setup responsive extension: http://datatables.net/extensions/responsive/
		// for expand and show button plus in no column
		// responsive: true,

		//"ordering": false, disable column ordering 
		//"paging": false, disable pagination

		// "order": [
		//     [0, 'asc']
		// ],
		// 
		ordering: true,
							            
		"lengthMenu": [
		    [5, 10, 15, 20, -1],
		    [5, 10, 15, 20, "All"] // change per page values here
		],
		// set the initial value
		"pageLength": 10,

			"dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
		});
	});
</script>