<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GramPanchayat;
use App\User;

class UtilityController extends Controller
{
    public function generateUser()
    {
        $gramPanchayats = GramPanchayat::select('id', 'gp_name')->get();
        foreach ($gramPanchayats as $value) {
            User::insert([
                'gram_panchayat_id' => $value['id'],
                'name' => $value['gp_name'] . " Administrator",
                'email' => strtolower(trim($value['gp_name'])) . "" . $value['id'] . "@pnrd.hrms",
                'password' => bcrypt(strtolower(trim($value['gp_name'])))
            ]);
        }
    }
}
