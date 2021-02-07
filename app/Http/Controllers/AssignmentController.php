<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignmentJson;
use App\Models\assignment;
use Illuminate\Http\Request;
use App\Helpers\Inquiry;

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

        $data = $request->all();

        if (!empty($data)) {

            $rules = [
                'like' => [
                    'name' => 'string',
                    'description' => 'string'
                ],

                'where' => [
                    'id' => 'integer',
                    'start_time' => 'integer',
                    'due_time' => 'integer',
                    'evaluation_type' => [
                        'string', 'in:individual,group,team'
                    ],
                    'status' => ['string','in:pending,paused,extended,done'],
                    'subject_id' => 'integer'
                ]
            ];

            $inquiry = new Inquiry($rules, $data);

            if (!empty($inquiry->errors)) {
                $errors = $inquiry->errors;

                return response()->json(compact('errors'), 400);
            }

            $query = $inquiry->getting($query);
        }

        return new AssignmentJson($query->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $min_dates = date('Y-m-d', time()-5184000);
        $max_dates = date('Y-m-d', time()+5184000);

        return view('assignments.create')->with(compact('request','min_dates','max_dates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();

        if (empty($data)) {
            $error = 'El cuerpo de solicitud esta vacío';

            return response()->json(compact('error'), 400);
        }

        $rules = [
            'name' => 'bail|required',
            'description' => 'string|nullable',
            'start_time' => 'required|integer',
            'due_time' => 'required|integer',
            'evaluation_type' => [
                'required', 'string', 'in:individual,group,team'
            ],
            'status' => ['string','in:pending,paused,extended,done'],
            'subject_id' => 'bail|required|exists:App\Models\subject,id'
        ];

        $inquiry = new Inquiry($rules, $data);

        if (!empty($inquiry->errors)) {
            $errors = $inquiry->errors;

            return response()->json(compact('errors'), 400);
        }

        $assignment = $inquiry->saving(new assignment)->save();

        return new AssignmentJson($assignment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(assignment $assignment)
    {
        return view('test');
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
