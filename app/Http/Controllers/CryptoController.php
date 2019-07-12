<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;

class CryptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cryptos = Crypto::all();

        return view('cryptos.index', compact('cryptos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cryptos.create');
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

        Crypto::create($request->all());

        return redirect()->route('cryptos.index')
            ->with('success', 'Crypto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Crypto $crypto)
    {
        return view('cryptos.show', compact('crypto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Crypto $crypto)
    {
        return view('cryptos.edit', compact('crypto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crypto $crypto)
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

            $crypto->image_url = $imageName;

            $crypto->save();
        }

        // $crypto->update($request->all());

        return redirect()->route('cryptos.index')
            ->with('success', 'Crypto updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crypto $crypto)
    {
        $crypto->delete();

        return redirect()->route('cryptos.index')
            ->with('success', 'Crypto deleted successfully');
    }
}
