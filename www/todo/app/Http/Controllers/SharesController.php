<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;

class SharesController extends Controller
{
    // 一覧
    public function index(Request $request) {
        // ユーザー一覧を取得
        $shares = Share::all();
        $keyword = $request->input('keyword');

        $query = Share::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        $shares = $query->get();
    
        return view('shares.index', compact('shares'));
    }

    // 一つのshare
    public function show($id) {
        $share = Share::findOrFail($id);
        return view('shares.show')->with('share', $share);
    }


    // 追加
    public function store(Request $request) {
        $validate = [
            'title' => 'required',
            'link' => 'required',
            'comment' => 'required',
        ];
    
        $this->validate($request, $validate);
        $share = new Share();
        $share->title = $request->input('title', '');
        $youtube = $request->input('link', '');
        if(strpos($youtube,'embed/') !== false){
            $link = substr($youtube, 0, 41);
        } else{
            $link = substr($youtube, 0, 24) . 'embed/' . substr($youtube, 32, 11);
        }
        $share->link = $link;
        $share->comment = $request->input('comment', '');
        $share->save();
        $request->session()->flash('status', '登録されました');
        return redirect('/');
    }

    // 更新
    public function edit(Share $share) {
        return view('shares.edit')->with('share',$share);
    }
    public function update(Request $request, Share $share) {
        $validate = [
            'title' => 'required',
            'link' => 'required',
            'comment' => 'required',
        ];
    
        $this->validate($request, $validate);
        $share->title = $request->title;
        $youtube = $request->link;
        if(strpos($youtube,'embed/') !== false){
            $link = substr($youtube, 0, 41);
        } else{
            $link = substr($youtube, 0, 24) . 'embed/' . substr($youtube, 32, 11);
        }
        $share->link = $link;
        $share->comment = $request->comment;
        $share->save();
        $request->session()->flash('status', '更新されました');
        return redirect('/shares/'.$share->id);
    }

    // 削除
    public function destroy(Request $request, Share $share) {
        $share->delete();
        $request->session()->flash('status', '削除されました');
        return redirect('/');
    }
}