<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;
use App\Http\Resources\ExchangeListResource;
use Image;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchanges = ExchangeListResource::collection(Exchange::all());

        return view('exchanges.index', compact('exchanges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exchanges.create');
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

        Exchange::create($request->all());

        return redirect()->route('exchanges.index')
            ->with('success', 'Exchange created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exchange $exchange)
    {
        return view('exchanges.show', compact('exchange'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        return view('exchanges.edit', compact('exchange'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
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

            $exchange->image_url = $imageName;

            $exchange->save();
        }
        // $exchange->update($request->all());

        return redirect()->route('exchanges.index')
            ->with('success', 'Exchange updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        $exchange->delete();

        return redirect()->route('exchanges.index')
            ->with('success', 'Exchange deleted successfully');
    }
}
