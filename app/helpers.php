<?php



use App\Models\Report;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Admin;
use App\Models\Agent;
use App\Models\Shop;
use App\Models\Player;

// Model for player's transactions
use App\Models\Money;

use Illuminate\Support\Facades\Auth;


if (!function_exists('check_balance')) {
    function check_balance($parent, $child, $request)
    {
        $check = false;
        $oldTotal = $parent->balance + $child->balance;
        $newTotal = $request->parentBalance + $request->childBalance;

        if (Auth::user()->role == 1) {

            if ($child->balance == $request->childBalance || $request->childBalance == null || $child->balance == $request->childBalance) {
                return 0;
            }

            $act = 1;
            // Case Super Admin
            $trans = new Transaction();
            $trans->role_parent = 1;
            $trans->parent_id = $parent->id;
            $trans->child_id = $child->id;
            $trans->username_parent = $parent->username;
            $trans->username_child = $child->username;

            if ($child->balance > $request->childBalance) {
                $trans->parent_action = "DEBITER";
                $trans->amount = $child->balance - $request->childBalance;
                $amount = $child->balance - $request->childBalance;
                $act = 0;
            } else if ($child->balance < $request->childBalance) {
                $trans->parent_action = "CREDITER";
                $trans->amount = +$request->childBalance - +$child->balance;
                $amount = +$request->childBalance - +$child->balance;
            }

            $trans->old_balance_parent = 0;
            $trans->old_balance_child = +$child->balance;
            $trans->new_balance_parent = 0;
            $trans->new_balance_child = +$request->childBalance;

            // old child balance
            $old_c_balance = +$child->balance;

            // Save transaction
            $trans->save();

            // Update child balance
            $child->balance = $request->childBalance;
            $child->save();

            if (get_class($child) == 'App\Models\Player') {
                // Insert player transaction in money table
                $money = new Money();
                $money->username = $child->username;
                $money->parent_username = $parent->username;
                $money->old_balance = $old_c_balance;
                $money->new_balance = +$request->childBalance;
                $money->amount = $amount;

                if ($act == 1) {
                    $money->action = 'CREDITER';
                } else {
                    $money->action = 'DEBITER';
                }
                $money->save();
            }

            return 1;
        } else {
            // Case others
            if ($child->balance == $request->childBalance || $request->childBalance == null || $child->balance == $request->childBalance) {
                return 0;
            }

            if ($newTotal == $oldTotal) {
                $check = true;
            }


            $act = 1;
            $trans = new Transaction();
            $trans->role_parent = Auth::user()->role;
            $trans->parent_id = +$parent->id;
            $trans->child_id = +$child->id;
            $trans->username_parent = $parent->username;
            $trans->username_child = $child->username;
            if ($request->parentBalance > $parent->balance) {
                $trans->parent_action = "DEBITER";
                $trans->amount = +$request->parentBalance - +$parent->balance;
                $amount = +$request->parentBalance - +$parent->balance;
                $act = 0;
            } else {
                $trans->parent_action = "CREDITER";
                $trans->amount = +$parent->balance - +$request->parentBalance;
                $amount = +$parent->balance - +$request->parentBalance;
            }
            $trans->old_balance_parent = +$parent->balance;
            $trans->old_balance_child = +$child->balance;
            $trans->new_balance_parent = +$request->parentBalance;
            $trans->new_balance_child = +$request->childBalance;

            // old child balance
            $old_c_balance = +$child->balance;

            // Save transaction
            $trans->save();

            // Update child - parent balance
            $parent->balance = $request->parentBalance;
            $child->balance = $request->childBalance;
            $child->save();
            $parent->save();

            if (get_class($child) == 'App\Models\Player') {
                // Insert player transaction in money table
                $money = new Money();
                $money->username = $child->username;
                $money->parent_username = $parent->username;
                $money->old_balance = $old_c_balance;
                $money->new_balance = +$request->childBalance;
                $money->amount = $amount;

                if ($act == 1) {
                    $money->action = 'CREDITER';
                } else {
                    $money->action = 'DEBITER';
                }
                $money->save();
            }



            if (!$check) {
                $report = new Report();
                $report->parent_id = $parent->id;
                $report->parent_username = $parent->username;
                $report->parent_balence = $parent->balance;
                $report->child_id = $child->id;
                $report->child_username = $child->username;
                $report->child_balence = $child->balance;
                $report->report_msg = json_encode($request->all());
                $report->checked = false;
                $report->role = Auth::user()->role;

                $report->save();

                // $user = User::where('owner_id', $parent->id)->where('role',Auth::user()->role)->first();
                // $user->status = 0;
                // $user->save();
            }

            return 1;
        }
    }

    if (!function_exists('childs')) {
        function childs()
        {
            $childs = [];

            $agents_ids = [];
            $agents_usernames = [];

            $shops_ids = [];
            $shops_usernames = [];

            $players_ids = [];
            $players_usernames = [];

            $parent = Auth::user();
            switch ($parent->role) {
                case 2:
                    // Get related agents
                    $agents = Agent::where(
                        [
                            'parent_role' => 2,
                            'parent_id' => $parent->owner_id
                        ]
                    )
                        ->select('id', 'username')
                        ->pluck('id', 'username')
                        ->toArray();
                    foreach ($agents as $username => $id) {
                        array_push($agents_ids, $id);
                        array_push($agents_usernames, $username);
                    }

                    // Get related shops
                    $shops = Shop::where('parent_role', 3)
                        ->select('id', 'username')
                        ->whereIn('parent_id', $agents_ids)
                        ->pluck('id', 'username')
                        ->toArray();
                    foreach ($shops as $username => $id) {
                        array_push($shops_ids, $id);
                        array_push($shops_usernames, $username);
                    }

                    // Get related players
                    $players = Player::where('parent_role', 4)
                        ->whereIn('parent_id', $shops_ids)
                        ->select('id', 'username')
                        ->pluck('id', 'username')
                        ->toArray();
                    foreach ($players as $username => $id) {
                        array_push($players_ids, $id);
                        array_push($players_usernames, $username);
                    }

                    // Get related players
                    $players2 = Player::where('parent_role', 3)
                        ->whereIn('parent_id', $agents_ids)
                        ->select('id', 'username')
                        ->pluck('id', 'username')
                        ->toArray();
                    foreach ($players2 as $username => $id) {
                        array_push($players_ids, $id);
                        array_push($players_usernames, $username);
                    }

                    $childs['agents'] = [
                        'ids' => $agents_ids,
                        'usernames' => $agents_usernames
                    ];

                    $childs['shops'] = [
                        'ids' => $shops_ids,
                        'usernames' => $shops_usernames
                    ];

                    $childs['players'] = [
                        'ids' => $players_ids,
                        'usernames' => $players_usernames
                    ];
                    break;
                case 3:
                    // Get related shops
                    $shops = Shop::where(
                        [
                            'parent_role' => 3,
                            'parent_id' => $parent->owner_id
                        ]
                    )
                        ->select('id', 'username')
                        ->pluck('id', 'username')
                        ->toArray();
                    foreach ($shops as $username => $id) {
                        array_push($shops_ids, $id);
                        array_push($shops_usernames, $username);
                    }

                    // Get related shop players
                    $players = Player::where('parent_role', 4)
                        ->select('id', 'username')
                        ->whereIn('parent_id', $shops_ids)
                        ->pluck('id', 'username')
                        ->toArray();
                    foreach ($players as $username => $id) {
                        array_push($players_ids, $id);
                        array_push($players_usernames, $username);
                    }

                    $childs['shops'] = [
                        'ids' => $shops_ids,
                        'usernames' => $shops_usernames
                    ];

                    $childs['players'] = [
                        'ids' => $players_ids,
                        'usernames' => $players_usernames
                    ];
                    break;
                case 4:
                    // Get players
                    $players = Player::where(
                        [
                            'parent_role' => 4,
                            'parent_id' => $parent->owner_id
                        ]
                    )
                        ->select('id', 'username')
                        ->whereIn('parent_id', $shops_ids)
                        ->pluck('id', 'username')
                        ->toArray();
                    foreach ($players as $username => $id) {
                        array_push($players_ids, $id);
                        array_push($players_usernames, $username);
                    }

                    $childs['players'] = [
                        'ids' => $players_ids,
                        'usernames' => $players_usernames
                    ];
                    break;
            }

            return $childs;
        }
    }
}
