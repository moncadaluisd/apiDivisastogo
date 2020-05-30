<?php
namespace App\Traits;

use Illuminate\Http\Response;
/**
 * @Return response the methods controller's
 */
trait ApiResponser
{

  public function successResponse($data='', $message='', $code=200)
  {
    return response()->json(['data' => $data, 'message' => $message], $code);
  }

  public function errorResponse($message, $code){
    return response()->json(['message' => $message, 'code' => $code], $code);
  }


}
