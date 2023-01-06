<?php

namespace App\Http\Controllers\Admin;

use App\Events\EmpleoEvent;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Empleo;
use App\Models\Modo;
use App\Http\Requests\EmpleoRequest;
use Illuminate\Support\Facades\Storage;

class EmpleoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.empleos.index')->only('index');
        $this->middleware('can:admin.empleos.create')->only('create', 'store');
        $this->middleware('can:admin.empleos.edit')->only('edit', 'update');
        $this->middleware('can:admin.empleos.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.empleos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name', 'id');
        $modos = Modo::all();

        return view('admin.empleos.create', compact('categories', 'modos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmpleoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleoRequest $request)
    {

       /*  return Storage::put('empleos', $request->file('file')); */

        $empleo = Empleo::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('empleos', $request->file('file'));

            $empleo->image()->create([
                'url' => $url
            ]);
        }
        
        if ($request->modos) {
            $empleo->modos()->attach($request->modos);
        }

        event(new EmpleoEvent($empleo));

        return redirect()->route('admin.empleos.edit', $empleo)->with('info', 'Empleo creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleo $empleo)
    {
        $this->authorize('author', $empleo);

        $categories = Category::pluck('name', 'id');
        $modos = Modo::all();

        return view('admin.empleos.edit', compact('empleo', 'categories', 'modos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\EmpleoRequest  $request
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleoRequest $request, Empleo $empleo)
    {
        $this->authorize('author', $empleo);

        $empleo->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('empleos', $request->file('file'));
        
            if ($empleo->image) {
                Storage::delete($empleo->image->url);

                $empleo->image()->update([
                    'url' => $url
                ]);
            } else {
                $empleo->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->modos) {
            $empleo->modos()->sync($request->modos);
        }

        return redirect()->route('admin.empleos.edit', $empleo)->with('info', 'Empleo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleo $empleo)
    {
        $this->authorize('author', $empleo);
        
        $empleo->delete();

        return redirect()->route('admin.empleos.index')->with('info', 'Empleo se eliminó con éxito');
    }
}
