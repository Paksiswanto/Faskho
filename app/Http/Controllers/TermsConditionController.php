<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;

use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    public function index()
    {
        $termsAndConditions = TermsCondition::firstOrCreate([]);
        return view('syarat-dan-ketentuan', compact('termsAndConditions'));
    }

    public function update(Request $request)
    {
        $termsAndConditions = TermsCondition::firstOrCreate([]);
        $termsAndConditions->isi = $request->isi;
        $termsAndConditions->save();

    return redirect()->back()->with('success', 'Syarat dan ketentuan berhasil diupdate');
    }
}

