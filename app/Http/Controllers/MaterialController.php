<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use App\Models\Admin;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class MaterialController extends Controller
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
            'name' => 'required|min:3|max:20'
        ];
        
        $this->messages = [
            'name.alpha_dash' => 'Username ne peut pas contenir d\'espaces',
            'name.required' => 'Adresse email est obligatoire',
            'name.min' => 'Libelle doit être au moins 3 caractères',
            'name.max' => 'Libelle ne peut pas dépasser 20 caractères',
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
                $data = Material::all();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<div class="text-center"><a
                        href="materials/detail/'.$row->id.'"><i
                            class="fas fa-cogs"></i></a></div>';

                        return $btn;
                    })
                    ->rawColumns(['action','agent_list'])
                    ->make(true);
            }
            return view('pages.material_index');
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
            $request->validate($this->rules,$this->messages);
            
            DB::table('materials')->insert([
                'name' => $request->name,
            ]);
    
            return redirect()->route('material')->with('success', 'Matériel ajouté avec succés !');
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
            $material =  Material::find($id);
            $prefix = $this->prefix;
            return view('pages.material_edit', compact('material','prefix'));

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
        //dd($request->all());
            $request->validate($this->rules,$this->messages);
            DB::table('materials')->where('id', $id)->update([
                'name' => $request->name,
            ]);
            return redirect()->route('material')->with('success', 'Material modifié avec succé !');
     
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


   
}
