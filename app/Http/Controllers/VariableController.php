<?php

namespace App\Http\Controllers;

use App\Variable;
use Illuminate\Http\Request;

class VariableController extends Controller
{
    public function showVariable(Variable $variable) {
        return view('dashboard.variables.index', compact('variable'));
    }

    public function update(Variable $variable) {
        $variable->value = request('name');
        $variable->save();

        return redirect()->route('variables.admin.index', $variable->getAttributes()['name']);
    }
}
