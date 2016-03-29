<?php 
namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Address;
use Illuminate\Http\Request;


class AdminController extends Controller {
	//protected $redirectTo = '/admin';
	public function login_get()
	{
		if (Auth::attempt(['email' => @$_POST['email'], 'password' => @$_POST['password'], 'role' => 'admin'])) {
            // Authentication passed...
            return redirect()->intended('admin/dashboard');
        }
		return view('admin.login');
	}
	
	public function login_post()
	{
		if ($_POST['email'] == '' || $_POST['password'] == '')  {
			$error 	 = 1;
			$message = 'Fields Email and Password both are required.';
			return view('admin.login')->withError($error)->withMessage($message);
		}
		if (Auth::attempt(['email' => $_POST['email'], 'password' => $_POST['password'], 'role' => 'admin'])) {
            return redirect()->intended('admin/dashboard');
        }  else  {
			$error = 1;
			$message = 'There were some problems with your input.';
			return view('admin.login')->withError($error)->withMessage($message);
		}
	}
	
	public function index()
	{
		return view('admin.dashboard');
	}
	
	public function my_profile(Request $request)
	{
		if ($_POST) {
			$user	= User::find(1);
			$this->validate($request, [
				'name' 	=> 'required',
				'mobile'=> 'required',
				'gender'=> 'required',
				'address'=> 'required',
				'city'=> 'required',
				'zip_code'=> 'required',
			]);
			$image_name		= $_POST['name'].'_'.time().'.jpg';
			$user->name 	= $_POST['name'];
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
				return redirect('admin/my_profile');
			}
		}
		$data	= User::with('address')->where('id',1)->first();
		return view('admin.my_profile')->withData($data);
	}
	
	public function logout()
	{
		if (Auth::check()) {
			Auth::logout();
            return redirect()->intended('admin/');
        } else  {
			return redirect()->intended('admin/dashboard');
		}
	}
}
