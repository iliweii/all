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
                console.log(this.pathname)
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var $target = $(this.hash);
                    $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
                    if ($target.length) {
                        var targetOffset = $target.offset().top;
                        $('html,body').animate({
                            scrollTop: targetOffset
                        }, 1000);
                        return false;}}});})
    </script>

    <title>威威和红红的博客 :-)</title>
</head>
<body>
<div id="nav">
    <a href='https://blog.honghong520.xyz/login-visitor.php'><button>游客登录</button>登录暂时仅能记录游客访问记录，登录后创建COOKIE，半个小时内不能重复登陆</a>
</div>

<div class='search'>
    <form action="./posts/search" method="post">
        @csrf
        <input type="text" name="searcher" placeholder="查找内容" class='search_txt'>
        <select name="class" onchange="show_sub(this.options[this.options.selectedIndex].value)" class="search_sel">
            <option value='id'>id</option>
            <option value="title">title</option>
            <option value="content" selected>content</option>
            <option value="user">user</option>
        </select>
        <input type="submit" value="查找" class='search_sub'>
    </form>
</div>

<a href="./posts/create" class="write_a">
    <div class="write">写</div>
</a>
<a href="#nav" class="back_a" id="back" style="display: none;">
    <div class="back">^</div>
</a>

<div class="content">
    <div class="blogs">
        @foreach ($rows as $row)
        <div class="row">
            <a class="check" title="点击查看详情->{{$row->title}}" href="./posts/{{$row->id}}">
                <div class="blog"  style="background-image: url(./storage/app/public/uploads/{{$row->imgName}}); background-size: 100%;">
                    <div class="blog_1">
                        <div class="writer">{{$row->user}}</div>
                        <div class="time">“最后编辑于{{date( "Y-m-d H:i:s", $row->mtime)}}”</div>
                    </div>
                    <div class="blog_2">{{$row->title}}</div>
                    <div class="blog_3">{{$row->content}}</div>
                </div>
            </a>

            <div class='cop'>
                <form action='/posts/delete' method='post'>
                    @csrf
                    <input type='text' name='id' value='{{$row->id}}' style='display:none;'>
                    <input type='submit' value='删' class='del' title='删除'>
                </form>
                <a href="./posts/{{$row->id}}/edit"><div class='gai'>改</div></a>
            </div>
        </div>
        @endforeach

        <div class="blogs_bot">
            <a href=""></a>
        </div>

    </div>

    <div class="user">
        <a href="./me.html">
            <img style="display: none;" src="https://cdn.v2ex.com/gravatar/e332a0a27f1c0364f11e5e6182580ce0?s=256&d=mm&r=g&_t=430639" alt="" class="ava">
        </a>

        <iframe style="visibility: hidden" src="//www.seniverse.com/weather/weather.aspx?uid=U894304DF4&cid=CHSD020000&l=zh-CHS&p=SMART&a=0&u=C&s=5&m=2&x=1&d=0&fc=&bgc=&bc=C6C6C6&ti=1&in=1&li=" frameborder="0" scrolling="no" width="200" height="300" allowTransparency="true"></iframe>

        <iframe style="visibility: hidden" frameborder="no" border="0" marginwidth="0" marginheight="0" width=280 height=86 src="//music.163.com/outchain/player?type=2&id=1319205010&auto=0&height=66"></iframe>

        <div class="record">
            <h3>最近访客: <button title="放大"><a href="https://blog.honghong520.xyz/visitor.php"><></a></button></h3>
            <div>
                <div class="record_left">
                    @foreach($record_left as $record)
                    <p>{{date( 'm/d', $record->intime )}}{{' '}}{{$record->user}}</p>
                    @endforeach
                </div>
                <div class="record_right">
                    @foreach($record_right as $record)
                    <p>{{date( 'm/d', $record->intime )}}{{' '}}{{$record->user}}</p>
                    @endforeach
                </div>
            </div>

            <h6>访客数量:{{$record_num}}</h6>
        </div>
    </div>
</div>

<div class="bottom">
    <h4>©2018-2019 by 威威&&红红.  鲁ICP备18050928号</h4>
    <h4>All rights reserved.</h4>
</div>

<script>
    function show_sub(v){
        //这里可以获取选择的什么内容
        ;
    }
</script>
<script>

    $(document).scroll(function(){   //页面被加载时，获取滚动条初始高度
        var distance = $(document).scrollTop(); //获取滚动条初始高度的值
        console.log(distance); //打印滚动条不同高度的未知的值
        if(distance > 400) {  //滚动条高度大于500px,显现元素
            //document.getElementById('back').style.display="block";
            $('#back').show(300);
        }
        else {  //隐藏元素
            //document.getElementById('back').style.display="none";
            $('#back').hide(300);
        }
    })
</script>

</body>
</html>