<script>
$( document ).ready(function() {
  // Reload function
  function reloadPage() {
    location.reload();
  }

  // Showing add/edit form
  $('#btn-add').click(function() {
    $('#form-add').toggle();
    if ($('#btn-add').html() == 'Cancel') $('#btn-add').html('Add New');
    else $('#btn-add').html('Cancel');
    // Enable the name input to be edited if it disabled
    // $("#ctrlName").prop('disabled', false);
    $('#ctrlId').val('');
    $('#ctrlName').val('');
    $('#ctrlIp').val('');
  });

  // Add/edit controller
  // $('#btn-save').click(function() {
 //    // Get value of form inputs
 //    var ctrlId   = $('#ctrlId').val();
  //   var ctrlName = $('#ctrlName').val().split(' ').join('%20');
  //   var ctrlType = $('#ctrlType').val().replace(" ", "%20");
  //   var ctrlIp   = $('#ctrlIp').val().replace(" ", "%20");
 //    // Load adding/editing url
 //    if ($('#ctrlId').val() == '') {
 //      $("#loader").load("/addController/"+ctrlName+"/"+ctrlType+"/"+ctrlIp);
 //    } else {
 //      $("#loader").load("/editController/"+ctrlId+"/"+ctrlName+"/"+ctrlType+"/"+ctrlIp);
 //    }
  //   // Trigger the add button
 //    $('#btn-add').click();
 //    // Reload page
 //    setTimeout(reloadPage, 500);
  // });

 //  $('.btn-delete').click(function() {
 //    // Load removing url
 //    $("#loader").load("/removeController/" + $(this).val());
 //    // Reload page
 //    setTimeout(reloadPage, 500);
 //  });

 //  $('.btn-edit').click(function() {
 //    valSplitted = $(this).val().split('$$');
 //    // Trigger the add button
 //    $('#btn-add').click();
 //    // Change the value of input form  
 //    $('#ctrlId').val(valSplitted[0]);
 //    $('#ctrlName').val(valSplitted[1]);
 //    $('#ctrlType').val(valSplitted[2]);
 //    $('#ctrlIp').val(valSplitted[3]);
 //    // Set btn add to string Cancel
 //    $('#btn-add').html('Cancel');
 //    // Disable the name input to be edited
 //    // $("#ctrlName").prop('disabled', true);
 //    // Force the form to be shown
 //    $('#form-add').show();
 //  });

});

</script>