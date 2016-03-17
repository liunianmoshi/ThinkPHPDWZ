<?php
/**
 * Created by PhpStorm.
 * User: wangxiaoyuan
 * Date: 2015/8/12
 * Time: 16:55
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
import("Admin.Util.Page");
import("Admin.Util.ReturnResult");

class EmployeeController extends BaseController {
    public function  Index(){
        $keyword = $_POST['employee_keyword'];
        $emp = M("Employee");
        $totalCount = $emp->count();
        $pageSize = $this->NumPerPage;
        $pageNum = $this->PageNum;
        $list = $emp ->select();
        $this->assign('list',$list);

        $pageList["pageSize"] = $pageSize;
        $pageList["pageNum"] = $pageNum;
        $this->assign('pageList',$pageList);
        $this->assign('employee_keyword',$keyword);
        $this->assign('htmlPage',\Page::show(true,$pageSize,$pageNum,$totalCount));
        $this->display();
    }

    public  function Edit($ID = 0)
    {
        $model = null;
        if($ID > 0){
            $emp =M('Employee');
            $model = $emp->find($ID);
        }
        $this->assign('model',$model);
        $this->display();
    }
    public  function Sava()
    {
        try
        {
            $emp = M('Employee');
            $emp->create();
            if(isset($_POST['ID']) && $_POST['ID'] >0)
            {
                 $data = I('post.');
                 if(!isset($data['IsUse'])){
                     $data['IsUse'] = 0;
                 }
                 $isSuccess = $emp->save($data);
                 if($isSuccess){
                     $result = \ReturnResult::CloseSuccess('Employee');
                     $this->ajaxReturn($result,'json');
                 }else{
                     $result = \ReturnResult::Failed();
                     $this->ajaxReturn($result,'json');
                 }
            }
            else
            {
                $data = $emp ->where("LoginName='%s'",$_POST['LoginName'])->find();
                if($data != null){
                    $result = \ReturnResult::ShowFailed('已经存在此登陆名称!');
                    $this->ajaxReturn($result,'json');
                }
                $emp->CreateTime = date('Y-m-d H:i:s');
                $emp->UpdateTime = date('Y-m-d H:i:s');
                $num = $emp->add();
                if($num){
                    $result = \ReturnResult::CloseSuccess('Employee');
                    $this->ajaxReturn($result,'json');
                }else{
                    $result = \ReturnResult::Failed();
                    $this->ajaxReturn($result,'json');
                }
            }
        }
        catch(Exception $exc)
        {
            $result = \ReturnResult::ShowFailed($exc->getMessage());
            $this->ajaxReturn($result,'json');
        }
    }

    public function Delete()
    {
        if(isset($_GET['ID']) && $_GET['ID'] >0)
        {
            $emp = M('Employee');
            if($emp->delete($_GET['ID'])>0)
            {
                $result = \ReturnResult::DeleteSuccess('Employee');
                $this->ajaxReturn($result,'json');
            }
            $result = \ReturnResult::Failed();
            $this->ajaxReturn($result,'json');
        }
    }
}