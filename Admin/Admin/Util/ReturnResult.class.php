<?php
/**
 * Created by PhpStorm.
 * User: wangxiaoyuan
 * Date: 2015/8/21
 * Time: 16:52
 */

class ReturnResult
{

    public static function CloseSuccess($navTabId)
    {
        $returnResult['statusCode'] = '200';
        $returnResult['message'] = '数据保存成功！';
        $returnResult['navTabId'] = $navTabId;
        $returnResult['callbackType'] = "closeCurrent";
        return $returnResult;
    }

    public static function Failed()
    {
        $result['statusCode'] = '300';
        $result['message'] = '操作失败！';
        return $result;
    }

    public static function ShowFailed($message)
    {
        $result['statusCode'] = '300';
        $result['message'] = $message;
        return $result;
    }

    public static function ShowSucess($msg, $navTabId, $callbackType)
    {
        $result['statusCode'] = '200';
        $result['message'] = $msg;
        $result['navTabId'] = $navTabId;
        $result['callbackType'] = $callbackType;
        return $result;
    }

    public static function IframeSuccess($fordURL)
    {
        $result['callbackType'] = 'forward';
        $result['forwardUrl'] = $fordURL;
        return $result;
    }
    public static function DeleteSuccess($navTabId)
    {
        $result['statusCode'] = '200';
        $result['message'] = '数据删除成功！';
        $result['navTabId'] = $navTabId;
        return $result;
    }
}