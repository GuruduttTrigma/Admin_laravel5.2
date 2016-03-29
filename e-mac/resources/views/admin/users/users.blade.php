@extends('admin.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-table"></i> Users</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="/e-mac/public/dashboard">Home</a></li>
			<li><i class="fa fa-table"></i>Table</li>
			<li><i class="fa fa-th-list"></i>Users</li>
		</ol>
	</div>
</div>
<!-- page start-->
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
			  Users Table
			</header>
			
			<table class="table table-striped table-advance table-hover">
				<tbody>
					<tr>
						<th><i class=""></i> Id</th>
						<th><i class="icon_profile"></i> Profile Image</th>
						<th><i class="icon_profile"></i> Name</th>
						<th><i class="icon_mail_alt"></i> Email</th>
						<th><i class="icon_pin_alt"></i> City</th>
						<th><i class="icon_pin_alt"></i> Zip Code</th>
						<th><i class="icon_mobile"></i> Mobile</th>
						<th><i class="icon_calendar"></i> Date</th>
						<th><i class="icon_cogs"></i> Action</th>
					</tr>
					<?php $i=1 ?>
					@foreach( $data as $info ) 
					<tr>
						<td>{{ $i }}</td>
						<td><img src="<?php echo 'http://localhost/e-mac/public/backend/img/profile_images/'.$info->profile_image; ?>" height="50" width="50" /></td>
						<td>{{ $info->name }}</td>
						<td>{{ $info->email }}</td>
						<td>{{ $info->address->city }}</td>
						<td>{{ $info->address->zip_code }}</td>
						<td>@if ($info->mobile != '') {{ $info->mobile }} @else {{ 'N/A'  }} @endif</td>
						<td>{{ $info->created_at }}</td>
						<td>
							<div class="btn-group">
								<a class="btn btn-primary" href="/e-mac/public/admin/view_user/<?php echo $info->id ?>"><i class="fa fa-eye"></i></a>
								<a class="btn btn-success" href="/e-mac/public/admin/edit_user/<?php echo $info->id ?>"><i class="fa fa-edit"></i></a>
								<a class="btn btn-danger" href="/e-mac/public/admin/delete_user/<?php echo $info->id ?>"><i class="fa fa-trash-o"></i></a>
							</div>
						</td>
					</tr>	
					<?php $i++ ?>
					@endforeach				
				</tbody>
			</table>
			<span style="margin-left:40%"></span>
		</section>
	</div>
</div>
<!-- page end-->
@endsection