<h1>学院排行榜</h1>
@for($i = 1; $i <= 4 ; $i++)
    名次:{{$i}}；
    学院id：{{$college[$i]->id}}；
    金：{{$college[$i]->gold}}；
    银：{{$college[$i]->silver}}；
    铜：{{$college[$i]->bronze}}；
    总数：{{$college[$i]->sum}}
    <br>
@endfor

<h1>公告</h1>
@for($i = 1; $i <= $item_num; $i++)
    <h3>项目名字：{{$items[$i-1]->item}}</h3>
    @for($j = 1; $j <= $list_num; $j++)
        学院id:{{$item[$i][$j]->college}}；
        姓名:{{$item[$i][$j]->name}}；
        成绩:{{$item[$i][$j]->score}}；
        名次:第{{$item[$i][$j]->place}}名；
        <br>
    @endfor
@endfor

<h1>赛程</h1>
@foreach($schedule as $one)
    [{{$one->state}}]
    项目id:{{$one->item}}；
    {{$items[$one->item-1]->item}};
    时间：{{$one->time}}；
    <br>
@endforeach
<br>

<a href="temp/submit">提交赛程和成绩点这里</a>
