<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use App\Models\Project_Users;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $userID = auth()->user()->id;
        $projects = Project::where('voditelj_id',$userID)->get();
        $projects_ids_member = Project_Users::whereJsonContains('team_members_id', strval($userID))->get();

        $projects_member = array();
        foreach ($projects_ids_member as $id) {
            $projects_member[] = Project::find($id->project_id);
        }

        return view ('projects.index')->with('projects', $projects)->with('projects_member', $projects_member);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $users = User::where('id', '!=' ,auth()->user()->id)->get();
        return view('projects.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();
        $input['voditelj_id'] = auth()->user()->id;
        $project = Project::create($input);
       
        $project_users = new Project_Users();
        //setting and saving project and id's of team members
        $project_users->team_members_id = $request->team_members;
        $project_users->project_id = $project->id;
        $project_users->save();

        return redirect('projects')->with('flash_message', 'Projekt je uspješno dodan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $project = Project::find($id);
        return view('projects.edit')->with('projects', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $project = Project::find($id);
        $userID = auth()->user()->id;
        $input = $request->all();
        $input_db = array(['obavljeni_poslovi']);

       if ($userID != $project['voditelj_id']) {
            $input_db['obavljeni_poslovi'] = $input['obavljeni_poslovi'];
            $project->update($input_db);
       } else {
            $project->update($input);
       }

        return redirect('projects')->with('flash_message', 'Projekt je uspješno ažuriran!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Project::destroy($id);
        return redirect('projects')->with('flash_message', 'Projekt je uspješno obrisan!');  
    }
}
