<?php
include("condb.php"); // เชื่อมต่อฐานข้อมูล
$query_case = "SELECT c.*,u.u_name,u.u_lastname,s.status_name,u.tel,u.email,s.status_id FROM tbl_case as c INNER JOIN tbl_login as u ON c.user_id = u.user_id INNER JOIN tbl_status as s ON 
   c.status_id = s.status_id order by user_id asc" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query_case);

?>
<table id="example1" class="table table-hover text-nowrap">
  <thead>
    <tr role="row" class="info">
      <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ID</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่องาน</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">รายละเอียดผู้แจ้ง</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รายละเอียดงาน</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานที่</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันและเวลา</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">เลือกช่าง</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) {
      $i += 1; ?>
      <tr>
        <td>
          <?php echo $row['case_id']; ?>
        <td>
          <?php echo $row['name_case']; ?>
        </td>
        <td>
          <?php echo $row['u_name'] . ' ' . $row['u_lastname'] ?>
        </td>
        <td>
          <?php echo $row['detail_case']; ?>
        </td>
        <td>
          <?php echo $row['place_case']; ?>
        </td>
        <td>
          <?php echo $row['status_name']; ?>
        </td>
        <td>
          <?php echo date("d-m-Y , H:i:s", strtotime($row['date_case'])); ?>
        </td>
        <td>
          <?php
          if ($row['status_id'] == 1) { ?>
            <a class="btn btn-success btn-sm" href="index.php?act=add&case_id=<?php echo $row['case_id']; ?>">เลือกช่าง</a>
          <?php } elseif ($row['status_id'] == 2) { ?>
            <a class="btn btn-danger btn-sm">มอบแล้ว</a>
          <?php } ?>
        </td>
      <?php } ?>
      </tr>
  </tbody>
</table>