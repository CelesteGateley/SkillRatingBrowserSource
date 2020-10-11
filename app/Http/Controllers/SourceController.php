<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function getView(string $apiKey) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        return view('min', ['apiKey' => $user->api_key, 'role' => 0]);
    }

    public function getTankView(string $apiKey) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        return view('min', ['apiKey' => $user->api_key, 'role' => 1]);
    }

    public function getDamageView(string $apiKey) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        return view('min', ['apiKey' => $user->api_key, 'role' => 2]);
    }

    public function getSupportView(string $apiKey) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        return view('min', ['apiKey' => $user->api_key, 'role' => 3]);
    }
}
