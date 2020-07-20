<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;


class ApiController extends Controller
{
    use ApiResponser;
    //
    protected function image($request){

      $image = null;
      $tipo = false;
      if (isset($request->image)) {
        # code...
        $exploded= explode(',', $request->image);
        $file = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg')) {
          # code...
            $extension = 'jpeg';
        }elseif (str_contains($exploded[0], 'jpg')) {
          # code...
            $extension = 'jpg';
          }elseif (str_contains($exploded[0], 'mp4')) {
              # code...
              $extension = 'mp4';
              $tipo = 1;

          }else{
          $extension = 'png';

        }


      $filename = md5(str_random()) . '_' . date('Y-m-d_h_i_s') . '_' . 'chat.' . $extension;
      $upload   = Storage::disk('s3')->put("/chat/$request->sala/".$filename, $file, 'public');
      $image = "https://divisastogo.s3-sa-east-1.amazonaws.com/chat/$request->sala/" . $filename;


      }
      $return = array('image' => $image, 'tipo' => $tipo);
      return $return;

    }
}
