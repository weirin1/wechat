<?php

namespace Weirin\Wechat;

/**
 * Class Http
 * @package Wechat
 */
class Http
{
    /**
     * GET 请求
     * @param string $url
     * @return bool|mixed
     */
    public static function get($url)
    {
        $curl = curl_init();

        if(stripos($url,"https://") !== FALSE){
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );

        $result = curl_exec($curl);
        $status = curl_getinfo($curl);
        curl_close($curl);

        $r = json_decode($result);

        if(isset($r->errcode) && $r->errcode >= 40001){
            Log::error($result);
        }

        if(intval($status["http_code"]) == 200){
            return $result;
        }else{
            return false;
        }
    }

    /**
     * POST 请求
     * @param string $url
     * @param array $param
     * @return string content
     */
    public static function post($url, $param)
    {
        $curl = curl_init();

        if(stripos($url,"https://")!==FALSE){
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }

        if (is_string($param)) {
            $strPOST = $param;
        } else {
            $aPOST = array();
            foreach($param as $key=>$val){
                $aPOST[] = $key."=".urlencode($val);
            }
            $strPOST =  join("&", $aPOST);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($curl, CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $strPOST);

        $result = curl_exec($curl);
        $status = curl_getinfo($curl);
        curl_close($curl);

        if(intval($status["http_code"]) == 200){
            return $result;
        }else{
            return false;
        }
    }

    /**
     * 上传文件
     * @param $url
     * @param $filedata
     */
    public static function upload($url, $filedata)
    {
        $curl = curl_init ();
        
        curl_setopt ($curl, CURLOPT_SAFE_UPLOAD, true);
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, FALSE );

        if (!empty($filedata)) {
            curl_setopt ( $curl, CURLOPT_POST, 1);
            curl_setopt ( $curl, CURLOPT_POSTFIELDS, $filedata);
        }

        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec ($curl);

//        $status = curl_getinfo($curl);
//        $err = curl_error($curl);
//        print '<pre>'. print_r($status, 1) . '</pre>';
//        print '<pre>'. print_r($err, 1) . '</pre>';

        curl_close ($curl);

        return $output;
    }

    /**
     * 下载网络图片并缓存到指定本地路径
     * @param $url
     * @param $cachePath
     */
    public static function download($url, $cachePath)
    {
        $curl = curl_init();
        $fp = fopen($cachePath, 'wb');
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FILE, $fp);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        //curl_setopt($hander,CURLOPT_RETURNTRANSFER,false);//以数据流的方式返回数据,当为false是直接显示出来
        curl_setopt($curl,CURLOPT_TIMEOUT, 60);
        curl_exec($curl);
        curl_close($curl);
        fclose($fp);
    }
}