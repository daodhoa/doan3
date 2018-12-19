<!-- Bootstrap tintuc CSS -->
    <link href="<?php echo base_url() ?>bootstrap/assets/css/comments.css" rel="stylesheet">
    
    <div class="container">
    	<input action="action" class="button secondary" onclick="window.history.go(-1); return false;" type="button" value="Quay lại" />

        <!-- Post Content Column -->
      <div class="row" style="border:1px solid black;border-color: #BBBBBB;position: relative; ">
      	<div style="position: absolute; top: 0; right: 0; z-index:1 ">
      		
      		<?php if($owner==true): ?>
      		<a href="<?php echo base_url().'Choidap/showViewSuaCauHoi/'.$cauHoi->matintuc ;?>" class="btn btn-default btn-sm" type="button">
        		<span class="glyphicon glyphicon-pencil"></span>  
    		</a>
    		<a href="<?php echo base_url().'Choidap/xoaCauHoi/'.$cauHoi->matintuc.'/'.$malop ;?>" class="btn btn-default btn-sm" onclick="return confirm('Bạn chắc muốn xóa câu hỏi này chứ?')";>
       	 		<span >X</span>  
    		</a>
    		<?php endif; ?>

      	</div>
        <!-- Post Content Column -->
        <div class="col-lg-12">

          <!-- Title -->
          <h1 class="page-header"><?php echo($cauHoi->tieude); ?></h1>
          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo($cauHoi->ngaydang); ?> </p>

          <hr>
      
          <!-- Post Content -->
          <p class="lead"><?php echo($cauHoi->noidung); ?></p>

          <hr>
      </div>
  	</div>
      <div class="row">
         <div class="detailBox" style="margin-top: 30px;margin-bottom: 30px" >
		    <div class="titleBox">
		      <label>Thảo luận</label>
		       
		    </div>
		    <div class="commentBox">
		        
		        <p class="taskDescription">Mong các bạn viết tiếng việt có dấu, không quá 500 từ </p>
		        <!-- <button type="button" class="close" aria-hidden="true">&times;</button> -->
		    </div>
		    <div class="actionBox">
		        <ul class="commentList">
		        	<?php foreach ($comments->result() as $comment):?>
		            <li>
		                <div class="commenterImage">
		                  <img src="http://placekitten.com/50/50" />
		                </div>
		                <div class="commentText">
		                    <p class=""><?php echo($comment->noidung); ?> </p> 

		                    <?php if(isset($comment->tengiaovien)!=false): ?>
		                    <span class="date sub-text">by <?php echo($comment->tengiaovien); ?> on <?php echo($comment->ngaydang); ?></span>

		                	<?php elseif (isset($comment->tensinhvien)!=false):  ?>
		                    <span class="date sub-text">by <?php echo($comment->tensinhvien); ?> on <?php echo($comment->ngaydang); ?></span>

		                    <?php endif; ?>
		                </div>
		            </li>
		            <?php endforeach; ?>
		        </ul>
		        <form class="form-inline" role="form" action="<?php echo base_url().'comment/ccomment_tintuc/sinhVienBinhLuan/'.$cauHoi->matintuc ;?>" method="POST" >
		            <div class="form-group">
		                <input class="form-control" type="text" name="noidungcomment" placeholder="Trả lời" />
		            </div>
		            <div class="form-group">
		            	<input type="submit" class="btn btn-default" name="submit" value="Add">
		                
		            </div>
		        </form>
		    </div>
		</div>

      </div>
</div>
      <!-- /.row -->

