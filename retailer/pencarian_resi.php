<?php
if(isset($_POST['cariresi']))
	{
		$resi=$_POST["resi"];
		Redirect('resi.php?id='.$resi.'',false);
	}
?>
<form method="post">
	<div class="form-group">
		<div class="col-sm-offset-8 col-sm-3">
		 	<input type="text" name="resi" placeholder="resi">
		</div>      
		<div class="col-sm-1">
	    	 <button type="submit" class="btn btn-primary" value="cariresi" name="cariresi">Search</button>
		</div>
	</div>
</form>