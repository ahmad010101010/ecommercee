<?php
namespace App\Traits;

use PhpParser\Node\Expr\FuncCall;

trait HttpResponses{

protected Function success($data , $message=null ,$code = 200)
{
    return response()->json([
        'status'=>'Requset was succesful.',
        'message'=>$message,
        'data'=>$data
    ],$code);
}

protected Function error($data , $message=null ,$code)
{
    return response()->json([
        'status'=>'Error has occurred',
        'message'=>$message,
        'data'=>$data
    ],$code);
}

}
