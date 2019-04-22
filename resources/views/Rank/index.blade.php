<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/ranking-style-main.css">
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
        $(document).scroll(function(){
            var distance = $(document).scrollTop();
            if(distance < 300) {
                document.getElementById('nav_SA').style.boxShadow="0 0 0";
            } else if(distance < 800) {
                document.getElementById('nav_SA').style.boxShadow="inset orangered 0 0 50px";
                document.getElementById('nav_SB').style.boxShadow="0 0 0";
            } else if(distance < 1200) {
                document.getElementById('nav_SA').style.boxShadow="0 0 0";
                document.getElementById('nav_SB').style.boxShadow="inset orangered 0 0 20px";
                document.getElementById('nav_TS').style.boxShadow="0 0 0";
            } else if(distance < 2200){
                document.getElementById('nav_SB').style.boxShadow="0 0 0";
                document.getElementById('nav_TS').style.boxShadow="inset orangered 0 0 20px";
                document.getElementById('nav_LD').style.boxShadow="0 0 0";
                document.getElementById('nav_BG').style.boxShadow="0 0 0";
            } else {
                document.getElementById('nav_TS').style.boxShadow="0 0 0";
                document.getElementById('nav_LD').style.boxShadow="inset orangered 0 0 20px";
                document.getElementById('nav_BG').style.boxShadow="inset orangered 0 0 20px";
            }
        })

    </script>

    <title>排行榜</title>
