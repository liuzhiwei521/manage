<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse" style="border-radius: 0">
    <div class="container">
        <a class="btn btn-primary btn-lg active" href="index.php?s=admin/login/loginForm">学生后台</a>
    </div>
</nav>
    <div class="container">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>id</th>
                <th>姓名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>班级</th>
                <th>个人简介</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($stu as $k => $v) {
                ?>
                <tr>
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['name']; ?></td>
                    <td><?php echo $v['sex']; ?></td>
                    <td><?php echo $v['age']; ?></td>
                    <td><?php echo $v['gid']; ?></td>
                    <td><?php echo $v['jieshao']; ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="index.php?s=home/entry/show&id=<?php echo $v['id']?>" class="btn btn-info">查看</a>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
    </div>
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="http://www.houdunwang.com">houdunwang.com</a></li>
                    <li><a href="http://www.nickblog.cn">nickblog.cn</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>

    </body>
</html>