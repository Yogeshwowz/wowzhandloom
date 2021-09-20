<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipe=Recipes::orderBy('id','DESC')->get();
        return view('backend.recipes.index')->with('recipes',$recipe);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'photo'=>'string|required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=Recipes::create($data);
        if($status){
            request()->session()->flash('success','image successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding image');
        }
        return redirect()->route('carousel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function show(Recipes $recipes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner=Recipes::findOrFail($id);
        return view('backend.recipes.edit')->with('banner',$banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $banner=Recipes::findOrFail($id);
        $this->validate($request,[
            'photo'=>'string|required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=$banner->fill($data)->save();
        if($status){
            request()->session()->flash('success','image successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating image');
        }
        return redirect()->route('carousel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner=Recipes::findOrFail($id);
        $status=$banner->delete();
        if($status){
            request()->session()->flash('success','image successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting image');
        }
        return redirect()->route('carousel.index');
    }
}
