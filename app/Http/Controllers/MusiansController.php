<?php

namespace App\Http\Controllers;

use App\Models\musians;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusiansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $listNhacDy = musians::all();

       return view('nhacdy.index', compact('listNhacDy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('nhacdy.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'=>'required',
            'profile_picture' =>'nullable|file|mimes:jpeg,png,jpg',
            'birth_date'=>'required|date',
            'instrument'=>'required',
            'biography'=>'required',
        ]);

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('uploads/avtnhacdy', 'public');
        }else{
            $profilePicturePath = null;
        }
        
        $nhacDy = musians::create([

            'name'=>$validateData['name'],
              'profile_picture' =>$profilePicturePath,
              'birth_date'=>$validateData['birth_date'],
              'instrument'=>$validateData['instrument'],
              'biography'=>$validateData['biography'],
        ]);

        return redirect()->route('nhac-dy.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name'=>'required',
            'profile_picture' =>'nullable|file|mimes:jpeg,png,jpg',
            'birth_date'=>'required|date',
            'instrument'=>'required',
            'biography'=>'required',
        ]);
        $nhacDy = musians::findOrFail($id);
        if ($request->hasFile('profile_picture')) {
            if ($nhacDy->profile_picture) {
                Storage::disk('public')->delete($nhacDy->profile_picture);
            }
            $profilePicturePath = $request->file('profile_picture')->store('uploads/avtnhacdy', 'public');
        }else{
            $profilePicturePath = $nhacDy->profile_picture;
        }
        
        $nhacDy ->update([

            'name'=>$validateData['name'],
              'profile_picture' =>$profilePicturePath,
              'birth_date'=>$validateData['birth_date'],
              'instrument'=>$validateData['instrument'],
              'biography'=>$validateData['biography'],
        ]);

        return redirect()->route('nhac-dy.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $nhacDy = musians::findOrFail($id);

       $nhacDy->delete();
       return redirect()->route('nhac-dy.index');
    }
}
