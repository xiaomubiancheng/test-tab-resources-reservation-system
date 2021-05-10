<?php
namespace App\Http\Response;


trait ResponseJson{
    /**
     * @param $code
     * @param $message
     * @param  array  $data
     * @return mixed
     */
    public function jsonData($code, $message, $data=[]){
        return $this->jsonResponse($code, $message, $data);
    }

    /**
     * @param  array  $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonSuccessData($data=[]){
        return $this->jsonResponse(0, 'Success', $data);
    }

    /**
     * 返回一个json
     * @param $code
     * @param $message
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonResponse($code, $message, $data){
        $content = [
            'status' => $code,
            'msg' => $message,
            'data' => $data
        ];
        return response()->json($content);
    }
}
