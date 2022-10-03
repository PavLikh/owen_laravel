<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomePageController extends Controller
{
    public function index() {

        $catalog = Article::select('articles.id', 'articles.title', 'articles.text', 'articles.img', 'categories.name as category', 'users.login as author')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->join('users', 'articles.user_id', '=', 'users.id')
            ->join('groups', 'users.group_id', '=', 'groups.id')
            ->get()->toArray();
        $data;
        foreach ($catalog as $article) {
            $article['text'] = $this->trimLine($article['text']);
            $data[] = $article;
        }

        return view('home')->withCatalog($data);
    }

    public function trimLine($line, $lineLength = 200)
    {
        if (strlen($line) > $lineLength) {
            $line = mb_substr($line, 0, $lineLength) . '...';
        }
        return $line;
    }
}
