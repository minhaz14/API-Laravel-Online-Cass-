<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Subject;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sub=DB::table('subjects')->get();
        // return response()->json($sub);
        return Subject::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $validated = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'required|unique:subjects|max:25',
        ]);

        Subject::create($request->all());
        return response('inserted');
            //    ........... query builder.............................
        // $data=array();
        // $data['class_id']=$request->class_id;
        // $data['subject_name']=$request->subject_name;
        // $data['subject_code']=$request->subject_code;
        // DB::table('subjects')->insert($data);
        // return response('done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub=Subject::findorfail($id);
        return response()->json($sub);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $subject=Subject::findorfail($id);
        $subject->update($request->all());
        return response ('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Subject::where('id',$id)->delete();
       return response ('deleted');
    }
}
