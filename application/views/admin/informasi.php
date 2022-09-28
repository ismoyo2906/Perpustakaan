<div class="page-header">
<title>Dasboard - Informasi</title>
</div>

<div class="row">
<div class="col-lg-12">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-tittle" style="font-size: 18px; font-weight: bold"<b><i class="glyphicon glyphicon-list-alt"></i> Informasi </h3>
			</div>
				<div class="panel-body">
					<div class="list-group">
					<?php foreach($article as $r){ ?>
					<a href="<?php echo base_url().'admin/berita/'.$r->id_article;?>" class="list-group-item">
						<span class="badge"><?php echo date('d/m/Y',strtotime($r->tgl_terbit)); ?></span>
						<i></i><?php echo $r->title;?>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>