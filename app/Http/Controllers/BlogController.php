<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class BlogController extends Controller
{

   public function getIndex()
   {
   	$posts=Post::paginate(5);
   	return view('blog.index',['posts'=>$posts]);
   }	

   public function getSingle($slug)
   {
   	 $post=Post::where('slug','=', $slug)
   	           ->first();
   	 return view('blog.single',['post'=>$post]);
   	}
}
/*$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');

     $table->dropForeign(['post_id','tag_id']);

     $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
     
 $table->dropForeign(['category_id']);        
             */
?>