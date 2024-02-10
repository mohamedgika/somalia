<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Subscription::get();
        return view('backend.Package.dashboard_package', ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.Package.dashboard_add_package');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $sub = Subscription::create([
                'name' => $request->name,
                'desc' => $request->desc,
                'package_details' => $request->input('packages')
            ]);

            session()->flash('add_package', 'Add Package Successfully');
            return redirect()->route('package.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Subscription::where('id', $id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'package_details' => $request->input('package_details')
            ]);
            // session()->flash('edit_user', __('backend/dashboard_message.Edit User Successfully'));
            return redirect()->route('package.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Subscription::where('id', $id)->delete();
            // session()->flash('ActiveAds', 'Ad Deleted Successfully');
            return redirect()->route('package.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
