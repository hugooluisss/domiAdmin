<div class="modal fade" id="winUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Historia</h1>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-6 col-xs-offset-3">
						<center>
							<img src="" class="img-responsive">
						</center>
					</div>
				</div>
				<form id="upload" method="post" action="?mod=cservicios&action=uploadfile" enctype="multipart/form-data">
					<input type="hidden" id="servicio" name="servicio">
					<input type="file" name="upl" multiple />
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>