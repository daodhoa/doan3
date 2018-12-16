<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h3 class="page-header">Các câu hỏi mới: </h3>
    </div>
                <!--End Page Header -->
</div>
<div class="row" >
	
	<ul class="list-group">
	  <?php foreach ($cau_hoi_moi as $row):?>
	  
	  <li class="list-group-item"> 
	  	<a href="<?php echo base_url().'admin/cdanhmuctintuc/seeNewQuest/'.$row["matintuc"]; ?>">
	  		
	  	<?php echo($row["ngaydang"]) ;?> , Môn <?php  echo($row["tenmon"]);?> --- <?php echo($row["hoten"]);?> hỏi: " <?php echo($row["tieude"]);?> "
	  	
	  	</a>
	  </li>
	  <?php endforeach; ?>
	  
	</ul>
</div>
</div>