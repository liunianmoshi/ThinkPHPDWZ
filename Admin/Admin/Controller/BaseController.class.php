<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2015/10/21
 * Time: 22:35
 */

namespace Admin\Controller;

use Think\Controller;


class BaseController extends Controller
{
    public $NumPerPage =20;
    public $PageNum = 1;

    public function __construct() {
        parent::__construct();
        $this->NumPerPage = isset($_POST['numPerPage'])? $_POST['numPerPage']:20;
        $this->PageNum = isset($_POST['pageNum'])? $_POST['pageNum']:1;
    }
}