<?php
namespace app\admin\controller;

use core\view\View;
use system\model\Grade as g;
class Grade extends Common{


    /**
     *
     * 班级列表方法
     *
     * @return mixed
     */
    public function index(){
        //获取班级表中的所有数据
//        $data = g::get()->toArray();
//        组合sql语句找到有学生班级数据
        $sql = "select grade.*,count(stu.name) as c from stu right join grade on stu.gid = grade.id group by grade.id";
        $data = g::query($sql)->toArray();
        //加载班级列表模板
        return View::make()->with('grade',$data);
    }


    /**
     *
     * 加载添加班级模板
     *
     * @return mixed
     */
    public function create(){
        //加载添加班级模板
        return View::make();
    }


    public function add(){
        //获取post数据
        $post = $_POST;
        //将post数据插入grade表中
        $result = g::add($post);
        //判断返回结果是否为真,提示不同消息
        if ($result){
            return $this->redirect('index.php?s=admin/grade/index')->message('班级添加成功');
        }else{
            return $this->redirect()->message('班级添加失败');
        }
    }


    /**
     * 跳转删除方法
     */
    public function delete(){
        //获取需要删除班级的id
        $id = $_GET['id'];
        $result = g::delete($id);
        //判断返回结果是否为真,提示不同消息并跳转或返回
        if ($result){
            return $this->redirect('index.php?s=admin/grade/index')->message('班级数据删除成功');
        }else{
            return $this->redirect()->message('班级数据删除失败');
        }

    }


    public function ajaxDelete(){
        //获取get参数中的需要删除的班级id
        $id = $_GET['id'];
        //将对应$id的班级数据删除
        $result = g::delete($id);
        //判断$result返回结果是否为真,来返回给前台不同的处理结果
        if ($result){
            //如果为真,代表删除成功
            return json_encode(['valid' => 1,'message' => '班级数据删除成功']);
        }else{
            //为假,代表删除失败
            return json_encode(['valid' => 0,'message' => '班级数据删除失败']);
        }
    }
    //定义编辑方法
    public function edit()
    {
        if($_POST)
        {
            //找到id为k数据
            g::find($_GET["k"]);
            //将传输过来数据保存
            $post["gname"]=$_POST["gname"];
            $post["renshu"]=$_POST["renshu"];
            //调用数据库中更新语句
            $result=g::edit($post);
            if ($result){
                return $this->redirect('index.php?s=admin/grade/index')->message('班级数据编辑成功');
            }else{
                return $this->redirect()->message('班级数据编辑失败');
            }

        }

        $data=g::find($_GET["k"])->toArray();
        return View::make()->with("data",$data);
    }





}







?>