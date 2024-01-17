<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contactus::get();
        return view('backend.ContactUs.dashboard_contact', ['contacts'=>$contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Contactus::create([
                'email'=>$request->email,
                'phone'=>$request->phone,
            ]);

            // session()->flash('ActiveAds', 'Ad Active Successfully');
            return redirect()->route('contact.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
    public function edit(Request $request,Contactus $id)
    {
        try {
            $id->update([
                'email'=>$request->email,
                'phone'=>$request->phone,
            ]);


            // session()->flash('edit_ads', 'Edit Ads Successfully');
            return redirect()->route('contact.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contactus $id)
    {
        try {
            $id->delete();
            // session()->flash('ActiveAds', 'Ad Deleted Successfully');
            return redirect()->route('contact.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
