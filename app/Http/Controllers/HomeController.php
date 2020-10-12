<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home', $this->generateSkillRankArray());
    }

    private function generateSkillRankArray() {
        $damageRanks = []; $tankRanks = []; $supportRanks = [];
        foreach (Auth::user()->rankChanges as $change) {
            switch ($change->role) {
                case 1:
                    array_push($tankRanks, $change->from_sr);
                    break;
                case 2:
                    array_push($damageRanks, $change->from_sr);
                    break;
                case 3:
                    array_push($supportRanks, $change->from_sr);
                    break;
            }
        }
        array_push($damageRanks, Auth::user()->damage_sr);
        array_push($tankRanks, Auth::user()->tank_sr);
        array_push($supportRanks, Auth::user()->support_sr);
        return ['tankChanges' => $tankRanks, 'damageChanges' => $damageRanks, 'supportChanges' => $supportRanks];
    }
}
