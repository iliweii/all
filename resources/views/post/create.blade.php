<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://blog.honghong520.xyz/css/style-main.css">
    <link rel="shortcut icon" href="https://honghong520.xyz/img/blog.ico" />
    <script src="https://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>写博客^_^</title>
</head>
<body>
<div id="nav">
</div>
<a href="https://csdn.design/posts" class="write_a">
    <img src="https://honghong520.xyz/img/home.png" title="回主页">
</a>
<form action="../posts" method="post" enctype="multipart/form-data">
    @csrf
    <div class='main'>
        <input type="text" name='title' placeholder='标题' class="dbtitle">
        <textarea id="textarea" Oninput="Oninput(event)" type="text" name='content' placeholder='内容' class="dbcontent"></textarea>
        <input type="file" name="file" id="file" style="margin-left: 20px;"  accept="image/png, image/jpeg, image/gif, image/jpg, image/x-icon" >
        <label for="file" class='dbfile'>->选择一张美美的图片<-</label>
        <input type="text" readonly name="user" value='' class="dbuser">
        <input type="submit" value="发表" class="dbsub">
    </div>
</form>

<script>
    var textarea = document.getElementById('textarea').scrollHeight;
    document.getElementById('textarea').style.height=textarea+"px";
    function Oninput (event) {
        var textarea = document.getElementById('textarea').scrollHeight;
        if(textarea > 300)
            textarea -= 100;
        document.getElementById('textarea').style.height=textarea+"px";
        var distance = $('textarea').scrollTop(); //获取滚动条初始高度的值
        if(distance) {
            var textarea = document.getElementById('textarea').scrollHeight;
            document.getElementById('textarea').style.height=distance+textarea+"px";
        }
    }
</script>
</body>
</html>