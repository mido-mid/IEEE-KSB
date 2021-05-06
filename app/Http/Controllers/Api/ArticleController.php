<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    //

    use GeneralTrait;

    public function index()
	{
		$year = "";
		$articles = Article::orderBy('id', 'desc')->get();
		return $this->returnData(['articles'],[$articles]);
	}

	public function filter(Request $request)
	{
		if($request->article_date > 0)
		{
			$year = $request->article_date;
			$articles = Article::orderBy('id', 'desc')->whereYear('date',$request->article_date)->paginate(9);
		}
		else
		{
			$year = "";
			$articles = Article::orderBy('id', 'desc')->paginate(9);
		}
		return view('article',compact('articles','year'));
	}
}
