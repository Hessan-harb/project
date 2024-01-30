<?php

namespace App\Http\Controllers;
use App\Models\Projcet;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;



class ProjcetController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Projcet::class,'projcet_id');
    }

    public function index(){
        $project=QueryBuilder::for(Projcet::class)
            ->allowedIncludes('tasks')
            ->paginate();
        return new ProjectCollection($project);
    }

    public function show(Request $request, $id){

        $projcet=Projcet::findOrFail($id);
        return (new ProjectResource($projcet))->load('tasks')->load('members');
    }
    
    public function store(ProjectRequest $projectRequest){

        $validted=$projectRequest->validated();

        $project=Auth::user()->projects()->create($validted);

        return new ProjectResource($project);

    }

    public function update(UpdateProjectRequest $projectRequest,$id){
        $validted=$projectRequest->validated();

        $projcet=Projcet::findOrFail($id);

        $projcet->update($validted);

        return new ProjectResource($projcet);
    }

    public function destroy(Request $request, $id){

        Projcet::where('id', $id)->delete();

        return response()->noContent();
    }


   
}
