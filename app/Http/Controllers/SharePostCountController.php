<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Facebook\Facebook;
use App\Models\SharePost;
use Illuminate\Http\Request;
use Maclof\Kubernetes\Pinterest;
use Abraham\TwitterOAuth\TwitterOAuth;

class SharePostCountController extends Controller
{


   public function shareonsocialmedia($id, $slug)
   {
      // dd("helllo");
      $url = url('blog-detail/view/' . $id);
      $fbUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url); // Facebook share URL

      $url = url('blog-detail/view/' . $id); // URL of the post to share
      $title = 'My awesome post'; // Title of the post to share
      $twitterUrl = 'https://twitter.com/intent/tweet?url=' . urlencode($url) . '&text=' . urlencode($title); // Twitter share URL

      $blog = Blog::find($id);
      $url = url('blog-detail/view/' . $id); // URL of the post to share
      $description = 'My awesome post'; // Description of the post to share
      $mediaUrl = url('/images/blog/' . $blog->image); // URL of the image to share
      $pinterestUrl = 'https://www.pinterest.com/pin/create/button/?url=' . urlencode($url) . '&description=' . urlencode($description) . '&media=' . urlencode($mediaUrl); // Pinterest share URL

      $shareCount = SharePost::where('post_id', $id)->first();


      if (!$shareCount) {
         $share = new SharePost;
         $share->share   = 1;
         $share->post_id = $id;
         $share->save();

         if ($slug == 'facebook') {
            return redirect($fbUrl);
         } elseif ($slug == 'twitter') {
            return redirect($twitterUrl);
         } elseif ($slug == 'pinterest') {
            return redirect($pinterestUrl);
         } else {
            echo "Nothing happening";
         }
      } else {
         $shareCount->share += 1;
         $shareCount->save();

         if ($slug == 'facebook') {
            return redirect($fbUrl);
         } elseif ($slug == 'twitter') {
            return redirect($twitterUrl);
         } elseif ($slug == 'pinterest') {
            return redirect($pinterestUrl);
         } else {
            echo "Nothing happening";
         }
      }
   }
}
