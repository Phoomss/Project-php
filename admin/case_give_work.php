<?php 
  include("condb.php"); // เชื่อมต่อฐานข้อมูล
  $query_worker = "SELECT * FROM tbl_login WHERE user_level = 'worker' order by user_id asc" or die ("Error:" . mysqli_error());
  $result = mysqli_query($con, $query_worker);
  $case_id = $_GET['case_id'];
//   echo $query_worker;
//   exit();
?>

<section class="content">
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
            <?php foreach ($result as $row)  { $i +=1; ?> 
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                        ข้อมูลรายละเอียดช่าง
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b><?php echo $row['u_name'].' '.$row['u_lastname'];?></b></h2>
                                    <p class="text-muted text-sm"><b><?php echo $row['user_level']?> </b> </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: <?php echo $row['email']?></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Tel#: <?php echo $row['tel']?></li>
                                    </ul>
                                </div>
                            </div>
                            </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="index.php?tec_id=<?php echo $row['user_id']?>&act=worker" class="btn btn-sm bg-warning">
                                    <i class="fas fa-comments"></i>ตารางงาน
                                </a>
                                <a href="case_give_work_db.php?tec_id=<?php echo $row['user_id']?>&case_id=<?php echo $case_id;?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-user"></i> เลือกช่าง
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            </div>   
        </div>
    </div>
</section>

