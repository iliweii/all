<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://blog.honghong520.xyz/css/style-main.css">
    <link rel="shortcut icon" href="https://honghong520.xyz/img/blog.ico" />
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- 返回顶部滑动特效 -->
    <script src="https://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
    <script>
        $(function(){
            $('a[href*=#],area[href*=#]').click(function() {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var $target = $(this.hash);
                    $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
                    if ($target.length) {
                        var targetOffset = $target.offset().top;
                        $('html,body').animate({
                                scrollTop: targetOffset
                            }, 1000);
                        return false;
                    }}});})
    </script>
    <script>
        $(document).scroll(function(){   //页面被加载时，获取滚动条初始高度
            var distance = $(document).scrollTop(); //获取滚动条初始高度的值
            if(distance > 400) {  //滚动条高度大于500px,显现元素
                $('#back').show(300);
            } else {  //隐藏元素
                $('#back').hide(300);
            }
        })
    </script>
    <title>{{$blog->title}} -- honghong520</title>
</head>
<body>
<div id="nav">

</div>

<a href="https://csdn.design/posts" class="write_a">
    <img src="https://honghong520.xyz/img/home.png" title="回主页">
</a>
<a href="#message" class="write_a">
    <div class="write">留</div>
</a>
<a href="#nav" class="back_a" id="back" style="display: none;">
    <div class="back">^</div>
</a>

<div class='main'>
    <div class="chtitle">{{$blog->title}}{{' '}}“创建于{{date( "m月d日 H:i", $blog->intime)}}”</div>
    <textarea id="textarea" readonly class="chcontent">{{$blog->content}}</textarea>
    @if($blog->imgName)
    <div class="chdiv">
        <img src="../storage/app/public/uploads/{{$blog->imgName}}" alt="" class="chimg">
    </div>
    @endif
    <div class="chbottom">
        <input readonly class="chuser" value="by{{$blog->user}}">
        <form action='../posts/delete' method='post'>
            @csrf
            <input type='text' name='id' value='{{$blog->id}}' style='display:none;'>
            <input type='submit' value='删' class='chuser' title='删除'>
        </form>
        <a href="../posts/{{$blog->id}}/edit"><div class='chuser'>改</div></a>
    </div>
</div>

<div class="check_bottom" id="message">
    <div class="message">
        @foreach($messages as $message)
        <div class="mes_row">
            <div>
                <h3>{{$message->username}}</h3>
                <h4>{{date( "Y-m-d H:i:s", $message->intime)}}</h4>
            </div>
            <textarea readonly>{{$message->content}}</textarea>
        </div>
        @endforeach
    </div>

    <form action="./{{$blog->id}}/message" method="post">
        @csrf
        <div class="write_message">
            <div>
                <h2>写留言:</h2>
                <textarea type="text" name="content" placeholder="留言内容" class="mescontent"></textarea>
                <input type="text"  readonly name="username" value='' class="mesuser">
                <input type="submit" value="发表" class="messub">
                <input type='text' name='id' value='{{$blog->id}}' style='display:none;'>
            </div>
        </div>
    </form>
</div>

<script>
    var textarea = document.getElementById('textarea').scrollHeight;
    console.log(textarea);
    document.getElementById('textarea').style.height=textarea+"px";

</script>

</body>
</html>