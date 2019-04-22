<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\Util\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PostController extends Controller
{
    // 列表
    public function index()
    {
        $rows = DB::select('select * from blog order by id desc');
//      $rows = DB::table('blog')->paginate(1);
        $record_left = DB::select('SELECT * FROM records ORDER BY id DESC limit 0, 6');
        $record_right = DB::select('SELECT * FROM records ORDER BY id DESC limit 6, 6');
        $record_num = DB::table('records')->count();

        return view("post/index", [
            'rows' => $rows,
            'record_left' => $record_left,
            'record_right' => $record_right,
            'record_num' => $record_num
        ]);
    }

    // 详情页面
    public function show($post)
    {
        $blogs = DB::select('select * from blog where id = ?',[$post]);
        $messages = DB::select('SELECT * FROM message where postid = ? ORDER BY id DESC',[$post]);
        $blog = $blogs[0];

        return view("post/show",[
            'id' => $post,
            'blog' => $blog,
            'messages' => $messages
        ]);
    }

    // 创建文章
    public function create()
    {
        return view("post/create");
    }

    // 创建逻辑
    public function store(Request $request)
    {
        $input = $request->all();
        $file = $request->file('file');
        $filename = $realPath = $path = '';
        //判断文件是否上传成功
        if($request->hasFile('file')) {
            if ($file->isValid()){
                //原文件名
                $originalName = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //MimeType
                $type = $file->getClientMimeType();
                //临时绝对路径
                $realPath = $file->getRealPath();
                $filename = uniqid().'.'.$ext;
//                Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                $path = Storage::putFileAs(
                    '/uploads', $request->file('file'), $filename
                );
            }
        }
        DB::insert('INSERT INTO blog ( title, content, `user`, intime, mtime, imgName, imgPath) values (?, ?, ?, ?, ?, ?, ?)', [
            $input['title'],
            $input['content'],
            $input['user'],
            time(),
            time(),
            $filename,
            $path
        ]);

        return redirect('/posts');
    }

    // 编辑页面
    public function edit($post)
    {
        $blogs = DB::select('select * from blog where id = ?',[$post]);
        $blog = $blogs[0];

        return view("post/edit",[
            'id' => $post,
            'blog' => $blog,
        ]);
    }

    // 编辑逻辑
    public function update(Request $request)
    {
        $input = $request->all();
        $file = $request->file('file');
        if($request->hasFile('file')) {
            if ($file->isValid()) {
                $ext = $file->getClientOriginalExtension();
                $filename = uniqid() . '.' . $ext;
                $path = Storage::putFileAs(
                    '/uploads', $request->file('file'), $filename
                );
                DB::update('UPDATE blog SET title = ?, content = ?, `user` = ?, mtime = ?, imgName = ?, imgPath = ?  WHERE id = ?', [
                    $input['title'],
                    $input['content'],
                    $input['user'],
                    time(),
                    $filename,
                    $path,
                    $input['id']
                ]);
            }
        } else {
            DB::update('UPDATE blog SET title = ?, content = ?, `user` = ?, mtime = ?  WHERE id = ?', [
                $input['title'],
                $input['content'],
                $input['user'],
                time(),
                $input['id']
            ]);
        }

        return redirect('/posts/'.$input['id']);
    }

    // 删除文章
    public function delete(Request $request)
    {
        $input = $request->all();
        $blog = DB::select('select * from blog where id = ?',[$input['id']]);
        $img = $blog[0]->imgName;
        Storage::delete($img);
        DB::delete('DELETE FROM `blog` WHERE `blog`.`id` = ?', [
            $input['id']
        ]);

        return redirect('/posts');
    }

    // 查找文章
    public function search(Request $request)
    {
        $input = $request->all();
        if($input['class'] == "id") {
            $rows = DB::select('select * from blog WHERE id = ?', [$input['searcher']]);
        } else {
            $rows = DB::table('blog')
                ->where( ''.$input['class'] , 'like', '%'.$input['searcher'].'%')
                ->get();
        }

        return view('/post/search',[
            'rows' => $rows,
        ]);
    }

    // 创建新留言
    public function message(Request $request)
    {
        $input = $request->all();

        DB::insert('INSERT INTO message ( postid, content, username, intime) values (?, ?, ?, ?)', [
            $input['id'],
            $input['content'],
            $input['username'],
            time(),
        ]);

        return redirect('/posts/'.$input['id']);
    }
}