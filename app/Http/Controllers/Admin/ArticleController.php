<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Photo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $rules = [
            'title' => ['required','min:7','max:100','not_regex:/([%\$#\*<>]+)/'],
            'description' => ['required','min:10','max:200','not_regex:/([%\$#\*<>]+)/'],
            'link' => 'required|url',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $this->validate($request,$rules);

        $article = Article::create($request->all());

        if($article)
        {

            if($file = $request->file('image')) {

                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

                if($file->move('images', $file_to_store)) {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $article->id,
                        'photoable_type' => 'App\Article'
                    ]);
                }
                return redirect('/admin/articles')->withStatus('article successfully created.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //

        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        $rules = [
            'title' => ['required','min:7','max:100','not_regex:/([%\$#\*<>]+)/'],
            'description' => ['required','min:10','max:200','not_regex:/([%\$#\*<>]+)/'],
            'link' => 'required|url',
            'date' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $this->validate($request, $rules);

        $article->update($request->all());

        if($file = $request->file('image')) {

            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

            if($file->move('images', $file_to_store)) {
                if($article->photo) {
                    $photo = $article->photo;

                    // remove the old image

                    $filename = $photo->filename;
                    unlink('images/'.$filename);

                    $photo->filename = $file_to_store;
                    $photo->save();
                }else {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $article->id,
                        'photoable_type' => 'App\Article',
                    ]);
                }
            }
        }

        return redirect('/admin/articles')->withStatus('article successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //

        if($article->photo) {
            $filename = $article->photo->filename;
            unlink('images/'.$filename);
            $article->photo->delete();
        }

        $article->delete();
        return redirect('/admin/articles')->withStatus('article successfully deleted.');

    }
}
