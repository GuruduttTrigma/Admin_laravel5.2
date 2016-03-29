@extends('admin.layouts.master')

@section('content')
<!--overview start-->
<div class="row">
<div class="col-lg-12">
	<h3 class="page-header"><i class="fa fa-user-md"></i>View User</h3>
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
							  <h1> {{ ucwords($data->name) }} Info</h1>
								<div class="row">
								<div class="bio-row">
								  <p><span>First Name </span>{{$data->name}} </p>
								</div>
								<div class="bio-row">
								  <p><span>Last Name </span>{{$data->name}}</p>
								</div>                                              
								<div class="bio-row">
								  <p><span>Email</span>{{$data->email}}</p>
								</div>
								<div class="bio-row">
								  <p><span>Mobile </span>{{$data->mobile}}</p>
								</div>
								<div class="bio-row">
								  <p><span>Registration Date </span>{{$data->created_at}}</p>
								</div>
								<div class="bio-row">
								  <p><span>Role </span>{{$data->role}}</p>
								</div>
							</div>
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