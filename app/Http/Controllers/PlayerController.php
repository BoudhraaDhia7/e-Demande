<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Shop;
use App\Models\RequestBalance;
use DataTables;

class PlayerController extends Controller
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
        $this->middleware('auth');
        $this->rules = [
            'password' => 'required|min:8|max:20'
        ];
        $this->messages = [
            'username.alpha_dash' => 'Username ne peut pas contenir d\'espaces',
            'username.unique' => 'Username doit etre unique, existe déja',
            'password.min' => 'Mot de passe doit être au moins 8 caractères',
            'password.max' => 'Mot de passe ne peut pas dépasser 20 caractères'
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $auth = Auth::user();
            switch ($auth->role) {
                    case 1:
                        $data = Player::all();
                        break;
                    case 4:
                        $data = Player::where('parent', $auth->id);
                        break;
                }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<div class="text-center"><a
                        href="players/'.$row->id.'"><i
                            class="fas fa-cogs"></i></a></div>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.players_list');
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
        $auth = Auth::user();
        $parent = null;
        $this->checkPermissions();

        $this->rules['username'] = 'required|alpha_dash|unique:mysql2.users';
        $request->validate($this->rules, $this->messages);

        $data = $request->all();
        $shop = Shop::where('username', $auth->username)->first();

        // Case shop
        if ($auth->role == 4) {
            if ($shop->balance < $data['balance'] || $shop->balance == 0) {
                return redirect()->back()->withInput()->withErrors(array('balance' => 'Vous n\'avez pas assez du solde'));
            }
            $parent = $auth->id;
        }

        // Add player
        $player = new Player;
        $player->username = $data['username'];
        $player->password = $data['password'];
        $player->balance = $data['balance'];
        $player->parent = $parent;
        $player->activated = 1;
        $player->save();

        $shop->balance = $shop->balance - $data['balance'];
        $shop->save();

        // Add transaction

        return redirect()->route('players')->with('success', 'Joueur ajouté avec succéss !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($playerId)
    {
        $player = Player::find($playerId);
        if ($player != null) {
            $auth = Auth::user();
            $readOnly = false;
            // Shop cannot see other shop players
            if ($player->parent != null) {
                if ($player->parent != $auth->id) {
                    abort(403);
                }
            }
            // Read only for admins and agents
            if ($auth->role == 2 || $auth->role == 3) {
                $readOnly = true;
            }

            return view('pages.player_edit', compact('player', 'readOnly'));
        } else {
            abort(404);
        }
    }

    public function updateInfo($id, Request $request)
    {
        $this->checkPermissions();

        $player = Player::find($id);
        $auth = Auth::user();

        // Shop cannot update other shop players
        if ($player->parent != $auth->id && $player->parent == null) {
            abort(403);
        }

        $data = $request->all();

        if ($player->username == $data['username'] && $player->password == $data['password']) {
            return redirect()->back();
        } else {
            if ($player->username != $data['username']) {
                $this->rules['username'] = 'required|alpha_dash|unique:mysql2.users';
            }
            $request->validate($this->rules, $this->messages);
        }
 
        // Update player
        $player->username = $data['username'];
        $player->password = $data['password'];
        $player->save();

        return redirect()->route('edit-player', $player->id)->with('success', 'Joueur modifié avec succés !');
    }

    public function updateBalance($id, Request $request)
    {
        $this->checkPermissions();
        $player = Player::find($id);
        $shop = Shop::find(Auth::user()->owner_id);

        $check  = check_balance($shop, $player, $request);
        if ($check) {
            return redirect()->route('edit-player', $player->id)->with('success', 'Solde du joueur modifié avec succés !');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }

    // Check for user role permission and then abort
    public function checkPermissions()
    {
        $auth = Auth::user();
        if ($auth->role != 1 && $auth->role != 4) {
            abort(403);
        }
    }

    /**
     *  Begin Request balances
    */ 
    public function requestBalancesIndex(Request $request)
    {
        $auth = Auth::user();
        if ($auth->role > 1) {
            abort(403);
        }
        if ($request->ajax()) {
            $data = RequestBalance::all()->sortByDesc("created_at");
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<div class="text-center"><a
                        href="request-balances/'.$row->id.'"><i
                            class="fas fa-cogs"></i></a></div>';
                        return $btn;
                    })
                    ->editColumn('comment', function ($row) {
                        $content = '<b>-</b>';
                        if ($row->comment != null) {
                            $content =
                            '<b>'.$row->comment.'</b>';
                        }
                        return $content;
                    })
                    ->editColumn('status', function ($row) {
                        switch ($row->status) {
                            case 0:
                                $column = '<span class="badge bg-info text-light p-1"><b>En attente</b></span>';
                                break;
                            case 1:
                                $column = '<span class="badge bg-success text-light p-1"><b>Complete</b></span>';
                                break;
                            case 2:
                                $column = '<span class="badge bg-danger text-light p-1"><b>Refusé</b></span>';
                                break;
                        }
                        return $column;
                    })
                    ->rawColumns(['action','comment','status'])
                    ->make(true);
        }
        return view('pages.request_balance_index');
    }

    public function requestBalanceEdit($id)
    {
        $auth = Auth::user();
        if ($auth->role > 1) {
            abort(403);
        }
        $model = RequestBalance::find($id);
        return view('pages.request_balance_edit', compact('model'));
    }

    public function requestBalanceUpdate(Request $request,$id)
    {
        $auth = Auth::user();
        if ($auth->role > 1) {
            abort(403);
        }

        $modelRequest = RequestBalance::find($id);

        $status = $request->status;
        $amount = $request->amount;

        if ($status == 1) {
            $player = Player::where('username',$modelRequest->username)->first();
            if (isset($player)) {
                $player->balance = floatval($player->balance) + floatval($amount);
                $player->save();
            }
        }

        $modelRequest->status = $status;
        $modelRequest->save();

        return redirect()->route('edit-request-balances', $id)->with('success', 'Demande modifié avec succéss !');
    }

    /**
     *  End Request balances
    */ 
}
