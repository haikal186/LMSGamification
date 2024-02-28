<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AssignmentController extends Controller
{

    public function store(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $user   = Auth()->User();
        
        // Call assign date and deadline function
        $formatted_assign_date = $this->combineAssignDateTime($request->assign_date, $request->assign_time);
        $formatted_deadline    = $this->combineDeadlineDateTime($request->deadline_date, $request->deadline_time);

        $assignment = Assignment::create([
            'name'          => $request->name,
            'assigned_date' => $formatted_assign_date,
            'deadline'      => $formatted_deadline,
            'course_id'     => $course_id,
            'description'   => $request->description,
        ]);

        return redirect()->route('assignment.show', ['assignment_id' => $assignment->id]);
    }

    public function show(Request $request, $assignment_id)
    {
        $assignments = Assignment::findOrFail($assignment_id);
        $submissions = $assignments->submissions;
        $deadline = $assignments->deadline;
        
        return view('assignment.show', compact('assignments','submissions','deadline'));
    }

    public function edit(Request $request, $assignment_id)
    {
        $assignment = Assignment::findOrFail($assignment_id);

        return view('assignment.edit', compact('assignment'));
    }

    public function update(Request $request, $assignment_id)
    {
        $assignment = Assignment::findOrFail($assignment_id);

        // Call assign date and deadline function
        $formatted_assign_date = $this->combineAssignDateTime($request->assign_date, $request->assign_time);
        $formatted_deadline    = $this->combineDeadlineDateTime($request->deadline_date, $request->deadline_time);

        $assignment->name          = $request->name;
        $assignment->status        = $request->status;
        $assignment->assigned_date = $formatted_assign_date;
        $assignment->deadline      = $formatted_deadline;
        $assignment->description   = $request->description;

        $assignment->save();

        return view('assignment.edit', compact('assignment'));
    }

    private function combineAssignDateTime($date, $time)
    {
        $combine_date_time = $date . ' ' . $time;
        return Carbon::createFromFormat('d F, Y H:i', $combine_date_time);
    }

    private function combineDeadlineDateTime($date, $time)
    {
        $combine_date_time = $date . ' ' . $time;
        return Carbon::createFromFormat('d F, Y H:i', $combine_date_time);
    }

}
