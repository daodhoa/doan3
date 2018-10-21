<!-- Bootstrap tintuc CSS -->
    <link href="<?php echo base_url() ?>bootstrap/assets/css/comments.css" rel="stylesheet">
    
      <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-12">

          <!-- Title -->
          <h1 class="page-header"><?php echo($tinTuc->tieude); ?></h1>
          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo($tinTuc->ngaydang); ?></p>

          <hr>
      
          <!-- Post Content -->
          <p class="lead"><?php echo($tinTuc->noidung); ?></p>

          <hr>
      </div>
  	</div>
      <div class="row">
         <div class="detailBox">
		    <div class="titleBox">
		      <label>Comment Box</label>
		       
		    </div>
		    <div class="commentBox">
		        
		        <p class="taskDescription">Mong các bạn viết tiếng việt có dấu, không quá 500 từ </p>
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
		                    <span class="date sub-text">by <?php echo($comment->tentaikhoan); ?> on <?php echo($comment->ngaydang); ?></span>
		                </div>
		            </li>
		            <?php endforeach; ?>
		        </ul>
		        <form class="form-inline" role="form" action="<?php echo base_url().'comment/ccomment_tintuc/them/'.$tinTuc->matintuc ;?>" method="POST" >
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

