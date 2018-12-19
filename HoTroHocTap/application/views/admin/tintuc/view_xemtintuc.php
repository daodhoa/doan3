<!-- Bootstrap tintuc CSS -->
    <link href="<?php echo base_url() ?>bootstrap/assets/css/comments.css" rel="stylesheet">
    <hr>
    <hr>
      <div class="row" style="border:1px solid black;border-color: #BBBBBB ">
        <!-- Post Content Column -->
        <div class="col-lg-12">

          <!-- Title -->
          <h3 class="page-header">Tiêu đề: <?php echo($tinTuc->tieude); ?></h3>
          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo($tinTuc->ngaydang); ?> by <?php echo($tinTuc->tensinhvien); ?> <?php echo($tinTuc->tengiaovien); ?> </p>

          <hr>
      
          <!-- Post Content -->
          
          <p class="lead"><?php echo($tinTuc->noidung); ?></p>
      		
          <hr>
      </div>
  	</div>
      <div class="row">
         <div class="detailBox">
		    <div class="titleBox">
		      <label>Bình luận: </label>
		       
		    </div>
		    <div class="commentBox">
		        
		        <p class="taskDescription">Mong các bạn viết tiếng việt có dấu, độ dài không quá 500 từ </p>
		        <button type="button" class="close" aria-hidden="true">&times;</button>
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
		        <form class="form-inline" role="form" action="<?php echo base_url().'comment/ccomment_tintuc/giaoVienBinhLuan/'.$tinTuc->matintuc ;?>" method="POST" >
		            <div class="form-group">
		                <input class="form-control" type="text" name="noidungcomment" placeholder="New comments" />
		            </div>
		            <div class="form-group">
		            	<input type="submit" class="btn btn-default" name="submit" value="Add">
		                
		            </div>
		        </form>
		    </div>
		</div>

      </div>
      <!-- /.row -->

