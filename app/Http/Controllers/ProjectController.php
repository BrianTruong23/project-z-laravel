<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    //

    public function index(){
        return Project::all();
    }

    public function store(Request $request){

        $request -> validate([
            'name' => 'required',
            'description' => 'required',
            'skill_required' => 'required',
        ]);

        return Project::create( $request -> all());

    }

    public function show($id){
        return Project::find($id);
    }

    public function update(Request $request, $id){
        $project = Project::find($id);
        $project -> update($request -> all());
        return $project;
    }

    public function destroy($id){
        return Project::destroy($id);
    }

    /**
     * Search for products by name.
     *
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $products = Project::where('name', 'like', '%' . $name . '%')->get();

        return response()->json($products);
    }


}
