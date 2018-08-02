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

					<div class="col-lg-2" align="center">
						<label class="control-label"><i href="" class="fa fa-file-pdf-o fa-5x"></i></label><br/>
						<label class="control-label"><span>asdd</span></label><br/>
						<label class="control-label"><a href="" class="fa fa-download fa-2x"></a></label>
					</div>
					
				</div>
			</fieldset> 
		

		<div class="panel-footer">
			
			<a href="<?= base_url()?>c_user/sppdonline/1" class="btn btn-primary" style="float: right; margin: 5px">Upload SPPD</a>
			
		</div>
	</div>
	<!-- /basic datatable -->
