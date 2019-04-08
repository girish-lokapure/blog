<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
 
 /**
 * function Index defautt login validations.
 *
 * @param  username 
 * @param  password 
 * @return void
 */
	public function index(Request $request){
		// print_r($request->session()->all());


		if ($request->session()->has('role_id')) {
		    if($request->session()->get('role_id') == 1){
					// is admin						

					return ArticlesController::listArticles();
				}else{
					// is user
					return ArticlesController::listArticles($user->id);
				}
		}


		
			//can use validator here, not using due to the test requirement
			$data['error']  = '';
			if($request->has('username') && $request->has('password')){
							
				$hashedPassword = md5($request->password);
				$user = DB::table('users')
						->where('username',$request->username)
						->where('password',$hashedPassword)
						->first();
				// echo "<pre>";
				// print_r($user);exit;
				if(!empty($user)) {
					$request->session()->put('user_id', $user->id);
					$request->session()->put('role_id', $user->role_id);
					if($user->role_id == 1){
						// is admin						

						return ArticlesController::listArticles();
					}else{
						// is user
						return ArticlesController::listArticles($user->id);
					}
				}else{
					
					$data['error'] = "Account does not exits";
					return view('welcome',$data);
				}

			}else{
				// $data['error'] = "username and password is required";			
				return view('welcome',$data);
			}

		
		
		
		

	}

/**
 * function to validate sessions.
 *
 * @param  role_id
 * @param  user_id
 * @return void
 */


	public function logout(Request $request){
		
		$request->session()->flush();
		return redirect('/');
	}	
}
