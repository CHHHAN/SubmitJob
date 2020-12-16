<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="stylesheet" href="boot.css" >
<body>
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <h1> 上传结果 <small>Upload results</small></h1>
            </h3>
        </div>
        <div class="panel-body">
            <div class="panel-body">
<?php

//获取专业名称
$filename = "./info.txt";
$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
$contents = fread($handle, filesize ($filename));
fclose($handle);
$info = explode("|",$contents);
$work = $info[1];

//是否开启？
if($info[0] == "关闭"){
    echo "<script>alert('现在不能交作业！！');history.go(-1);</script>";
    return;
}

//名单判断
$class = explode("-",$info[3]);

$i = 0;
for($i = 0; $i < count($class); $i++ ){
    if($class[$i] == $_POST["id"]){
        $n = true;
        break;
    } else {
        $n = false;
    }
}

if($n == false){
    echo "<script>alert('姓名不存在！');history.go(-1);</script>";
    return;
}

//取文件信息
$arr = $_FILES["file"];

//加限制条件
if(($arr["type"]=="image/jpeg" || $arr["type"]=="image/png" ) && $arr["size"]<1024000000 ){
    
    //临时文件的路径
    //echo "临时文件目录：".$arr["tmp_name"];
    
    //获取文件后缀
    $ss = explode(".",$arr["name"]);
    //上传的文件存放的位置
    $filename = "./works/".$work."/".$_POST["id"].'/'.time().'.'.$ss[1];
    $url = "https://qr.chomin.ink/homework/works/".$work."/".$_POST["id"].'/'.time().'.'.$ss[1];
    
    //判断文件夹是否存在
    if(is_dir("./works/".$work."/".$_POST["id"]))
    {
        move_uploaded_file($arr["tmp_name"],$filename);
        echo '<div class="alert alert-success" role="alert">';
        echo "<h3><b>上传成功！请关闭页面！<br></b></h3><br>";
        echo "<b>姓名：".$_POST["id"]."！<br></b>";
        echo "<b>专业名称：".$work."！<br></b>";
        echo "<b>上传位置：".$filename."！<br></b>";
        echo "<b>链接："."<a href=".$url.">".$url."</a><br></b>";
        echo '<br/><font style="color: red">请关闭页面，<b>请勿重复提交！</b></font></div>';
        
    } else {
        mkdir("./works/".$work."/".$_POST["id"], 0777);
        move_uploaded_file($arr["tmp_name"],$filename);
        echo '<div class="alert alert-success" role="alert">';
        echo "<h3><b>上传成功！请关闭页面！<br></b></h3><br>";
        echo "<b>姓名：".$_POST["id"]."！<br></b>";
        echo "<b>专业名称：".$work."！<br></b>";
        echo "<b>上传位置：".$filename."！<br></b>";
        echo "<b>链接："."<a href=".$url.">".$url."</a><br></b>";
        echo '<br/><font style="color: red">请关闭页面，<b>请勿重复提交！</b></font></div>';
    }
}else{
    echo "<script>alert('上传的文件大小或类型不符！');history.go(-1);</script>";
    return;
}
?>
</div>
</div>
</body>