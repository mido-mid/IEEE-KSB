<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::orderBy('id', 'desc')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.events.create');
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
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $this->validate($request,$rules);

        $event = Event::create($request->all());

        if($event)
        {

            if($file = $request->file('image')) {

                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

                if($file->move('images', $file_to_store)) {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $event->id,
                        'photoable_type' => 'App\Event'
                    ]);
                }
                return redirect('/admin/events')->withStatus('event successfully created.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
        $rules = [
            'title' => ['required','min:7','max:100','not_regex:/([%\$#\*<>]+)/'],
            'description' => ['required','min:10','max:200','not_regex:/([%\$#\*<>]+)/'],
            'link' => 'required|url',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $this->validate($request, $rules);

        $event->update($request->all());

        if($file = $request->file('image')) {

            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

            if($file->move('images', $file_to_store)) {
                if($event->photo) {
                    $photo = $event->photo;

                    // remove the old image

                    $filename = $photo->filename;
                    unlink('images/'.$filename);

                    $photo->filename = $file_to_store;
                    $photo->save();
                }else {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $event->id,
                        'photoable_type' => 'App\Event',
                    ]);
                }
            }
        }

        return redirect('/admin/events')->withStatus('event successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        if($event->photo) {
            $filename = $event->photo->filename;
            unlink('images/'.$filename);
            $event->photo->delete();
        }

        $event->delete();
        return redirect('/admin/events')->withStatus('event successfully deleted.');
    }
}
