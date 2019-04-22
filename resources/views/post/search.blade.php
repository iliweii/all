<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://blog.honghong520.xyz/css/style-main.css">
    <link rel="stylesheet" href="https://blog.honghong520.xyz/css/search.css">
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
    <title>搜索页面</title>
</head>
<body>
<div id="nav">
</div>

{{--@if($rows)--}}
    {{--<h1>搜索无结果！</h1>--}}
    {{--@elseif--}}
    <h1>搜索结果：</h1>
    {{--@endif--}}
<a href="https://csdn.design/posts" class="write_a">
    <img src="https://honghong520.xyz/img/home.png" title="回主页">
</a>
<a href="#nav" class="back_a" id="back" style="display: none;">
    <div class="back">^</div>
</a>
    <div class="blogs">
        @foreach ($rows as $row)
            <div class="row">
                <a class="check" title="点击查看详情->{{$row->title}}" href="./posts/{{$row->id}}">
                    <div class="blog"  style="background-image: url(https://csdn.design/storage/app/public/uploads/{{$row->imgName}}); background-size: 100%;">
                        <div class="blog_1">
                            <div class="writer">{{$row->user}}</div>
                            <div class="time">“最后编辑于{{date( "Y-m-d H:i:s", $row->mtime)}}”</div>
                        </div>
                        <div class="blog_2">{{$row->title}}</div>
                        <div class="blog_3">{{$row->content}}</div>
                    </div>
                </a>

                <div class='cop'>
                    <form action='../posts/delete' method='post'>
                        @csrf
                        <input type='text' name='id' value='{{$row->id}}' style='display:none;'>
                        <input type='submit' value='删' class='del' title='删除'>
                    </form>
                    <a href="../posts/{{$row->id}}/edit"><div class='gai'>改</div></a>
                </div>
            </div>
        @endforeach

        <div class="blogs_bot">
            <a href=""></a>
        </div>

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
</body>
</html>