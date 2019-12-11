<br>
<br>
<div class="card-footer bg-dark text-muted">
    <center><a style="color : white"><b>Copyright &copy;</b> HelpSociety 2019 </a></center>
  </div>
<?php
$za = date('Y-m-d H:i:s');
//echo $za;
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
        startDate: "<?php echo $za ;?>",
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