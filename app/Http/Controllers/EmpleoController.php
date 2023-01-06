<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Empleo;
use App\Models\Modo;
use Illuminate\Http\Request;

class EmpleoController extends Controller
{

    public function index()
    {
        $empleos  = Empleo::where('status',2)->latest('id')->paginate(8);

        return view('empleos.index',compact('empleos'));
    }

    public function show(Empleo $empleo){

        $this->authorize('published', $empleo);

        $similares = Empleo::where('category_id', $empleo->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $empleo->id)
                            ->latest('id')
                            ->take(4)
                            ->get();
        return view('empleos.show',compact('empleo', 'similares'));
    }

    public function category(Category $category){
        $empleos = Empleo::where('category_id', $category->id)
                        ->where('status', 2)   
                        ->latest('id')
                        ->paginate(5);
        return view('empleos.category',compact('empleos', 'category'));
    }

    public function modo(Modo $modo){
        
        $empleos = $modo->empleos()->where('status', 2)->latest('id')->paginate(5);
        return view('empleos.modo',compact('empleos', 'modo'));
    }

}
