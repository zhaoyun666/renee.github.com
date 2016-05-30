<?php
/**
 * ==============================================
 * 版权所有 2015-2038
 * ----------------------------------------------
 * 您可以自由使用该源码，但是在使用过程中，请保留作者信息。尊重他人劳动成果就是尊重自己
 * ==============================================
 * @date: May 27, 2015
 * @time: 02:12:28 PM
 * @author: zhaozhao911@yahoo.com
 * @version:
 */
namespace AceApi;
class RemoteService{
    
    private static function exec($url, $data)
    {
        if (! $url)
            return false;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_NOSIGNAL, 1); // 解决28号错误 DNS解析问题
        curl_setopt($curl, CURLOPT_POST, 1); // POST提交
        curl_setopt($curl, CURLOPT_HEADER, 0); // 启用时会将头文件的信息作为数据流输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // 文件流形式
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_TIMEOUT, self::$timeout); // 设置cURL允许执行的最长秒数。
    
        $content = curl_exec($curl);
        $errno = curl_errno($curl);
        $errmsg = curl_error($curl);
        curl_close($curl);
        if ($errno > 0) {
            $msg = sprintf('curl(%d) %s', $errno, $errmsg);
            throw new \Exception($msg, 500, $url);
        }
        $result = json_decode($content, 1);
        if ($result['code'] != 200) {
            throw new \Exception($result['msg'], 500, $url, $result['code']);
        }
        return $result['data'];
    }
}