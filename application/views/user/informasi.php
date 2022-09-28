<?php
	foreach($article as $r){
		?>
<div class="row">
	<div class="col-lg-12">
<div class="page-header" value="<?php echo $r->id_article;?>">
<h3><?php echo $r->title;?></h3>
</div>
<p value="<?php echo date('d/m/Y',strtotime($r->id_article)); ?>"><?php echo date('d/m/Y',strtotime($r->tgl_terbit)); ?></p>
<hr>
<br>
	<div class="content" value="<?php echo $r->id_article;?>"><?php echo $r->content;?></div>
<hr/>
<?php } ?>
	<a href="<?php echo base_url().'user'; ?>"><p><< Back</p></a>
</div>
</div>