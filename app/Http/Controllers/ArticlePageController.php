<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticlePageController extends Controller
{

    public function index($articleId){

        $article = Article::select('articles.id', 'articles.title', 'articles.text', 'articles.img', 'categories.name as category', 'users.login as author')
        ->join('categories', 'articles.category_id', '=', 'categories.id')
        ->join('users', 'articles.user_id', '=', 'users.id')
        ->join('groups', 'users.group_id', '=', 'groups.id')
        ->find($articleId);
        return view('article', ['data' => $article]);
    }

    public function edit(ArticleRequest $req){

        if(Article::where("id","=", $req->id)->exists()) {
            $user = Article::where("id","=", $req->id)->first();
            $user->setAttribute('title',  $req->title);
            $user->save();
            // echo 'OK';
        }
        return response()->json([
            'update' => 'Ok'
        ]);
    }

}

//Музей Востока представляет выставку «Республика Адыгея. Дорогами эпох и цивилизаций»
