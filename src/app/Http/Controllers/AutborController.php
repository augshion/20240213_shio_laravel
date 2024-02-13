<?php

namespace App\Http\Controllers;

use App\Models\Autbor;
use Illuminate\Http\Request;

// フォームリクエストの読み込み
use App\Http\Requests\AuthorRequest;

class AutborController extends Controller
{
    //データ追加用ページの表示
     public function add()
    {
        return view('add');
    }

    // 追加機能
    public function create(AuthorRequest $request)
    {
        $form = $request->all();
        Autbor::create($form);
        return redirect('/');
    }

    // データ一覧ページの表示
    public function index()
    {
        $autbors = Autbor::Paginate(4);
        return view('index', ['autbors' => $autbors]);
    }

    // データ編集用ページの表示
    public function edit(Request $request)
    {
        $autbor = Autbor::find($request->id);
        return view('edit', ['form' => $autbor]);
    }

    // 更新機能
    public function update(AuthorRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/');
    }

    // データ削除用ページの表示
    public function delete(Request $request)
    {
        $autbor = Autbor::find($request->id);
        return view('delete', ['autbor' => $autbor]);
    }

    // 削除機能
     public function remove(Request $request)
    {
        Autbor::find($request->id)->delete();
        return redirect('/');
    }

    public function verror()
    {
    return view('verror');
    }

    // 追加・追記
    public function relate(Request $request)
    {
        $hasItems = Autbor::has('book')->get();
        $noItems = Autbor::doesntHave('book')->get();
        $param = ['hasItems' => $hasItems, 'noItems' => $noItems];
        return view('autbor.index',$param);   
    }

}
