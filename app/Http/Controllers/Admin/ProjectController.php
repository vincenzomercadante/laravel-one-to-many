<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = new Type;

        $types = $type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validated();

        $data = $request->all();

        $project = new Project;

        $project->fill($data);
        $project->slug = Str::slug($project->title);

        $project->save();

        return redirect()->route('admin.projects.show', compact('project'))->with('message-status', 'alert-success')->with('message-text', 'Project created successfully');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $request->validated();

        $data = $request->all();
        $project->fill($data);

        $project->slug = Str::slug($project->title);

        $project->save();

        return redirect()->route('admin.projects.show', $project)->with('message-status', 'alert-success')->with('message-text', 'Project modified successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message-status', 'alert-danger')->with('message-text', 'Project delete successfully');
    }
}
