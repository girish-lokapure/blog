<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{




/**
 * function List article
 *
 * @param  id  
 * @return void
 */

	public function listArticle($id){
 		$data['error'] = NULL;
		$data['articles'] = DB::table('articles')					
						->where('id',$id)
						->get();			
		
				
		
		if(!isset($data['articles'][0]->id)){
			
				$data['error'] = 'Invalid Article';
			}					

		return view('blog/list',$data);

	}




/**
 * function to List all blog articles.
 *
 * @param  userid
 * @return void
 */

	public static function listArticles($forUser=NULL){
 		
		$data= NULL;
		if(!empty($forUser)){
			$data['articles'] = DB::table('articles')
						->join('users','users.id','articles.user_id')					
						->where('user_id',$forUser)
						->get();			
		}else{
			$data['articles'] = DB::table('articles')->get();
		}			
		// echo '<pre>';
		// print_r($data);
		
		return view('blog/listall',$data);

	}



/**
 * function edit an article
 *
 * @param  id  
 * @param  request  
 * @return void
 */

	public function editArticle($id, Request $request ){

		if ($request->isMethod('post'))
		{
			$this->handleEditArticle($request);
			$id = $request->id;		
		}


	 	$data['error'] = NULL;
		$data['articles'] = DB::table('articles')					
						->where('id',$id)
						->get();			
			
					
			
		if(!isset($data['articles'][0]->id)){
				
				$data['error'] = 'Invalid Article';
			}					
		return view('blog/edit',$data);
				
	}


/**
 * function handle edit an article
 *
 * @param  id  
 * @param  request  
 * @return void
 */
	private function handleEditArticle($request ){

		$result = DB::table('articles')
		                ->where('id', $request->id)
		                ->update([
		                	'title' => $request->title,
		                	'body' => $request->body,
		                ]);			                

	}


/**
 * function add an article
 *
  
 * @param  request  
 * @return void
 */

	public function addArticle(Request $request ){


		if ($request->isMethod('post'))
		{
			$result = DB::table('articles')
						->insert([
		                	'title' => $request->title,
		                	'body' => $request->body,
		                	'user_id'=>$request->session()->get('user_id')
		                ]);	
			return ArticlesController::listArticles($request->session()->get('user_id'));
			
		}


		return view('blog/add');
				
	}


/**
 * function delete an article
 *
  
 * @param  request  
 * @return void
 */
	public function deleteArticle($id){


			$result = DB::table('articles')->where('id', $id)->delete();
			return ArticlesController::listArticles($request->session()->get('user_id'));
			
				
	}



}
