<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feature=Feature::orderBy('id','DESC')->paginate(4);
        return view('backend.aboutfeatures.index')->with('features',$feature);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.aboutfeatures.create');
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
            'title'=>'string|required|max:50',
            'description'=>'string|nullable',
            'photo'=>'string|required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Feature::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        // return $slug;
        $status=Feature::create($data);
        if($status){
            request()->session()->flash('success','Feature successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding Feature');
        }
        return redirect()->route('feature.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature=Feature::findOrFail($id);
        return view('backend.aboutfeatures.edit')->with('feature',$feature);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $feature=Feature::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required|max:50',
            'description'=>'string|nullable',
            'photo'=>'string|required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=$feature->fill($data)->save();
        if($status){
            request()->session()->flash('success','Feature successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating Feature');
        }
        return redirect()->route('feature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature=Feature::findOrFail($id);
        $status=$feature->delete();
        if($status){
            request()->session()->flash('success','Feature successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting Feature');
        }
        return redirect()->route('feature.index');
    }
}
