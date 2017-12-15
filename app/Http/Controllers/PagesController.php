<?php

 namespace App\Http\Controllers;
 use App\Post;

 class PagesController extends Controller
 {
 	public function getContact()
 	{
 		return view('pages/contact');
 	}

 	public function getAbout()
 	{
 		$name='Manoj karki';
 		$email='marshallkarki@gmail.com';
 		$odetails['work']='infotech nepal';
 		$odetails['mobile']='9842688075';

 		return view('pages/about',['name'=>$name, 'email'=>$email, 'odetails'=>$odetails ]);
 		/* passing data via variable to view can be done in other ways like
		   return view('pages/about')->with('name',$name)->with('email', $email);
		  */
 	}

 	public function getIndex()
 	{
 		$posts=Post::orderBy('created_at','desc')
 		           ->limit(4)
 		           ->get();

 		return view('pages/welcome',['posts'=>$posts]);
 	}
 }

?>