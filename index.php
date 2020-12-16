<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="boot.css" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>🎉 欢乐时光：快来交作业！</title>
</head>
<body>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <h1>作业提交页<br></h1>
            </h3>
        </div>
        <div class="panel-body">
            <div class="panel-body">
      
      <div class="alert alert-info" role="alert">


      
    <?php
    //获取专业名称
    $filename = "./info.txt";
    $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    $contents = fread($handle, filesize ($filename));
    fclose($handle);
    $info = explode("|",$contents);
    $work = $info[1];
    echo "<b>Tips：<font style='color:red'>".$info[2]."</b></font></div>";
    echo '<div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title"><b>专业名称：'.$work."</h3></b></div>";
    ?>
    
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="updata.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">姓名：</span>
                    <input style="width: 120px" type="text" class="form-control" placeholder="请输入姓名" aria-describedby="basic-addon1" name="id" />
                </div><br>
                    <input type="file" name="file" />
                    <br>
                    <input type="submit" value="上传！！" />
            </form>
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="alert alert-success" role="alert">
                <?php
                $arr = getDirContent('./works/'.$work);
                echo "<b>已上传：".count($arr)." 位</b><br>";
                for ($i = 0; $i < count($arr); $i ++){
                    echo $arr[$i]."<br>";
                }
                
                function getDirContent($path){
                    if(!is_dir($path)){
                        return false;
                    }
                $arr = array();
                $data = scandir($path);
                foreach ($data as $value){
                    if($value != '.' && $value != '..'){
                        $arr[] = $value;
                    }
                }
                return $arr;
                }
                ?>
                
                <br/><b><font style='color:red'>若要修改，请私聊我~</font></b>
            </div>
        </div>
    </div>
  </div>
</div>
        </div>
    </div>

</body>
</html>