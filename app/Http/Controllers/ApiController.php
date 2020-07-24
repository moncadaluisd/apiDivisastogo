<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ApiController extends Controller
{
    use ApiResponser;
    //
    protected function image($request, $folder,$id){

      $image = null;
      $tipo = false;
      if (isset($request)) {
        # code...
        $exploded= explode(',', $request);
        $file = base64_decode($exploded[1]);

        if (Str::contains($exploded[0], 'jpeg')) {
          # code...
            $extension = 'jpeg';
        }elseif (Str::contains($exploded[0], 'jpg')) {
          # code...
            $extension = 'jpg';
          }elseif (Str::contains($exploded[0], 'mp4')) {
              # code...
              $extension = 'mp4';
              $tipo = 1;

          }else{
          $extension = 'png';

        }


      $filename = md5(Str::random()) . '_' . date('Y-m-d_h_i_s') . '_' . 'chat.' . $extension;
      $upload   = Storage::disk('s3')->put("/$folder/$id/".$filename, $file, 'public');
      $image = "https://divisastogo.s3-sa-east-1.amazonaws.com/$folder/$id/" . $filename;


      }
      $return = array('image' => $image, 'tipo' => $tipo);
      return $return;

    }

}
