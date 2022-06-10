<?php

namespace App\Http\Controllers\itos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Itos\Event;
use App\Models\Itos\State;
use App\Models\Itos\Project_manager;
use App\Models\Itos\Resource;
use Illuminate\Support\Facades\Auth;
use App\Models\Itos\Location;
use App\Imports\TaskItosImport;
use Excel;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerEvent(Request $request)
    {

        $event = new Event;
        $event->start = $request->start_date;
        $event->end = $request->finish_date;
        $event->title = $request->description;
        $event->state_id = 1;
        $event->project_manager_id = $request->project_manager_id;
        $event->category_id = $request->category_id;
        $event->resource_id = $request->resource_id;
        $event->site_id = $request->site_id;
        $event->user_id = Auth::user()->id;
        $event->pep = $request->pep;
        $event->tp = $request->tp;
        $event->save();
        return;
    }

    public function getAllevents()
    {
        $events = Event::get();

        return response()->json($events);
    }

    public function getEventSelect($id)
    {
        $states = State::get();
        $events = Event::with('state', 'project_manager', 'resource', 'site', 'category')->find($id);
        $data = [
            'states' => $states,
            'events' => $events
        ];
        return $data;
    }
    public function getDataFormItos()
    {
        $project_managers  = Project_manager::get();
        $resources  = Resource::get();

        $data = [

            'project_managers' => $project_managers,
            'resources' => $resources
        ];
        return $data;
    }
    public function getTasks()
    {
        $user  = Auth::user();
        if ($user->rol == 35) {
            $resource = Resource::where('user_id', Auth::user()->id)->first();
            $tasks = Event::with('state', 'project_manager', 'resource', 'site.pop', 'category')->where('resource_id', $resource->id)->orderBy('start', 'ASC')->get();
            return $tasks;
        } else {
            $tasks = Event::with('state', 'project_manager', 'resource', 'site.pop', 'category')->orderBy('start', 'ASC')->get();
            return $tasks;
        }
    }

    public function changeStateTask(Request $request)
    {
        $user  = Auth::user();
        if ($user->rol == 8 || $user->rol == 1) {
            $tasks = Event::find($request->task_id);
            $tasks->state_id = $request->state_id;
            $tasks->save();
            return;
        } else {
            if ($user->rol == 35) {
                $tasks = Event::find($request->task_id);
                if ($tasks->state_id  == 1) {

                    $location = new Location;
                    $location->latitude = $request->lat;
                    $location->longitud = $request->lng;
                    $location->save();

                    $tasks->location_id =  $location->id;
                    $tasks->save();
                }
                $tasks->state_id = $tasks->state_id == 1 ? 2 : ($tasks->state_id == 2 ? 3 : null);
                $tasks->save();
                return;
            }
        }
    }
    public function importTask(Request $request){
        Excel::import(new TaskItosImport, request()->file('file'));
    }
}
