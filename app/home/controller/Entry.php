<?php

namespace app\home\controller;

use core\Controller;
use core\model\Model;
use core\view\View;
use system\model\Article;
use system\model\Stu;

class Entry extends Controller
{

    public function index()
    {
        //获取所有学生数据
        $stu = Stu::get()->toArray();
        return View::make()->with('stu',$stu);
    }

    //查看单个学生信息
    public function show(){
        //获取要查看学生id
        $id = $_GET['id'];
        //查看对应学生的信息
        $stu = Stu::find($id)->toArray();
        //加载模板
        return View::make()->with('stu',$stu);
    }

}


?>