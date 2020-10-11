<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function addSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $newValue = 0;
        switch ($user->shown) {
            case 1:
                $newValue = $user->tank_sr += $adjustAmount;
                break;
            case 2:
                $newValue = $user->damage_sr += $adjustAmount;
                break;
            case 3:
                $newValue = $user->support_sr += $adjustAmount;
                break;
        }
        $user->save();
        return $newValue;
    }

    public function subtractSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $newValue = 0;
        switch ($user->shown) {
            case 1:
                $newValue = $user->tank_sr -= $adjustAmount;
                break;
            case 2:
                $newValue = $user->damage_sr -= $adjustAmount;
                break;
            case 3:
                $newValue = $user->support_sr -= $adjustAmount;
                break;
        }
        $user->save();
        return $newValue;
    }

    public function addTankSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $newValue = $user->tank_sr += $adjustAmount;
        $user->save();
        return $newValue;
    }

    public function subtractTankSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $newValue = $user->tank_sr -= $adjustAmount;
        $user->save();
        return $newValue;
    }

    public function addDamageSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $newValue = $user->damage_sr += $adjustAmount;
        $user->save();
        return $newValue;
    }

    public function subtractDamageSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $newValue = $user->damage_sr -= $adjustAmount;
        $user->save();
        return $newValue;
    }

    public function addSupportSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $newValue = $user->support_sr += $adjustAmount;
        $user->save();
        return $newValue;
    }

    public function subtractSupportSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $newValue = $user->support_sr -= $adjustAmount;
        $user->save();
        return $newValue;
    }

    public function changeShown(string $apiKey, int $role) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($role)) die();
        $user->shown = $role;
        $user->save();
        return $user;
    }

    public function getShownSkillRank(string $apiKey) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        switch ($user->shown) {
            case 1:
                return $user->tank_sr;
            case 2:
                return $user->damage_sr;
            case 3:
                return $user->support_sr;
        }
        die();
    }

    public function getSkillRank(string $apiKey, int $role) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        switch ($role) {
            case 0:
                return $this->getShownSkillRank($apiKey);
            case 1:
                return $user->tank_sr;
            case 2:
                return $user->damage_sr;
            case 3:
                return $user->support_sr;
        }
        die();
    }
    public function getTankSkillRank(string $apiKey) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        return $user->tank_sr;
    }

    public function getDamageSkillRank(string $apiKey) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        return $user->damage_sr;
    }

    public function getSupportSkillRank(string $apiKey) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        return $user->support_sr;
    }
}
