<?php
include('condb.php');
$sql = "SELECT * FROM tbl_login WHERE user_id =$user_id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
// echo $sql;
// exit();
?>
<div class="container">
	<form action="case_form_add_db.php" method="post">
		<div class="card-body">
			<div class="form-group col-md-2">
				<label>ผู้แจ้งซ่อม</label>
				<input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
				<input type="text" class="form-control" value="คุณ <?php echo $row['u_name']; ?>" disabled>
			</div>
			<div class="form-group col-md-6">
				<label>แจ้งปัญหางาน</label>
				<input type="text" class="form-control" placeholder="แจ้งปัญหางาน" required name="name_case">
			</div>
			<div class="form-group col-md-6">
				<label>รายละเอียดงาน</label>
				<input type="text" class="form-control" placeholder="รายละเอียดงาน" required name="detail_case">
			</div>
			<div class="form-group col-md-6">
				<label>สถานที่แจ้ง</label>
				<input type="text" class="form-control" placeholder="สถานที่แจ้ง" required name="place_case">
			</div>
		</div>
		<div class="card-footer col-md-6" >
			<button type="submit" class="btn btn-success">บันทึกงานแจ้งซ่อม</button>
			<button class="btn btn-warning">รายการแจ้งซ่อม</button>
		</div>
	</form>
</div>