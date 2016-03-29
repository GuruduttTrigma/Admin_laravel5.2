@extends('admin.layouts.master')

@section('content')
<!--overview start-->
<div class="row">
<div class="col-lg-12">
	<h3 class="page-header"><i class="fa fa-edit"></i>Add User</h3>
	<ol class="breadcrumb">
		<li><i class="fa fa-home"></i><a href="e-mac/public/admin/dashboard">Home</a></li>
		<li><i class="icon_documents_alt"></i>Users</li>
		<li><i class="fa fa-user-md"></i>Users</li>
	</ol>
</div>
</div>
<!-- page start-->
<div class="row">
 <div class="col-lg-12">
	<section class="panel">
		  <div class="panel-body">
			  <div class="tab-content">
				  <!-- edit-profile -->
				  <div id="edit-profile" class="tab-pane active">
					<section class="panel">                                          
						  <div class="panel-body bio-graph-info">
							<h1> Profile Info</h1>
							<?php //echo "<pre>"; print_r($errors->all()); ?>
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<form class="form-horizontal" role="form" method = 'POST' action="/e-mac/public/admin/add_user" enctype="multipart/form-data">  
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                   
								<div class="form-group">
								  <label class="col-lg-2 control-label">Name</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="name" id="name">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Email</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="email" id="email">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Mobile</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="mobile" id="mobile">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Gender</label>
								  <div class="col-lg-6">
										<select name="gender" class="form-control">
											<option value="">Select</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Address</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="address" id="address">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">City</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="city" id="city">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Zip Code</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="zip_code" id="zip_code">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Upload Profile Image</label>
								  <div class="col-lg-6">
									  <input type="file" class="form-control" name="profile_image" id="profile_image">
								  </div>
								</div>

							  <div class="form-group">
								  <div class="col-lg-offset-2 col-lg-10">
									  <button type="submit" class="btn btn-primary">Save</button>
									  <button type="button" class="btn btn-danger">Cancel</button>
								  </div>
							  </div>
						  </form>
						  </div>
					  </section>
				  </div>
			  </div>
		  </div>
	  </section>
 </div>
</div>
<!-- project team & activity end -->
@endsection