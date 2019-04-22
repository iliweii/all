<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/public/css/ranking-style-submit.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var i = 0;
        function add(){
            i++;
            document.getElementById("form").innerHTML += '<div id="div' + i + '">\n' + i +
                '<input type="text" name="name'+i+'" placeholder="姓名" class="name">\n' +
                '<select name="sex'+i+'" class="sex">\n' +
                '    <option value="男">男</option>\n' +
                '    <option value="女">女</option>\n' +
                '</select>\n' +
                '<input type="text" name="class'+i+'" placeholder="班级" class="class">\n' +
                '<input type="text" name="college'+i+'" placeholder="学院" class="college">\n' +
                '<input type="text" name="item'+i+'" placeholder="项目" class="item">\n' +
                '<input type="text" name="score'+i+'" placeholder="成绩" class="score">\n' +
                '<input type="text" name="time'+i+'" placeholder="时间" class="time">\n' +
                '<input type="text" name="remark'+i+'" placeholder="备注（可不填）" class="remark">\n' +
                '<input type="number" name="number" value="' + i + '" readonly>' +
            '</div>';
        }
        function Delete() {
            document.getElementById("div" + i).parentNode.removeChild(document.getElementById("div" + i));
            if(i != 0)
                i--;
        }
    </script>
    <title>运动会成绩提交页</title>
</head>
<body>
{{$post}}
<button onclick="add()">点击添加</button>
<button onclick="Delete()">点击删除最后一条</button>
    <form action="../submit" method="post" id="form">
        @csrf
        <input type="submit" value="提交" class="submit">
    </form>
</body>