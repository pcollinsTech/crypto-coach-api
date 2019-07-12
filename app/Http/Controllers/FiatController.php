<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fiat;

class FiatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiats = Fiat::all();

        return view('fiats.index', compact('fiats'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fiats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Fiat::create($request->all());

        return redirect()->route('fiats.index')
            ->with('success', 'Fiat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fiat $fiat)
    {
        return view('fiats.show', compact('fiat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fiat $fiat)
    {
        return view('fiats.edit', compact('fiat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fiat $fiat)
    {
        $request->validate([
            'name' => 'required',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $name = $image->getClientOriginalName();
            $imageName = time() . '.' . $name;

            $image->move(public_path('images'), $imageName);

            $fiat->image_url = $imageName;

            $fiat->save();
        }

        // $fiat->update($request->all());

        return redirect()->route('fiats.index')
            ->with('success', 'Fiat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fiat $fiat)
    {
        $fiat->delete();

        return redirect()->route('fiats.index')
            ->with('success', 'Fiat deleted successfully');
    }
}
