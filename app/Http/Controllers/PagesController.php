<?php

 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Post;
 use Session;
 use Mail;


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

 	public function postContact(Request $request){
 		$this->validate($request, array( 'email'=>'required|email',
 										  'subject'=>'required|min:5|max:255',
 										   'message'=>'required|min:10|max:300'		
 										));

 		$data=['email'=>$request->email,
 				'subject'=>$request->subject,
 				'msg'=>$request->message
 			   ];

 		Mail::send('emails.contact', $data, function($message) use ($data){
 			$message->from($data['email']);
 			$message->to('marshallkarki@gmail.com');
 			$message->subject($data['subject']);
 		});

 		Session::flash('success','mail succesfully sent via contact form');
 		return redirect('/');
 	}
 }

?>