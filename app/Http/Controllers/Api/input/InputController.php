<?php

namespace App\Http\Controllers\Api\input;

use App\Models\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Input\InputResource;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('hello');
        $inputs = Input::get();
        return responseSuccessData(InputResource::collection($inputs->load('category')));
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
        $input = Input::create([
            'inputs'=> $request->inputs,
            'category_id'=>$request->category_id
        ]);

        return responseSuccessData(InputResource::make($input->load('category')));
    }

    /**
     * Display the specified resource.
     */
    public function show(Input $input)
    {
        if(! $input)
            return responseErrorMessage('المدخل غير موجود');

        return responseSuccessData(InputResource::make($input->load('category')));
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
    public function update(Request $request, Input $input)
    {
        if(! $input)
            return responseErrorMessage('المدخل غير موجود');

        $input->update([
            'inputs'=> $request->inputs,
            'category_id'=>$request->category_id
        ]);

        $input = $input->load('category');
        return responseSuccessData(InputResource::make($input));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Input $input)
    {
        if(! $input)
            return responseErrorMessage('المدخل غير موجود');

        $input->delete();
        return responseSuccessMessage('تم حذف المدخل بنجاح');
    }
}
