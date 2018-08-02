<div class="content">
<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">SPPD Online</h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            	</ul>
        	</div>
		</div>

		<form id="formdatapersonal" method="POST" class="form-horizontal form-validate-jquery" action="<?= base_url()?>c_karyawan/editDataPersonal" enctype= "multipart/form-data" >
			<fieldset class="content-group">
				
				<div class="panel-body">
					<legend class="text-bold">SPPD Online</legend>

					<div class="form-group">
						<label class="control-label col-lg-3">Upload File SPPD<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="file" name="namapelatihan" class="input form-control" required="required" placeholder="Masuk Nomer Induk Pegawai"  >
						</div>
					</div>
					
					<div class="form-group">
						<a id="cancelbutton" class="btn btn-danger" style="float: right; display: none;" >cancel</a>
						<button id="submitedit" class="btn btn-primary" style="float: right; display: none;" value="submit" type="submit">Submit</button>
					</div>

					</form>
				</div>
			</fieldset> 
		

		<div class="panel-footer">
			
			<a href="<?= base_url()?>c_user/sppdonline/0"  class="btn btn-danger" style="float: right; margin: 5px" >cancel</a>
			<button  class="btn btn-primary" style="float: right; margin: 5px" value="submit" type="submit">Submit</button>
			
		</div>
	</div>
	<!-- /basic datatable -->
