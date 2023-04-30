<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Report;
use App\Models\User;
use App\Models\Admin;
use App\Models\Agent;
use App\Models\Shop;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    private $rules;
    private $messages;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->rules = [
            'password' => 'required|min:8|max:20'
        ];
        $this->messages = [
            'password.min' => 'Mot de passe doit être au moins 8 caractères',
            'password.max' => 'Mot de passe ne peut pas dépasser 20 caractères'
        ];
    }
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $request->validate($this->rules,$this->messages);
        dd($request->all());
        auth()->user()->update($request->all());



        return back()->withStatus(__('Profile successfully updated.'));
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
        switch (auth()->user()->role) {
            case 2:
                Admin::where('username',auth()->user()->username)->update(['password' => $request->get('password')]);
                break;
            case 3:
                Agent::where('username',auth()->user()->username)->update(['password' => $request->get('password')]);
                break;
            case 4:
                Shop::where('username',auth()->user()->username)->update(['password' => $request->get('password')]);
                break;
        }

        return back()->withStatusPassword(__('Votre mot de passe a été modifié avec succès'));
    }

    //un block user account
    public function UnBlock($id)
    {
        $user = User::where('owner_id' , $id)->first();
        $user->status = 1 ;
        $user->save();

        $report = Report::where('parent_id',$id)->update([
            'checked' => 1
        ]);

        return back()->withStatus(__('Profile successfully updated.'));
    }
}
