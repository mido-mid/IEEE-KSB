<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Committee;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $committees = Committee::orderBy('id', 'desc')->paginate(10);
        return view('admin.committees.index', compact('committees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
            'name' => 'required|min:3|max:50',
        ];

        $this->validate($request, $rules);

        if(Committee::create($request->all())) {
            return redirect('/admin/committees')->withStatus('Committee successfully created');
        }else {
            return redirect('/admin/committees')->withStatus('Something Wrong, Try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Committee $committee)
    {
        //
        return view('admin.committees.show', compact('committee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Committee $committee)
    {
        //

        return view('admin.committees.edit', compact('committee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Committee $committee)
    {
        //
        $rules = [
            'name' => 'required|min:3|max:50',
        ];

        $this->validate($request, $rules);

        if($request->has('name')) {
            $committee->name = $request->name;
        }
        if($committee->isDirty()) {
            $committee->save();
            return redirect('/admin/committees')->withStatus('committee successfully updated.');
        }else {
            return redirect('/admin/committees/'.$committee->id.'/edit')->withStatus('Nothing Changed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committee $committee)
    {
        //

        $committee->delete();
        return redirect('/admin/committees')->withStatus('committee successfully deleted.');
    }
}
