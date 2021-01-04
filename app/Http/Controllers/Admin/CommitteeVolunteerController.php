<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Committee;
use App\Volunteer;
use App\Photo;


class CommitteeVolunteerController extends Controller
{
    //

    public function create(Committee $committee)
    {
        //
        return view('admin.committees.createvolunteer', compact('committee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Committee $committee )
    {
        //

        $rules = [
            'eng_name' => ['required','min:3','max:100','not_regex:/([%\$#\*<>]+)/'],
            'arab_name' => ['required','min:3','max:100','not_regex:/([%\$#\*<>]+)/'],
            'gmail' => ['required', 'email', 'regex:/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i'],
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
                return redirect('/admin/committees/'.$committee->id)->withStatus('volunteer successfully created.');
            }
        }
    }
}
