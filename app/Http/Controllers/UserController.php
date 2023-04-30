<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    private $rules;
    private $messages;
    private $prefix;

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
            'username.alpha_dash' => 'Username ne peut pas contenir d\'espaces',
            'username.unique' => 'Username doit etre unique, existe déja',
            'email.required' => 'Adresse email est obligatoire',
            'email.email' => 'Adresse email doit être une adresse email valide',
            'password.min' => 'Mot de passe doit être au moins 8 caractères',
            'password.max' => 'Mot de passe ne peut pas dépasser 20 caractères',
        ];

        $this->prefix = Route::getFacadeRoot()->current()->uri();
        if (strpos($this->prefix, '/') !== false) {
            $this->prefix = explode('/',$this->prefix)[0];
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->role <= 1) {
            if ($request->ajax()) {
                $data = User::all()->where('role',2);
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<div class="text-center"><a
                        href="users/detail/'.$row->id.'"><i
                            class="fas fa-cogs"></i></a></div>';

                        return $btn;
                    })
                    ->rawColumns(['action','agent_list'])
                    ->make(true);
            }
            return view('pages.users_index');
        } else {
            abort(403);
        }
    }




    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function store(Request $request)
    {
        if (Auth::user()->role <= 1) {

            $this->rules = [
                'username' => 'required|alpha_dash|unique:users',
                'email' => 'required|email',
            ];
       
            $request->validate($this->rules,$this->messages);
            $admin = new User([
                'username' => $request->username,
                'password' => $request->password,
                'email' => $request->email,
                'role'=>2,

            ]);
            $admin->save();
        

            return redirect()->route('users')->with('success', 'User ajouté avec succés !');
        } else {
            abort(403);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $admin =  User::find($id);
            $prefix = $this->prefix;
            return view('pages.users_edit', compact('admin','prefix'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
            $request->validate($this->rules,$this->messages);
           
            $user = User::where('id', $request->id)->first();
    
            if($request->password!='Mot De passe caché')
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            else{
                $user->update([
                    'username' => $request->username,
                    'email' => $request->email,
                ]);
        }

            return redirect()->route('users')->with('success', 'Utilisateur modifié avec succé !');
     
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role <= 1) {
            $admin = Admin::find($id);
            $user = User::where('username', $admin->username)->first();
            $admin->delete();
            $user->delete();
            return redirect()->route('user')->with('success', 'Admin supprimé avec succé !');
        } else {
            abort(403);
        }
    }


    /* admin set info ( name , password ) and balance for agent */

    public function setInfo($id, Request $request)
    {
        $agent =  Agent::find($id);
        $old_username = $agent->username;
        if ($agent->username != $request->username) {
            $this->rules['username'] = 'required|alpha_dash|unique:users';
        }
        $request->validate($this->rules,$this->messages);
        $agent->username = $request->username;
        $agent->password = $request->password;

        $agent->save();

        $user = User::where('username', $old_username)->first();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('table-agent')->with('success', 'Agent modifié avec succé !');
    }
}
