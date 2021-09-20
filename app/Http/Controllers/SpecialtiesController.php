<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialties;
use Illuminate\Support\Str;

class SpecialtiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Specialtie=Specialties::orderBy('id','DESC')->paginate(10);
          return view('backend.specialties.index')->with('Specialties',$Specialtie);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.specialties.create');
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
        $count=Specialties::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        // return $slug;
        $status=Specialties::create($data);
        if($status){
            request()->session()->flash('success','Specialties successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding banner');
        }
        return redirect()->route('specialties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specialties  $specialties
     * @return \Illuminate\Http\Response
     */
    public function show(Specialties $specialties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specialties  $specialties
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Specialtie=Specialties::findOrFail($id);
        return view('backend.specialties.edit')->with('Specialtie',$Specialtie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specialties  $specialties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $banner=Specialties::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required|max:50',
            'description'=>'string|nullable',
            'photo'=>'string|required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=$banner->fill($data)->save();
        if($status){
            request()->session()->flash('success','Specialties successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating Specialties');
        }
        return redirect()->route('specialties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specialties  $specialties
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner=Specialties::findOrFail($id);
        $status=$banner->delete();
        if($status){
            request()->session()->flash('success','Specialtie successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting Specialtie');
        }
        return redirect()->route('specialties.index');
    }
}
