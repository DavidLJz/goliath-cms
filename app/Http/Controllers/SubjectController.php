<?php

namespace App\Http\Controllers;

use App\Models\subject;
use Illuminate\Http\Request;
use App\Http\Resources\SubjectJson;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = subject::query();

        $data = $request->all();

        if (!empty($data)) {

            $attributes = [
                'id' => 'integer',
                'name' => 'string',
                'description' => 'string'
            ];

            $validator = Validator::make($data, $attributes);

            if (!$validator->passes()) {
                $errors = $validator->errors()->all();

                return response()->json(compact('errors'));
            }

            $where = ['id'];
            $like = ['name', 'description'];

            foreach ($where as $param) {
                if (empty($data[$param])) {
                    continue;
                }

                $query->where($param, $data[$param]);
            }

            foreach ($like as $param) {
                if (empty($data[$param])) {
                    continue;
                }

                $query->where($param, 'like', '%' . $data[$param] . '%');
            }
        }

        return new SubjectJson($query->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(subject $subject)
    {
        //
    }
}
