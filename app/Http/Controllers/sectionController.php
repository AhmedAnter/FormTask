<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class sectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections = DB::table('sections')->get();
        return view('libraryViewsContainer.form')->withSections($sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return '<center><h1>Creating new section in the library!</h1></center>';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $section_name = $request->input('section_name');
        $file = $request->file('image');
        $destinationPath = 'images';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);

        DB::table('sections')->insert(['section_name'=>$section_name, 'image_name'=>$filename]);
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return '<center><h1>You are inside ' .$id. ' section!</h1></center>';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return '<center><h1>You are trying to edit = ' .$id. ' section!</h1></center>';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // saving the edited section to th db.
        $section_name = $request->input('section_name');
        DB::table('sections')->where('id',$id)->update(['section_name'=>$section_name]);
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete the section with id = $id from db.
        DB::table('sections')->where('id',$id)->delete();
    }
    public function admin()
    {
        $sections = DB::table('sections')->get();
        return view('libraryViewsContainer.admin',['section'=>$section]);
    }
}
