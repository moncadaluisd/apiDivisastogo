<?php
/**
 * Convert base64 to image png or jpg
 */
trait Base64ToImage
{
  protected function image($base64, $modelo){

      $image = null;
      $tipo = false;
      if (isset($base64)) {
        # code...
        $exploded= explode(',', $base64);
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

      $filename = md5(Str::random()) . '_' . date('Y-m-d_h_i_s') . '_' . $modelo . '.' . $extension;
      file_put_contents(public_path('images/'.$modelo.'/' .$filename), $file);

      $image = '/images/'.$modelo.'/' . $filename;


      }
      $return = array('image' => $image, 'tipo' => $tipo);
      return $image;

    }
}
