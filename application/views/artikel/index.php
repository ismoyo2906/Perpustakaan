<body>
<div class="summernote container">
	
	<div class="row">
	    <div class="col-lg-7">
		<form id="postForm" action="<?php echo base_url().'artikel/index_act' ?>" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
			
			<b>Title</b>
			<input type="text" class="form-control" name="title">
			<br/>
			<textarea id="summernote" name="content" rows="10"></textarea>
			
			<br/>
			<button type="submit" class="btn btn-primary">Save</button>
			<button type="button" id="cancel" class="btn">Cancel</button>
		    
		</form>
		</div>
	</div>
</div>