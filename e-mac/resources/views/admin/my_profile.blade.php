	@extends('admin.layouts.master')

@section('content')
<!--overview start-->
<div class="row">
<div class="col-lg-12">
	<h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
	<ol class="breadcrumb">
		<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
		<li><i class="icon_documents_alt"></i>Pages</li>
		<li><i class="fa fa-user-md"></i>Profile</li>
	</ol>
</div>
</div>
<div class="row">
<!-- profile-widget -->
<div class="col-lg-12">
	<div class="profile-widget profile-widget-info">
		  <div class="panel-body">
			<div class="col-lg-2 col-sm-2">
			  <h4><?php echo ucwords($data->name); ?></h4>               
			  <div class="follow-ava">
				  <img src="<?php echo 'http://localhost/e-mac/public/backend/img/profile_images/'.$data->profile_image; ?>" height="50" width="50" />
				  
			  </div>
			  <h6>Administrator</h6>
			</div>
			<div class="col-lg-4 col-sm-4 follow-info">
				<p>Hello I’m Jenifer Smith, a leading expert in interactive and creative design.</p>
				<p>@jenifersmith</p>
				<p><i class="fa fa-twitter">jenifertweet</i></p>
				<h6>
					<span><i class="icon_clock_alt"></i>11:05 AM</span>
					<span><i class="icon_calendar"></i>25.10.13</span>
					<span><i class="icon_pin_alt"></i>NY</span>
				</h6>
			</div>
			<div class="col-lg-2 col-sm-6 follow-info weather-category">
					  <ul>
						  <li class="active">
							  
							  <i class="fa fa-comments fa-2x"> </i><br>
							  
							  Contrary to popular belief, Lorem Ipsum is not simply
						  </li>
						   
					  </ul>
			</div>
			<div class="col-lg-2 col-sm-6 follow-info weather-category">
					  <ul>
						  <li class="active">
							  
							  <i class="fa fa-bell fa-2x"> </i><br>
							  
							  Contrary to popular belief, Lorem Ipsum is not simply 
						  </li>
						   
					  </ul>
			</div>
			<div class="col-lg-2 col-sm-6 follow-info weather-category">
					  <ul>
						  <li class="active">
							  
							  <i class="fa fa-tachometer fa-2x"> </i><br>
							  
							  Contrary to popular belief, Lorem Ipsum is not simply
						  </li>
						   
					  </ul>
			</div>
		  </div>
	</div>
</div>
</div>
<!-- page start-->
<div class="row">
 <div class="col-lg-12">
	<section class="panel">
		  <header class="panel-heading tab-bg-info">
			  <ul class="nav nav-tabs">
				  <li class="active">
					  <a data-toggle="tab" href="#profile">
						  <i class="icon-user"></i>
						  Profile
					  </a>
				  </li>
				  <li class="">
					  <a data-toggle="tab" href="#edit-profile">
						  <i class="icon-envelope"></i>
						  Edit Profile
					  </a>
				  </li>
			  </ul>
		  </header>
		  <div class="panel-body">
			  <div class="tab-content">
				  <!-- profile -->
				  <div id="profile" class="tab-pane active">
					<section class="panel">
					  <div class="panel-body bio-graph-info">
						  <h1>Bio Graph</h1>
						  <div class="row">
							  <div class="bio-row">
								  <p><span>Name </span>: <?php echo ucwords($data->name); ?> </p>
							  </div>
							  <div class="bio-row">
								  <p><span>Email </span>: <?php echo $data->email; ?></p>
							  </div>                                              
							  <div class="bio-row">
								  <p><span>Gender</span>: <?php echo ucwords($data->gender); ?></p>
							  </div>
							  <div class="bio-row">
								  <p><span>Role </span>: <?php echo ucwords($data->role); ?></p>
							  </div>
							  <div class="bio-row">
								  <p><span>Mobile </span>: <?php echo $data->mobile; ?></p>
							  </div>
							  <div class="bio-row">
								  <p><span>Updated At </span>: <?php echo $data->updated_at; ?></p>
							  </div>
							  <div class="bio-row">
								  <p><span>Address </span>:<?php echo ucwords($data->address->address); ?></p>
							  </div>
							  <div class="bio-row">
								  <p><span>City </span>: <?php echo ucwords($data->address->city); ?></p>
							  </div>
							  <div class="bio-row">
								  <p><span>Zip Code </span>:  <?php echo $data->address->zip_code; ?></p>
							  </div>
						  </div>
					  </div>
					</section>
					  <section>
						  <div class="row">                                              
						  </div>
					  </section>
				  </div>
				  <!-- edit-profile -->
				  <div id="edit-profile" class="tab-pane">
					<section class="panel">                                          
						  <div class="panel-body bio-graph-info">
							  <h1> Profile Info</h1>
							  @if (count($errors) > 0)
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
							  <form class="form-horizontal" role="form" method = 'POST' action="/e-mac/public/admin/my_profile" enctype="multipart/form-data">  
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
									<input type="hidden" name="address_id" value="<?php echo $data->address->id ?>">
									<div class="form-group">
								  <label class="col-lg-2 control-label">Name</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Email</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="email" id="email" value="{{ $data->email }}">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Mobile</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $data->mobile }}">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Gender</label>
								  <div class="col-lg-6">
										<select name="gender" class="form-control">
											<option value="" >Select</option>
											<option value="Male" <?php if ($data->gender=='Male') { echo "selected"; } ?>>Male</option>
											<option value="Female" <?php if ($data->gender=='Female') { echo "selected"; } ?>>Female</option>
										</select>
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Address</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="address" id="address" value="{{ $data->address->address }}">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">City</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="city" id="city" value="{{ $data->address->city }}">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Zip Code</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{ $data->address->zip_code }}">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-lg-2 control-label">Upload Profile Image</label>
								  <div class="col-lg-6">
									  <input type="hidden" name="profile_image1" value="{{ $data->profile_image}}">
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