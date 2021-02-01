<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignmentJson;
use App\Models\assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = assignment::query();

        return new AssignmentJson($query->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->json()->all();

        $attributes = [
            'name' => 'bail|required',
            'description' => 'string|nullable',
            'start_time' => 'required|integer',
            'due_time' => 'required|integer',
            'evaluation_type' => [
                'required', 'string', 'in:individual,group,team'
            ],
            'status' => ['string','in:pending,paused,extended,done'],
            'subject_id' => 'required|exists:App\Models\Subject,id'
        ];

        $validator = Validator::make($data, $attributes);

        if (!$validator->passes()) {
            $errors = $validator->errors()->all();

            return response()->json(compact('errors'));
        }

        $query = new assignment;

        foreach ($attributes as $name => $validation) {
            if (empty($data[$name])) {
                continue;
            }

            $query->{$name} = $data[$name];
        }

        $query->save();

        return new AssignmentJson($query);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(assignment $assignment)
    {
        //
    }
}
