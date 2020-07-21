<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Volunteer;
use App\Photo;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $volunteers = Volunteer::orderBy('id', 'desc')->paginate(10);
        return view('admin.volunteers.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.volunteers.create');

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
            'eng_name' => 'required|min:7|max:200',
            'arab_name' => 'required|min:7|max:200',
            'gmail' => 'required|email',
            'linkedin' => 'required|url',
            'committee_id' => 'required|integer',
            'role_id' => 'required|integer',
        ];

        $this->validate($request,$rules);

        $volunteer = Volunteer::create($request->all());

        if($volunteer)
        {

            if($file = $request->file('image')) {

                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

                if($file->move('images', $file_to_store)) {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $volunteer->id,
                        'photoable_type' => 'App\Volunteer'
                    ]);
                }
                return redirect('/admin/volunteers')->withStatus('volunteer successfully created.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //

        return view('admin.volunteers.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        //

        return view('admin.volunteers.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
        $rules = [
            'eng_name' => 'required|min:7|max:200',
            'arab_name' => 'required|min:7|max:200',
            'gmail' => 'required|email',
            'linkedin' => 'required|url',
            'committee_id' => 'required|integer',
            'role_id' => 'required|integer',
        ];

        $this->validate($request,$rules);

        $volunteer->update($request->all());


            if($file = $request->file('image')) {

                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

                if($file->move('images', $file_to_store)) {
                    if($volunteer->photo) {
                        $photo = $volunteer->photo;
    
                        // remove the old image
    
                        $filename = $photo->filename;
                        unlink('images/'.$filename);
    
                        $photo->filename = $file_to_store;
                        $photo->save();
                    }else {
                        Photo::create([
                            'filename' => $file_to_store,
                            'photoable_id' => $volunteer->id,
                            'photoable_type' => 'App\Volunteer',
                        ]);
                    }
                }
            }

            return redirect('/admin/volunteers')->withStatus('volunteer successfully created.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        //

        if($volunteer->photo) {
            $filename = $volunteer->photo->filename;
            unlink('images/'.$filename);
            $volunteer->photo->delete();
        }

        $volunteer->delete();
        return redirect('/admin/volunteers')->withStatus('volunteer successfully deleted.');
    }
}
