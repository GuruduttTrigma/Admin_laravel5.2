<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Address;
use App\Posts;
use Illuminate\Http\Request;
class UserController extends Controller {  
	public function users()  {
		$user = new User();
		//$data	= User::where('id','!=',1)->paginate(10)->address;
		$data	= User::with('address')->where('id','!=',1)->orderby('id','desc')->get();
		//echo "<pre>";print_r ($data);die;
		return view('admin.users.users')->withData($data);
	}
	
	public function add_user (Request $request) {	
		if ($_POST) {
			$this->validate($request, [
				'name' 	=> 'required',
				'email' => 'required',
				'mobile'=> 'required',
				'gender'=> 'required',
				'profile_image'=> 'required',
				'address'=> 'required',
				'city'=> 'required',
				'zip_code'=> 'required',
			]);
			
			$image_name		= $_POST['name'].'_'.time().'.jpg';
			$user = new User();
			$user->name 	= $_POST['name'];
			$user->email  	= $_POST['email'];
			$user->mobile 	= $_POST['mobile'];
			$user->gender 	= $_POST['gender'];
			$user->profile_image = $image_name;
			
			$target_dir = "C:/xampp/htdocs/e-mac/public/backend/img/profile_images/";
			$target_file = $target_dir . $image_name;
			move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);

			if ($user->save())  {
				$address = new Address();
				$address->user_id 	= $user->id;
				$address->address 	= $_POST['address'];
				$address->city  	= $_POST['city'];
				$address->zip_code	= $_POST['zip_code'];
				$address->save();
				return redirect('admin/users');
			}
		}
		return view('admin.users.add_user');
	}
	
	public function view_user ($id) {
		$data	= User::find($id);
		return view('admin.users.view_user')->withData($data);
	}
	
	public function edit_user (Request $request,$id) {		
		if ($_POST) {
			//echo "<pre>";print_r ($_POST);die;
			$user	= User::find($id);
			$this->validate($request, [
				'name' 	=> 'required',
				'email' => 'required',
				'mobile'=> 'required',
				'gender'=> 'required',
				'address'=> 'required',
				'city'=> 'required',
				'zip_code'=> 'required',
			]);
			$image_name		= $_POST['name'].'_'.time().'.jpg';
			$user->name 	= $_POST['name'];
			$user->email  	= $_POST['email'];
			$user->mobile 	= $_POST['mobile'];
			$user->gender 	= $_POST['gender'];
			//echo "<pre>";print_r ($_FILES);die;

			if (!empty($_FILES["profile_image"]) && $_FILES["profile_image"]["tmp_name"] != '')  {
				$user->profile_image = $image_name;
				$target_dir = "C:/xampp/htdocs/e-mac/public/backend/img/profile_images/";
				$target_file = $target_dir . $image_name;
				move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);
			} else  {
				$user->profile_image = $_POST['profile_image1'];
			}
			
			if ($user->save())  {
				$address = Address::find($_POST['address_id']);
				$address->user_id 	= $user->id;
				$address->address 	= $_POST['address'];
				$address->city  	= $_POST['city'];
				$address->zip_code	= $_POST['zip_code'];
				$address->save();
				return redirect('admin/users');
			}
		}
		//$data	= User::find($id);
		$data	= User::with('address')->where('id',$id)->first();
		return view('admin.users.edit_user')->withData($data);
		
	}
	
	public function delete_user ($id) {
		$user = User::find($id);
		if ($user->delete())  {
			$data['message'] = 'Post deleted Successfully';
		}  else  {
			$data['errors'] = 'Invalid Operation. You have not sufficient permissions';
		}
        return redirect('admin/users')->with($data);
	}
}
