<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Question $question)
    {
        $question->favorites()->attach(auth()->id());

        return back();
    }

    public function destroy(Question $question)
    {
        $question->favorites()->detach(auth()->id());
        if(request()->expectsJson()){
            return response()->Json(null,204);
        }
        return back();
    }
}
