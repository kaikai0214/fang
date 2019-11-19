<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cate;

class ArticleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articleData = article::all();
        if($request->ajax()){
            $counts = Article::count();
            $offset = $request->get("start",0);
            $limit = $request->get("length",$this->page);

            #拿到请求中的order数组，包含请求字段的下标和倒序或正序
            $order = $request->get('order')[0];
            if($order['column']==0){
                $data = Article::with("cate")->offset($offset)->limit($limit)->get();
                return [
                    'draw'=>$request->get('draw'),
                    'recordsTotal'=>$counts,
                    'recordsFiltered'=>$counts,
                    'data'=>$data
                ];
            }
//            $order = $order['column']!= 0 ? $request->get('order')[0] : $request->get('order')[2];
            #拿到请求中的字段组，字段组根据下表来获取
            $columns = $request->get('columns')[$order['column']];
            #拿到正序或倒序
            $orderType = $order['dir'];
            #拿到请求组中的要data，就是根据什么来正序或倒序
            $field = $columns['data'];
            // 关联关系字段的映射
            $field = $field != 'cate.cname' ? $field : 'cid';

            $data = Article::with("cate")->orderBy($field,$orderType)->offset($offset)->limit($limit)->get();
//            dd($data);
            return [
                'draw'=>$request->get('draw'),
                'recordsTotal'=>$counts,
                'recordsFiltered'=>$counts,
                'data'=>$data
            ];
        }
        return  view("admin.article.index",compact('articleData'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateData = Cate::all()->toArray();
//        dd($cateData);
        $cateData = treeLevel($cateData);
        return view('admin.article.create',compact('cateData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleAddRequest $request)
    {
        #采用验证器
        Article::create($request->except(['_token','file']));
        return redirect(route('admin.article.index'))->with("success",'添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $cateData = treeLevel(Cate::all()->toArray());
//        dd($article);
        return view('admin.article.edit',compact('cateData','article'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
//        dd($request->all());
        $article->update($request->except(['_token','file','_method']));
        return redirect(route('admin.article.index'))->with('success','修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return  ['code'=>200,'msg'=>'删除成功'];
    }



    public function delfile(){

        return ['code'=>200,'msg'=>"删除成功"];
    }
}
