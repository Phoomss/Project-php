<?php 
  include("condb.php"); // เชื่อมต่อฐานข้อมูล
  $query_status  = "SELECT * FROM tbl_status  order by status_id asc" or die ("Error:" . mysqli_error());
  $result = mysqli_query($con, $query_status );
//   echo $query_status 
//   exit();
?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
      
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th> 
      </tr>
    </thead>
    <tbody>
       <?php foreach ($result as $row)  { $i +=1; ?> 
      <tr>
        <td>
         <?php echo $i; ?>
         <td>
         <?php echo $row['status_name']; ?>
        </td>
        <td>         
          <a class="btn btn-warning btn-sm" href="status .php?act=edit&status _id=<?php echo $row['status _id']; ?>">
           แก้ไข
          </a>
        </td>    
        <td align="center">         
          <a class="btn btn-danger btn-sm" href="status .php?status _id=<?= $row['status _id'];?>" 
            onclick="return confirm('ยืนยันการลบข้อมูล !!');">
           ลบ
          </a>
        </td>  
         <?php } ?>  
      </tr>
    </tbody>
  </table>