</head>
<body>
    <div class="nav-pc" id="nav">
        <a href="https://youth.sdut.edu.cn" target="_blank" class="nav_logo"> <img src="/public/img/youthol_logo.png"></a>
        <a href="#studentA" class="nav_a" id="nav_SA"> 学生甲组 </a>
        <a href="#studentB" class="nav_a" id="nav_SB"> 学生乙组 </a>
        <a href="#teachers" class="nav_a" id="nav_TS"> 教职工组 </a>
        <a href="#lineDance" class="nav_a" id="nav_LD"> 排舞比赛 </a>
        <a href="#BroadcastGymnastics" class="nav_a"  id="nav_BG"> 广播体操比赛 </a>
    </div>
    <div class="nav-phone" id="nav">
        <input type="checkbox" class="nav__cb" id="menu-cb">
        <div class="nav__content">
            <ul class="nav__items">
                <li class="nav__item"> <a href="#studentA" class="nav-phone_a nav__item"> <span class="nav__item-text"> 学生甲组 </span> </a> </li>
                <li class="nav__item"> <a href="#studentB" class="nav-phone_a nav__item"> <span class="nav__item-text"> 学生乙组 </span> </a> </li>
                <li class="nav__item"> <a href="#teachers" class="nav-phone_a nav__item"> <span class="nav__item-text"> 教职工组 </span> </a> </li>
                <li class="nav__item"> <a href="#lineDance" class="nav-phone_a nav__item"> <span class="nav__item-text"> 排舞比赛 </span> </a> </li>
                <li class="nav__item"> <a href="#BroadcastGymnastics" class="nav-phone_a nav__item"> <span class="nav__item-text"> 广播体操赛 </span> </a> </li>
            </ul>
        </div>
        <label class="nav__btn" for="menu-cb"></label>
    </div>
    <div class="banner">
        <h1 class="banner_h1">山理春季运动会实时排行榜</h1>
    </div>
    <a href="ranking/submit">submit</a>
    <div class="studentA" id="studentA">
        <h2>学生甲组</h2>
        <div class="studentBlock">
            <div class="studentRank">
                <h3>男生甲组</h3>
                <div class="items">
                    <div class="item">
                        <h4>100米</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">小明
                        </div>
                    </div>
                    <div class="item">
                        <h4>200米</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">小黄
                        </div>
                    </div>
                    <div class="item">
                        <h4>400米</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">小宏
                        </div>
                    </div>
                    <div class="item">
                        <h4>800米</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">小栏
                        </div>
                    </div>
                    <div class="item">
                        <h4>1500米</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">小紫
                        </div>
                    </div>
                    <div class="item">
                        <h4>5000米</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">小绿
                        </div>
                    </div>
                    <div class="item">
                        <h4>110米栏(栏高91.4cm)</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">---
                        </div>
                    </div>
                    <div class="item">
                        <h4>4x100米接力</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">---
                        </div>
                    </div>
                    <div class="item">
                        <h4>4x400米接力</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">---
                        </div>
                    </div>
                    <div class="item">
                        <h4>铅球(7.26kg)</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">---
                        </div>
                    </div>
                    <div class="item">
                        <h4>垒球掷远</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">小黑
                        </div>
                    </div>
                    <div class="item">
                        <h4>跳高</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">小明
                        </div>
                    </div>
                    <div class="item">
                        <h4>跳远</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">小明
                        </div>
                    </div>
                    <div class="item">
                        <h4>三级跳远</h4>
                        <div class="trophy">
                            <img src="/public/img/trophy.png">小明
                        </div>
                    </div>
                </div>
            </div>
            <div class="studentRank">
                <h3>女子甲组</h3>
                <div class="items">
                    <div class="item"><h4>100米</h4></div>
                    <div class="item"><h4>200米</h4></div>
                    <div class="item"><h4>400米</h4></div>
                    <div class="item"><h4>800米</h4></div>
                    <div class="item"><h4>1500米</h4></div>
                    <div class="item"><h4>5000米</h4></div>
                    <div class="item"><h4>110米栏(栏高76.2cm)</h4></div>
                    <div class="item"><h4>4x100米接力</h4></div>
                    <div class="item"><h4>4x400米接力</h4></div>
                    <div class="item"><h4>铅球(4kg)</h4></div>
                    <div class="item"><h4>垒球掷远</h4></div>
                    <div class="item"><h4>跳高</h4></div>
                    <div class="item"><h4>跳远</h4></div>
                    <div class="item"><h4>三级跳远</h4></div>
                </div>
            </div>
            <div class="studentRank">
                <h3>混合组</h3>
                <div class="items">
                    <div class="item"><h4>师生4X100米混合接力</h4></div>
                    <div class="item"><h4>师生8字跳绳</h4></div>
                    <div class="item"><h4>学生拔河</h4></div>
                    <div class="item"><h4>学生体质测试四项赛</h4></div>
                </div>
            </div>
        </div>
    </div>
    <div class="studentB" id="studentB">
        <h2>学生乙组</h2>
        <div class="studentBlock">
            <div class="studentRank">
                <h3>男生乙组</h3>
                <div class="items">
                    <div class="item"><h4>100米</h4></div>
                    <div class="item"><h4>400米</h4></div>
                    <div class="item"><h4>800米</h4></div>
                    <div class="item"><h4>4x100米接力</h4></div>
                    <div class="item"><h4>铅球(7.26kg)</h4></div>
                    <div class="item"><h4>垒球掷远</h4></div>
                    <div class="item"><h4>跳高</h4></div>
                    <div class="item"><h4>跳远</h4></div>
                    <div class="item"><h4>三级跳远</h4></div>
                </div>
            </div>
            <div class="studentRank">
                <h3>女生乙组</h3>
                <div class="items">
                    <div class="item"><h4>100米</h4></div>
                    <div class="item"><h4>400米</h4></div>
                    <div class="item"><h4>800米</h4></div>
                    <div class="item"><h4>4x100米接力</h4></div>
                    <div class="item"><h4>铅球(4kg)</h4></div>
                    <div class="item"><h4>垒球掷远</h4></div>
                    <div class="item"><h4>跳高</h4></div>
                    <div class="item"><h4>跳远</h4></div>
                    <div class="item"><h4>三级跳远</h4></div>
                </div>
            </div>
            <div class="collegeRank">
                <h2>学院排行榜</h2>
            </div>
        </div>
    </div>
    <div class="teachers" id="teachers">
        <h2>教职工男子组</h2>
        <div class="teacherBlock">
            <div class="teacherRank">
                <h3>教职工男子A组</h3>
                <div class="items">
                    <div class="item"><h4>100米</h4></div>
                    <div class="item"><h4>1200米</h4></div>
                    <div class="item"><h4>推铅球(5kg)</h4></div>
                    <div class="item"><h4>跳远</h4></div>
                    <div class="item"><h4>足球射准</h4></div>
                    <div class="item"><h4>定点投篮</h4></div>
                    <div class="item"><h4>自行车慢骑(25米)</h4></div>
                </div>
            </div>
            <div class="teacherRank">
                <h3>教职工男子B组</h3>
                <div class="items">
                    <div class="item"><h4>100米</h4></div>
                    <div class="item"><h4>1200米</h4></div>
                    <div class="item"><h4>推铅球(5kg)</h4></div>
                    <div class="item"><h4>立定跳远</h4></div>
                    <div class="item"><h4>足球射准</h4></div>
                    <div class="item"><h4>定点投篮</h4></div>
                    <div class="item"><h4>自行车慢骑(25米)</h4></div>
                </div>
            </div>
            <div class="teacherRank">
                <h3>教职工男子不分年龄组</h3>
                <div class="items">
                    <div class="item"><h4>前抛实心球(2kg)</h4></div>
                    <div class="item"><h4>4X100米接力</h4></div>
                    <div class="item"><h4>4人踢毽子</h4></div>
                    <div class="item"><h4>2人跳绳</h4></div>
                </div>
            </div>
        </div>
    </div>
    <div class="teachers" id="teachers">
        <h2>教职工女子组</h2>
        <div class="teacherBlock">
            <div class="teacherRank">
                <h3>教职工女子A组</h3>
                <div class="items">
                    <div class="item"><h4>100米</h4></div>
                    <div class="item"><h4>800米</h4></div>
                    <div class="item"><h4>推实心球(2kg)</h4></div>
                    <div class="item"><h4>跳远</h4></div>
                    <div class="item"><h4>排球发球</h4></div>
                    <div class="item"><h4>定点投篮</h4></div>
                    <div class="item"><h4>自行车慢骑(25米)</h4></div>
                </div>
            </div>
            <div class="teacherRank">
                <h3>教职工女子B组</h3>
                <div class="items">
                    <div class="item"><h4>100米</h4></div>
                    <div class="item"><h4>800米</h4></div>
                    <div class="item"><h4>排球发球</h4></div>
                    <div class="item"><h4>定点投篮</h4></div>
                    <div class="item"><h4>自行车慢骑(25米)</h4></div>
                </div>
            </div>
            <div class="teacherRank womanTeacher">
                <h3>教职工女子不分年龄组</h3>
                <div class="items">
                    <div class="item"><h4>前抛实心球(2kg)</h4></div>
                    <div class="item"><h4>4X100米接力</h4></div>
                    <div class="item"><h4>4人踢毽子</h4></div>
                    <div class="item"><h4>2人跳绳</h4></div>
                </div>
            </div>
        </div>
    </div>
    <div class="teachers mixedTeacher" id="teachers">
        <div class="mixedTeacherRank">
            <h3>教职工混合组</h3>
            <div class="items">
                <div class="item"><h4>搭桥过河</h4></div>
                <div class="item"><h4>"十二字"接力</h4></div>
                <div class="item"><h4>飞镖比赛</h4></div>
            </div>
        </div>
    </div>
    <div class="LD_BG">
        <div class="lineDance" id="lineDance"><h2>排舞比赛</h2></div>
        <div class="BroadcastGymnastics" id="BroadcastGymnastics"><h2>广播体操比赛</h2></div>
    </div>
    <div class="footer"></div>

</body>
</html>