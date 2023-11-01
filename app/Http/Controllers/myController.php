<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Users;
use App\Models\Records;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class myController extends Controller
{
    public function index() {
        return view("login");
    }

    public function admin() {
        return view("admin");
    }

    public function login(Request $request) {
        $username = $request->username;
        $password = $request->password;
        $result = Users::where('username', $username)->where('password', $password)->first();
        if($result) {
            session()->put('user_id', $result->id);
            session()->put('user_name', $result->username);
            return Redirect::to('/client');
        } else {
            return Redirect::to('/');
        }
    }

    public function logout() {
        session()->put('user_id', null);
        session()->put('user_name', null);
        return Redirect::to('/');
    }

    public function client() {
        $achieve = Users::where('id', session()->get('user_id'))->first()->achievement;
        return view("client", [
            "userid" => session()->get('user_id'),
            "username" => session()->get('user_name'),
            "achievement" => $achieve
        ]);
    }

    public function stat() {
        return view("stat", [
            "userid" => session()->get('user_id'),
            "username" => session()->get('user_name')
        ]);
    }





    public function matches() {
        $matches = Matches::where('id', '>', '0')->orderby('id', 'desc')->get();
        return response()->json($matches);
    }

    public function clientSubmit(Request $request) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $record = Records::where('userid', $request->userid)->where('matchid', $request->matchid)->first();
        $match = Matches::where('id', $request->matchid)->first();
        $submitTime = strtotime(date("d-m-Y G:i:s"));
        $matchTime = strtotime($match->time);
        if($matchTime - $submitTime > 3600 && $request->choice) {
            if(!$record) {
                $newRecord = new Records;
                $newRecord->id = Records::max('id') + 1;
                $newRecord->userid = $request->userid;
                $newRecord->matchid = $request->matchid;
                $newRecord->choice = (int)$request->choice;
                $newRecord->save();
            } else {
                $record->choice = $request->choice;
                $record->save();
            }
            return response()->json("Submit thành công");
        } else {
            return response()->json("Submit thất bại vì quá thời gian hoặc bạn chưa chọn đội nào");
        }
    }

    public function clientChoice(Request $request) {
        $record = Records::where('userid', $request->userid)->where('matchid', $request->matchid)->first();
        return $record->choice;
    }

    public function update() {
        $N_matches = Matches::count();
        $RECORDS = Records::all();
        $MATCHES = Matches::all();
        $USERS = Users::where('id', '>', 2)->get();
        $BET = 10;
        $FEE = 1;
        $admin_achieve = 0;
        foreach($USERS as $user) {
            $achieve = 0;
            $n_matches = 0;
            foreach($RECORDS as $record) {
                if($record->userid == $user->id) {
                    $n_matches += 1;
                    $match = $MATCHES->where('id', $record->matchid)->first();
                    $standardChal = $match->challenge - (int)($match->challenge);
                    $userChoice = $record->choice;
                    $diff = $match->goal_one - $match->goal_two;
                    if($standardChal == 0.25) {
                        if($diff >= 1) {
                            if($userChoice == 1)    { $achieve += $BET -$FEE; }
                            else                    { $achieve -= $BET; }
                        } elseif($diff == 0) {
                            if($userChoice == 1)    { $achieve -= $BET / 2; }
                            else                    { $achieve += $BET / 2 - $FEE; }
                        } elseif($diff < 0) {
                            if($userChoice == 1)    { $achieve -= $BET; }
                            else                    { $achieve += $BET - $FEE; }
                        }
                    } elseif($standardChal == 0.5) {
                        if($diff >= 1) {
                            if($userChoice == 1)    { $achieve += $BET - $FEE; }
                            else                    { $achieve -= $BET; }
                        } elseif($diff <= 0) {
                            if($userChoice == 1)    { $achieve -= $BET; }
                            else                    { $achieve += $BET - $FEE; }
                        }
                    } elseif($standardChal == 0.75) {
                        if($diff >= 2) {
                            if($userChoice == 1)    { $achieve += $BET - $FEE; }
                            else                    { $achieve -= $BET; }
                        } elseif($diff == 1) {
                            if($userChoice == 1)    { $achieve += $BET / 2 - $FEE; }
                            else                    { $achieve -= $BET / 2; }
                        } elseif($diff <= 0) {
                            if($userChoice == 1)    { $achieve -= $BET; }
                            else                    { $achieve += $BET - $FEE; }
                        }
                    } elseif($standardChal == 0) {
                        if($match->challenge == 0) {
                            if($match->result == $userChoice)   { $achieve += $BET - $FEE; }
                            else                                { $achieve -= $BET; } 
                        } elseif($match->challenge > 0) {
                            if($diff >= $match->challenge + 1) {
                                if($userChoice == 1)    { $achieve += $BET - $FEE; }
                                else                    { $achieve -= $BET; }
                            } else {
                                if($userChoice == 1)    { $achieve -= $BET; }
                                else                    { $achieve += $BET - $FEE; }
                            }
                        }
                    }
                }
            }
            
            $achieve -= 2.5 * ($N_matches - $n_matches);
            $user->achievement = $achieve;
            $admin_achieve -= $achieve;
            $user->save();
        }
        $admin = Users::where('id', 1)->first();
        $admin->achievement = $admin_achieve;
        $admin->save();
    }

    public function getStat() {
        $users = Users::where("id", "<>", 2)->orderby("achievement", "desc")->get();
        return response()->json($users);
    }
}
