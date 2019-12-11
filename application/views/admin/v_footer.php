<br>
<br>
<div class="card-footer bg-dark text-muted">
    <a style="color : white"><b>&copy;</b> HelpSociety 2019 </a>
  </div>
<?php
$za = date('Y-m-d');
?>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.js' ?>" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/locales/bootstrap-datetimepicker.id.js' ?>" charset="UTF-8"></script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        language:  'id',
        format: "yyyy-mm-dd hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: "<?php echo $za ?> 00:00",
        minuteStep: 10
    });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.table-datatable').DataTable();
	});
</script>



</body>
</html>