<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function dataproject(Request $request)
    {
        if ($request->has('search')) {
            $data = project::where('projectname', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = project::paginate(5);
        }
        return view('Projects.dataproject', compact('data'));
    }

    public function tambahdataproject()
    {
        return view('Projects.tambahdataproject');
    }

    public function insertdataproject(Request $request)
    {
        project::create($request->all());
        return redirect()->route('dataproject_admin')->with('success', 'project added successfully .');
    }

    public function editdataproject($id)
    {
        $data = project::find($id);
        return view('Projects.tampildataproject', compact('data'));
    }

    public function updatedataproject(Request $request, $id)
    {
        $data = project::find($id);
        $data->update($request->all());
        return redirect()->route('dataproject_admin')->with('success', 'project data update successfully .');
    }

    public function deletedataproject($id)
    {
        $data = project::find($id);
        $data->delete();
        return redirect()->route('dataproject_admin')->with('success', 'project data deleted successfully .');
    }
}
