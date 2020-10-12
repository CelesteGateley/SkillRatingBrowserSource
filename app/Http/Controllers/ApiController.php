<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function addSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $oldValue = 0;
        $newValue = 0;
        switch ($user->shown) {
            case 1:
                $oldValue = $user->tank_sr;
                $newValue = $user->tank_sr += $adjustAmount;
                break;
            case 2:
                $oldValue = $user->damage_sr;
                $newValue = $user->damage_sr += $adjustAmount;
                break;
            case 3:
                $oldValue = $user->support_sr;
                $newValue = $user->support_sr += $adjustAmount;
                break;
        }
        $user->rankChanges()->create(['from_sr' => $oldValue, 'to_sr' => $newValue, 'role' => $user->shown]);
        $user->save();
        return "Added " . $newValue . " SR!";
    }

    public function subtractSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $oldValue = 0;
        $newValue = 0;
        switch ($user->shown) {
            case 1:
                $oldValue = $user->tank_sr;
                $newValue = $user->tank_sr -= $adjustAmount;
                break;
            case 2:
                $oldValue = $user->damage_sr;
                $newValue = $user->damage_sr -= $adjustAmount;
                break;
            case 3:
                $oldValue = $user->support_sr;
                $newValue = $user->support_sr -= $adjustAmount;
                break;
        }
        $user->rankChanges()->create(['from_sr' => $oldValue, 'to_sr' => $newValue, 'role' => $user->shown]);
        $user->save();
        return "Added " . $newValue . " SR!";
    }

    public function addTankSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $oldValue = $user->tank_sr;
        $newValue = $user->tank_sr += $adjustAmount;
        $user->rankChanges()->create(['from_sr' => $oldValue, 'to_sr' => $newValue, 'role' => 1]);
        $user->save();
        return "Added " . $newValue . " SR!";
    }

    public function subtractTankSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $oldValue = $user->tank_sr;
        $newValue = $user->tank_sr -= $adjustAmount;
        $user->rankChanges()->create(['from_sr' => $oldValue, 'to_sr' => $newValue, 'role' => 1]);
        $user->save();
        return "Added " . $newValue . " SR!";
    }

    public function addDamageSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $oldValue = $user->damage_sr;
        $newValue = $user->damage_sr += $adjustAmount;
        $user->rankChanges()->create(['from_sr' => $oldValue, 'to_sr' => $newValue, 'role' => 2]);
        $user->save();
        return "Added " . $newValue . " SR!";
    }

    public function subtractDamageSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $oldValue = $user->damage_sr;
        $newValue = $user->damage_sr -= $adjustAmount;
        $user->rankChanges()->create(['from_sr' => $oldValue, 'to_sr' => $newValue, 'role' => 2]);
        $user->save();
        return "Added " . $newValue . " SR!";
    }

    public function addSupportSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $oldValue = $user->support_sr;
        $newValue = $user->support_sr += $adjustAmount;
        $user->rankChanges()->create(['from_sr' => $oldValue, 'to_sr' => $newValue, 'role' => 3]);
        $user->save();
        return "Added " . $newValue . " SR!";
    }

    public function subtractSupportSkillRank(string $apiKey, int $adjustAmount) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($adjustAmount)) die();
        $oldValue = $user->support_sr;
        $newValue = $user->support_sr -= $adjustAmount;
        $user->rankChanges()->create(['from_sr' => $oldValue, 'to_sr' => $newValue, 'role' => 3]);
        $user->save();
        return "Added " . $newValue . " SR!";
    }

    public function changeShown(string $apiKey, int $role) {
        $user = User::where('api_key', '=', $apiKey)->firstOrFail();
        if (!is_int($role)) die();
        $user->shown = $role;
        $user->save();
        return "Changed shown role";
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
