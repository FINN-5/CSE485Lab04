<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $readers = Reader::orderBy('updated_at', 'desc')->paginate(10);
        return view('readers.index', compact('readers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('readers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\\s\\-\\+\\(\\)]*)$/|min:10',
        ]);
        
        Reader::create($validatedData);
        return redirect('/readers')->with('success', 'Độc giả đã được thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.show', compact('reader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\\s\\-\\+\\(\\)]*)$/|min:10',
        ]);

        Reader::whereId($id)->update($validatedData);
        return redirect('/readers')->with('success', 'Độc giả đã được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Reader::destroy($id);
        return redirect('/readers')->with('success', 'Độc giả đã được xóa thành công');
    }
}
