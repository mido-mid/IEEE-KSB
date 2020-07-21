<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;

use App\Photo;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {

            auth()->user()->update($request->all());

            return back()->withStatus(__('Profile successfully updated.'));
    }

    public function updateimage(Request $request)
    {

        $user = auth()->user();

        $photoable_type = 'App\User';

        $photoable_id = $user->id;

        if($image = $request->file('image'))
        {
            $file_to_store = time() . "_" . $user->name . "_" . "." . $image->getClientOriginalExtension();

                if($user->photo)
                {
                    $filename = $user->photo->filename;
                    $user->photo->delete();
                    unlink('images/'.$filename);
                    if($user->photo()->create(['filename' => $file_to_store , 'photoable_type' => $photoable_type , 'photoable_id' => $photoable_id]) );
                    {
                        $image->move('images', $file_to_store);
                    }
                }

                else
                {
                    if($user->photo()->create(['filename' => $file_to_store , 'photoable_type' => $photoable_type , 'photoable_id' => $photoable_id]) );
                    {
                        $image->move('images', $file_to_store);
                    }
                }

                    return response()->json([

                        'message' => 'your profile image uploaded successfully',
                        'uploaded_image' => '<img src="'.'images/'.$file_to_store.'"class="img-thumbnail img-fluid">',


                    ]);
        }

    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
