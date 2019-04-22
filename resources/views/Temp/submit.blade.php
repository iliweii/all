<h1>提交赛程</h1>
<form action="/temp" method="post" enctype="multipart/form-data">

    <input type="text" name='item' placeholder='项目(下拉框，值为编号)'>
    <input type="text" name='state' placeholder='状态(值为预赛或者决赛)'>
    <input type="text" name='time' placeholder='比赛时间'>
    <input type="submit" name="submit" value="提交赛程">
</form>
<h1>提交成绩</h1>
<form action="/temp" method="post" enctype="multipart/form-data">
    <?php echo(csrf_token()) ?>
    @for($i = 1; $i <= 6; $i++)
        第{{$i}}名
        <input type="text" name='college{{$i}}' placeholder='学院(下拉框，值为编号)'>
        <input type="text" name='item{{$i}}' placeholder='项目(下拉框，值为编号)'>
        <input type="text" name='name{{$i}}' placeholder='参赛者姓名'>
        <input type="text" name='score{{$i}}' placeholder='成绩'>
        <input type="text" name='place{{$i}}' value="{{$i}}" readonly>
        <br>
    @endfor
    <input type="submit" name="submit" value="提交成绩">
</form>
