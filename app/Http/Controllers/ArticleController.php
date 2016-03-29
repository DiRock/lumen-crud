<?php
 
namespace App\Http\Controllers;
 
use App\Article;
use App\Article_Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
 
class ArticleController extends Controller{
 
 
    public function index(){
 
        //$articles  = Article::all();

        $articles = Article::join('publishers', 'publishers.id', '=', 'articles.publisher_id')
            ->get();
 
        return response()->json($articles);
 
    }
 
    public function getArticle($id){
 
        $article  = Article::find($id);
 
        return response()->json($article);
    }
 
    public function saveArticle(Request $request){
 
        $article = Article::create($request->all());
        
        $article_id = $article->id;
        $author = array();

        foreach($request->input('authors') as $authors){
            $arau = array();
            $arau['author_id'] = $authors;
            $arau['article_id'] = $article_id;
            $arau = Article_Author::create($arau);
        }

        return response()->json($article);
 
    }

    public function deleteArticle($id){
        $article  = Article::find($id);
 
        $article->delete();
 
        return response()->json('success');
    }
 
    public function updateArticle(Request $request,$id){
        $article  = Article::find($id);
 
        $article->title = $request->input('title');
        $article->content = $request->input('content');
 
        $article->save();
 
        return response()->json($article);

    }
 
}
 