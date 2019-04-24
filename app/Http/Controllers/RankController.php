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
        $item_num = DB::table('table2')->count(); // 赛程总数
        for($i = 0; $i < $item_num; $i++) // 把表里的项目id转化为项目名称
        {
            $item_name = DB::select("SELECT * FROM `table4` WHERE id = ?", [
                $schedule[$i]->item
            ]);
            $schedule[$i]->item = $item_name[0]->item;
        }
        echo(json_encode($schedule));
        return;
    }

    public function list()
    {
        $total = DB::select("SELECT * FROM `table1` ORDER BY item");

        /** 这里内容可修改 */
        $college_num = 23; // 学院总数
        $item_num = DB::table('table4')->count(); // 项目总数
        $list_num = 6; // 排行榜限定人数

        for($i = 1 ;$i <= $college_num; $i++) // 创建学院排行榜数组
        {
            $college[$i] = new college;
            $college[$i]->college = $i;
        }
        $temp[][] = new college;
        foreach($total as $one) // 将成绩总表里de数据按照项目id化成数组
        {
            $item[$one->item][$one->place] = new item;
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
            $college_arr[$i] = $college[$i+1];
        for($i = 0; $i < $college_num; $i++) // 学院排行榜中的学院id换成学院名称
        {
            $college_name = DB::select("SELECT * FROM `colleges` WHERE id = ?", [
                $college_arr[$i]->college
            ]);
            $college_arr[$i]->college = $college_name[0]->name;
        }
        echo(json_encode($college_arr));
        return;
    }
    public function notice() // 公告（只有决赛）
    {
        $state = "决赛";
        $schedule = DB::select("select * from table2, table4 where table2.item=table4.id and table2.state=?", [$state]);
        echo(json_encode($schedule));
        return;
    }
    public function notice2() // 公告（只有决赛和提交过成绩的比赛项目）
    {
        $schedule = DB::select("select * from table2, table4 where table4.id in (select item from table2 A where exists (SELECT * from table1 WHERE table1.item = A.item) AND state = '决赛') and table2.item = table4.id");

        return json_encode($schedule);
}
    public function search($id) // 根据项目table2 id查询项目组成绩
    {
        $item = DB::select("SELECT * FROM table2 WHERE id = ?", [$id]);
        $total = DB::select("SELECT * FROM `table1` WHERE item = ? ORDER BY place", [$item[0]->item]);
        for($i = 0; $i < 6; $i ++) // 把成绩里学院id换成学院名称
        {
            $college_name = DB::select("SELECT * FROM `colleges` WHERE id = ?", [
                $total[$i]->college
            ]);
            $total[$i]->college = $college_name[0]->name;
        }
        echo(json_encode($total));
    }
    public function search5($id) // 根据项目table4 id查询项目组成绩
    {
        $item = DB::select("SELECT * FROM table2 WHERE item = ?", [$id]);
        $total = DB::select("SELECT * FROM `table1` WHERE item = ? ORDER BY place", [$item[0]->item]);
        for($i = 0; $i < 6; $i ++) // 把成绩里学院id换成学院名称
        {
            $college_name = DB::select("SELECT * FROM `colleges` WHERE id = ?", [
                $total[$i]->college
            ]);
            $total[$i]->college = $college_name[0]->name;
        }
        echo(json_encode($total));
    }
    public function search2($id) // 查询项目
    {
        $total = DB::select("SELECT * FROM `table2` WHERE id = ?", [$id]);
        $item_name = DB::select("SELECT * FROM `table4` WHERE id = ?", [
            $total[0]->item
        ]);
        $total[0]->item = $item_name[0]->item;
        echo(json_encode($total));
    }
    public function search3($name) // 根据项目名称查询项目组成绩
    {

        $total = DB::select('select table1.* from table2, table4, table1 where table2.item=table4.id and table4.id=table1.item and table2.state="决赛" and table4.item = ? order by table1.place', [
            $name
        ]);
        for($i = 0; $i < 6; $i ++) // 把成绩里学院id换成学院名称,项目id换成项目名
        {
            $college_name = DB::select("SELECT * FROM `colleges` WHERE id = ?", [
                $total[$i]->college
            ]);
            $total[$i]->college = $college_name[0]->name;
            $item_name = DB::select("SELECT * FROM `table4` WHERE id = ?", [
                $total[$i]->item
            ]);
            $total[$i]->item = $item_name[0]->item;
        }
        echo(json_encode($total));
    }
    public function search4($id) // 查询单个人的成绩
    {
        $total = DB::select("SELECT * FROM `table1` WHERE id = ?", [$id]);
        // 把成绩里学院id换成学院名称,项目id换成项目名
        $college_name = DB::select("SELECT * FROM `colleges` WHERE id = ?", [
            $total[0]->college
        ]);
        $total[0]->college = $college_name[0]->name;
        $item_name = DB::select("SELECT * FROM `table4` WHERE id = ?", [
            $total[0]->item
        ]);
        $total[0]->item = $item_name[0]->item;
        echo(json_encode($total));
    }
    public function submit(Request $request) // 提交赛程
    {
        $data= $request->all();
        /** $year 年份 2019 可修改 */
        $year = 2019;
        DB::insert('INSERT INTO table4 (item) VALUES (?)', [
            $data['item']
        ]);

        $item = DB::select("SELECT * FROM `table4` WHERE item = ?", [
            $data['item']
        ]);

        DB::insert('INSERT INTO table2 (item, state, `time`, `year`) VALUES (?, ?, ?, ?)', [
            $item[0]->id,
            $data['state'],
            $data['time'],
            $year
        ]);
    }
    public function submit2(Request $request) // 提交成绩
    {
        $input= $request->all();
        $data = json_decode($input['list']);

        for($i = 0; $i < 6; $i++) // 把成绩里项目名称换位id，学院名称换位id
        {
            $item_id = DB::select('SELECT table2.item FROM `table4`,table2 WHERE table4.id=table2.item and table2.state="决赛" and table4.item = ?', [
                json_decode($input['item'])]);
            $college = DB::select("SELECT * FROM `colleges` WHERE name = ?", [
                $data[$i]->college]);
            DB::insert('INSERT INTO table1 (college, item, `name`, score, place) VALUES (?, ?, ?, ?, ?)', [
                $college[0]->id,
                $item_id[0]->item,
                $data[$i]->name,
                $data[$i]->score,
                $data[$i]->place
            ]);
        }
    }
    public function edit(Request $request) // 修改单个赛程
    {
        $data= $request->all();

        DB::update('UPDATE table2, table4 SET state = ?, `time` = ?, table4.item = ? WHERE table2.id = ? and table4.id = table2.item',[
            $data['state'],
            $data['time'],
            $data['item'],
            $data['id']
        ]);

    }
    public function edit2(Request $request) // 修改单个成绩
    {
        $data= $request->all();

        // 把成绩里项目名称换位id，学院名称换为id

        $college_id = DB::select("SELECT id FROM `colleges` WHERE `name` = ?", [
            $data['college']]);
        DB::update('UPDATE table1 SET college = ?, `name` = ?, score = ? WHERE id = ?', [
            $college_id[0]->id,
            $data['name'],
            $data['score'],
            $data['id']
        ]);
    }
    public function delete($id) // 删除
    {
        $item = DB::select("SELECT * FROM `table2` WHERE id = ?", [$id]);
        DB::delete('DELETE FROM `table2` WHERE `table2`.`id` = ?', [
            $id
        ]);
        DB::delete('DELETE FROM `table4` WHERE `table4`.`id` = ?', [
            $item[0]->item
        ]);
        $data = DB::select("SELECT * FROM table1 WHERE item = ?", [$item[0]->item]);
        if($data) {
            DB::delete('DELETE FROM `table1` WHERE `table1`.`item` = ?', [
                $item[0]->item
            ]);
        }
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
}