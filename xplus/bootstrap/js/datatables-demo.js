// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
  	"columnDefs": [{ 'orderable': false, "width": "50px", "targets": 0 }]
  });
});
