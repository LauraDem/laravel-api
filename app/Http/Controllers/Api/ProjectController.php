<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $projects = Project::select('id', 'type_id', 'name', 'slug', 'content', 'cover_image' )
            ->orderByDesc('id')
            ->where('published', 1)->with('type:id,color,label')
            ->paginate(12); 
        


            foreach ($projects as $project) {
                $project->content = $project->getAbstract(100);
                $project->cover_image = $project->getAbsUriImage();
            }

            return response()->json($projects);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::select('id', 'type_id', 'name', 'slug', 'content', 'cover_image' )
        ->where('id' , $id)
        ->with('type:id,color,label')
        ->first();  

        $project->cover_image = $project->getAbsUriImage();
        return response()->json($project);
    }


}
