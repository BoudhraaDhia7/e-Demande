<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Twilio\Rest\Client;

class ReclamationController extends Controller
{
   
    private $rules;
    private $messages;
    private $prefix;
    private $account_sid;
    private $auth_token;

    public function __construct()
    {
        $this->account_sid= getenv('TWILIO_ACCOUNT_SID');
        $this->auth_token = getenv('TWILIO_AUTH_TOKEN');
        
        $this->rules = [
            'phone' => 'required|min:8|max:255',
            'name' => 'required|min:1|max:20',
            'lastname' => 'required|min:1|max:20',
            'state' => 'required|min:1|max:20'
        ];
        
        $this->messages = [
            'phone.required' => 'phone email est obligatoire',
            'name.required' => 'from_user email est obligatoire',
            'lastname.required' => 'to_user email est obligatoire',
            'state.required' => 'Adresse email est obligatoire',
            'phone.min' => 'Télephone doit être au moins 8 caractères',
            'phone.max' => 'Télephone ne peut pas dépasser 8 caractères',
        ];

        $this->prefix = Route::getFacadeRoot()->current()->uri();
        if (strpos($this->prefix, '/') !== false) {
            $this->prefix = explode('/',$this->prefix)[0];
        }
    }

    public function sms($msg,$phone)
    {
        $client = new Client($this->account_sid, $this->auth_token);
        $client->messages->create(
           '+216'. $phone,
            [   
                'from' => '+16205269044',
                'body' => $msg
            ]
        );
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
                $data = Reclamation::all();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<div class="text-center"><a
                        href="reclamation/detail/'.$row->id.'"><i
                            class="fas fa-cogs"></i></a></div>';

                        return $btn;
                    })
                    ->rawColumns(['action','agent_list'])
                    ->make(true);
            }
            return view('pages.Reclamation_index');
        } else {
            if ($request->ajax()) {
                $data = Reclamation::all()->where('tech_name', Auth::user()->username);
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<div class="text-center"><a
                        href="reclamation/detail/'.$row->id.'"><i
                            class="fas fa-cogs"></i></a></div>';

                        return $btn;
                    })
                    ->rawColumns(['action','agent_list'])
                    ->make(true);
            }
            return view('pages.Reclamation_index');
        }
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
        $reclamation = $request->all();
        
       $data =[
            'name' => $reclamation['name'], 
            'lastname' => $reclamation['lastname'],
            'phone' => $reclamation['phone'],
            'email' => $reclamation['email'],
            'type' => $reclamation['type'],
            'la' => $reclamation['la'],
            'ln' => $reclamation['ln'],
            'message' => $reclamation['message'],
            'state' => 'En attente',

        ];
        
            try {
                $save = Reclamation::create($data);
            } catch (\Illuminate\Database\QueryException $e) {
               
                return response('verifier vos information',500);
            }
            $this->sms('Cher client, votre réclamation a été bien enregistré.',$reclamation['phone']);
            return response('OK', 200);


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reclamation =  Reclamation::find($id);
        $users= User::all()->where('role', 2);
        $prefix = $this->prefix;
     
        return view('pages.reclamation_edit', compact('reclamation','prefix','users'));
    }

    
    public function update_technicien(Request $request ,$id)
    {       
            $reclamation =  Reclamation::find($id);
            if(auth()->user()->role == 1){                
                $reclamation->state = 'En cours';
                $reclamation->tech_name = $request->state;
                $reclamation->save();
                $this->sms('Cher client, votre réclamation et en cours de traitement.',$reclamation->phone); 
            }else{
                $reclamation->state = 'Terminé';
                
                $reclamation->save();
               $this->sms('Cher client, votre réclamation est bien traité.',$reclamation->phone);
            }
        return redirect()->route('reclamations');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
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
        DB::table('reclamations')->where('id', $id)->update([
            'cin' => $request->cin,
            'from_user' => $request->from_user,
            'to_user' => $request->to_user,
            'state' => $request->state,
        ]);
        return redirect()->route('reclamations')->with('success', 'Material modifié avec succé !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
