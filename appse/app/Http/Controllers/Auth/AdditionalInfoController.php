<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;

class AdditionalInfoController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'gender' => 'required|string',
            'dob' => 'required|date',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'waist' => 'required|numeric',
            'chest' => 'required|numeric',
            'body_fat' => 'required|numeric',
        ], [
            'gender.required' => 'You must select your gender',
            'dob.required' => 'You must fill your date of birth',
            'height.required' => 'You must fill your height',
            'weight.required' => 'You must fill your weight',
            'waist.required' => 'You must fill your waist measurement',
            'chest.required' => 'You must fill your chest measurement',
            'body_fat.required' => 'You must fill your body fat percentage',
        ]);

        $user = User::findOrFail($id);

        UserDetail::create([
            'user_id' => $user->id,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'height' => $request->height,
            'weight' => $request->weight,
            'waist' => $request->waist,
            'chest' => $request->chest,
            'body_fat' => $request->body_fat,
        ]);

        return redirect()->route('landing-page')->with('success', 'Information updated successfully.');
    }
}
