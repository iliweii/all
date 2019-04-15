<?php

namespace App\Http\Controllers;
header('Access-Control-Allow-Origin:*');
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class college{
    public $college;
    public $gold = 0;
    public $silver = 0;
    public $bronze = 0;
    public $sum = 0;
}
class item{
    public $college;
    public $name;
    public $score;
    public $place;
}
class RankController extends Controller
{
    public function index()
    {
        $schedule = DB::select("SELECT * FROM `table2`");
        echo(json_encode($schedule));
        return;
    }

    public function list()
    {
        $total = DB::select("SELECT * FROM `table1` ORDER BY item");

        /** 这里内容可修改 */
        $college_num = 4; // 学院总数
        $item_num = DB::table('table4')->count(); // 项目总数
        $list_num = 6; // 排行榜限定人数

        for($i = 1 ;$i <= $college_num; $i++) // 创建学院排行榜数组
        {
            $college[$i] = new college;
            $college[$i]->college = $i;
        }
        $temp = new college;
        for($i = 1 ;$i <= $item_num; $i++) // 创建公告项目排行榜数组
        {
            for($j = 1; $j <= $list_num; $j++) // 第二维指榜单有六个人
            {
                $item[$i][$j] = new item;
            }
        }
        foreach($total as $one) // 将成绩总表里de数据按照项目id化成数组
        {
            $item[$one->item][$one->place]->college = $one->college;
            $item[$one->item][$one->place]->name = $one->name;
            $item[$one->item][$one->place]->score = $one->score;
            $item[$one->item][$one->place]->place = $one->place;
        }

        for($i = 1; $i <= $college_num; $i++) // 统计学院奖牌数
        {
            for($j = 0; $j < DB::table('table1')->count(); $j++)
            {
                if ($total[$j]->college == $i) {
                    switch ($total[$j]->place) {
                        case 1: $college[$i]->gold++; $college[$i]->sum++; break;
                        case 2: $college[$i]->silver++; $college[$i]->sum++; break;
                        case 3: $college[$i]->bronze++; $college[$i]->sum++; break;
                    }
                }
            }
        }
        for($i = 1; $i <= $college_num; $i++) // 根据学院奖牌数排序
        {
            for ($j = 1; $j <= $college_num - $i; $j++) {
                if ($college[$j]->gold < $college[$j + 1]->gold) {
                    $temp = $college[$j];
                    $college[$j] = $college[$j + 1];
                    $college[$j + 1] = $temp;
                } else if ($college[$j]->gold == $college[$j + 1]->gold) {
                    if ($college[$j]->silver < $college[$j + 1]->silver) {
                        $temp = $college[$j];
                        $college[$j] = $college[$j + 1];
                        $college[$j + 1] = $temp;
                    } else if ($college[$j]->silver == $college[$j + 1]->silver) {
                        if ($college[$j]->bronze < $college[$j + 1]->bronze) {
                            $temp = $college[$j];
                            $college[$j] = $college[$j + 1];
                            $college[$j + 1] = $temp;
                        }
                    }
                }
            }
        }
        for($i = 0; $i < $college_num; $i++) // 对象转化为数组格式
            $college_[$i] = $college[$i+1];
        echo(json_encode($college_));
        return;
    }

    public function submit()
    {
        return view("Temp/submit");
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if($input['submit'] == "提交赛程") { // 提交赛程状态
            DB::insert('INSERT INTO table2 (item, state, `time`, `year`) VALUES (?, ?, ?, "2019")', [
                $input['item'],
                $input['state'],
                $input['time']
            ]);
        } else { // 提交成绩状态
            for($i = 1; $i <= 6; $i++)
            {
                DB::insert('INSERT INTO table1 (college, item, `name`, score, place) VALUES (?, ?, ?, ?, ?)', [
                    $input['college'.$i],
                    $input['item'.$i],
                    $input['name'.$i],
                    $input['score'.$i],
                    $input['place'.$i]
                ]);
            }
        }
        return redirect('/temp');
    }

    public function search($post)
    {
        $total = DB::select("SELECT * FROM `table1` WHERE item = ? ORDER BY item", [$post]);
        for($i = 0; $i < 6; $i++)
            for($j = 0; $j < 6-$i-1; $j++)
                if($total[$j]->place > $total[$j+1]->place) {
                    $temp = $total[$j];
                    $total[$j] = $total[$j+1];
                    $total[$j+1] = $temp;
                }
        echo(json_encode($total));
    }
    /**  原始代码
//    public function index()
//    {
//        $total = DB::select("SELECT * FROM `table1` ORDER BY item");
//        $schedule = DB::select("SELECT * FROM `table2`");
//        $items = DB::select("SELECT * FROM `table4`");
//
//
//        $college_num = 4; // 学院总数
//        $item_num = DB::table('table4')->count(); // 项目总数
//        $list_num = 6; // 排行榜限定人数
//
//        for($i = 0 ;$i <= $college_num; $i++) // 创建学院排行榜数组
//        {
//            $college[$i] = new college;
//            $college[$i]->college = $i;
//        }
//        for($i = 1 ;$i <= $item_num; $i++) // 创建公告项目排行榜数组
//        {
//            for($j = 1; $j <= $list_num; $j++) // 第二维指榜单有六个人
//            {
//                $item[$i][$j] = new item;
//            }
//        }
//        foreach($total as $one) // 将成绩总表里de数据按照项目id化成数组
//        {
//            $item[$one->item][$one->place]->college = $one->college;
//            $item[$one->item][$one->place]->name = $one->name;
//            $item[$one->item][$one->place]->score = $one->score;
//            $item[$one->item][$one->place]->place = $one->place;
//        }
//
//        for($i = 1; $i <= $college_num; $i++) // 统计学院奖牌数
//        {
//            for($j = 0; $j < DB::table('table1')->count(); $j++)
//            {
//                if ($total[$j]->college == $i) {
//                    switch ($total[$j]->place) {
//                        case 1: $college[$i]->gold++; $college[$i]->sum++; break;
//                        case 2: $college[$i]->silver++; $college[$i]->sum++; break;
//                        case 3: $college[$i]->bronze++; $college[$i]->sum++; break;
//                    }
//                }
//            }
//        }
//        for($i = 1; $i <= $college_num; $i++) // 根据学院奖牌数排序
//        {
//            for ($j = 1; $j <= $college_num - $i; $j++) {
//                if ($college[$j]->gold < $college[$j + 1]->gold) {
//                    $college[0] = $college[$j];
//                    $college[$j] = $college[$j + 1];
//                    $college[$j + 1] = $college[0];
//                } else if ($college[$j]->gold == $college[$j + 1]->gold) {
//                    if ($college[$j]->silver < $college[$j + 1]->silver) {
//                        $college[0] = $college[$j];
//                        $college[$j] = $college[$j + 1];
//                        $college[$j + 1] = $college[0];
//                    } else if ($college[$j]->silver == $college[$j + 1]->silver) {
//                        if ($college[$j]->bronze < $college[$j + 1]->bronze) {
//                            $college[0] = $college[$j];
//                            $college[$j] = $college[$j + 1];
//                            $college[$j + 1] = $college[0];
//                        }
//                    }
//                }
//            }
//        }
//
//        return view("Temp/index",[
//            'college_num' => $college_num,
//            'item_num' => $item_num,
//            'list_num' => $list_num,
//            'schedule' => $schedule,
//            'college' => $college,
//            'items' => $items,
//            'item' => $item
//        ]);
//    } */
}