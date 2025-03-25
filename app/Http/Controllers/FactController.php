<?php

namespace App\Http\Controllers;

use App\Events\FactAdded;
use App\Http\Requests\StoreFactRequest;
use App\Models\Facts;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FactController extends Controller
{
    
    public function createFact(StoreFactRequest $request){
       
        $fact = Facts::create($request->all());


        //send event
        event(new FactAdded($fact));


        //redirect to /

        return Inertia::render('welcome', [
            'facts' => Facts::orderBy('created_at', 'desc')->get()
        ]);
    }


}
