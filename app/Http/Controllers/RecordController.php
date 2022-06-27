<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecordController extends Controller
{
    public function list(Request $request)
    {
        $limit = intval($request->input('limit', '25'));
        $records = Record::orderBy('created_at', 'DESC')->paginate($limit);

        return response()->json([
            'status' => 200,
            'error' => null,
            'data' => $records,
        ]);
    }

    public function detail(int $id)
    {
        $record = Record::find($id);
        if (!$record) return response()->json([
            'status' => 404,
            'error' => 'RECORD_NOT_FOUND',
            'data' => null,
        ], 404);

        return response()->json([
            'status' => 200,
            'error' => null,
            'data' => $record,
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'gender' => 'required|numeric',
            'place_of_birth' => 'required|string',
            'date_of_birth' => 'required|date',
            'city_origin' => 'required|string',
            'kelas_id' => 'required|numeric',
            'confirmed_date' => 'required|date',
            'status' => 'required|numeric',
        ]);

        if ($validator->fails()) return response()->json([
            'status' => 400,
            'error' => 'INVALID_REQUEST',
            'data' => $validator->errors(),
        ], 400);

        Record::create([
            'full_name' => $request->post('full_name'),
            'gender' => $request->post('gender', 1),
            'place_of_birth' => $request->post('place_of_birth'),
            'date_of_birth' => $request->post('date_of_birth'),
            'city_origin' => $request->post('city_origin'),
            'kelas_id' => $request->post('kelas_id'),
            'confirmed_date' => $request->post('confirmed_date'),
            'status' => $request->post('status', 1),
        ]);

        return response()->json([
            'status' => 200,
            'error' => null,
            'data' => null,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'gender' => 'required|numeric',
            'place_of_birth' => 'required|string',
            'date_of_birth' => 'required|date',
            'city_origin' => 'required|string',
            'kelas_id' => 'required|numeric',
            'confirmed_date' => 'required|date',
            'status' => 'required|numeric',
        ]);

        if ($validator->fails()) return response()->json([
            'status' => 400,
            'error' => 'INVALID_REQUEST',
            'data' => $validator->errors(),
        ]);

        $record = Record::find($id);
        if (!$record) return response()->json([
            'status' => 404,
            'error' => 'RECORD_NOT_FOUND',
            'data' => null,
        ], 404);

        $record->full_name = $request->post('full_name', $record->full_name);
        $record->gender = $request->post('gender', $record->gender);
        $record->place_of_birth = $request->post('place_of_birth', $record->place_of_birth);
        $record->date_of_birth = $request->post('date_of_birth', $record->date_of_birth);
        $record->city_origin = $request->post('city_origin', $record->city_origin);
        $record->kelas_id = $request->post('kelas_id', $record->kelas_id);
        $record->confirmed_date = $request->post('confirmed_date', $record->confirmed_date);
        $record->status = $request->post('status', $record->status);
        $record->save();

        return response()->json([
            'status' => 200,
            'error' => null,
            'data' => null,
        ]);
    }

    public function delete(int $id)
    {
        $record = Record::find($id);
        if (!$record) return response()->json([
            'status' => 404,
            'error' => 'RECORD_NOT_FOUND',
            'data' => null,
        ], 404);
        $record->delete();

        return response()->json([
            'status' => 200,
            'error' => null,
            'data' => null,
        ]);
    }

    public function statistics()
    {
        $positive = Record::where('status', 1)->get()->count();
        $recover = Record::where('status', 2)->get()->count();
        $death = Record::where('status', 3)->get()->count();
        $total = $positive + $recover + $death;
        $response = [
            'positive' => $positive,
            'recover' => $recover,
            'death' => $death,
            'total' => $total,
        ];

        $jurusans = Jurusan::all();
        $jurusan_result = [];
        foreach ($jurusans as $jurusan) {
            $jur_record = Record::whereHas('kelas', function ($query1) use ($jurusan) {
                return $query1->whereHas('prodi', function ($query2) use ($jurusan) {
                    return $query2->where('jurusan_id', $jurusan->id);
                });
            })->get();
            $jur_positive = 0;
            $jur_recover = 0;
            $jur_death = 0;

            foreach ($jur_record as $rec) {
                if ($rec->status === 1) $jur_positive++;
                if ($rec->status === 2) $jur_recover++;
                if ($rec->status === 3) $jur_death++;
            }

            array_push($jurusan_result, [
                'jurusan_id' => $jurusan->id,
                'jurusan_name' => $jurusan->name,
                'positive' => $jur_positive,
                'recover' => $jur_recover,
                'death' => $jur_death,
                'total' => $jur_positive + $jur_recover + $jur_death,
            ]);
        }

        $response['details'] = $jurusan_result;

        return response()->json([
            'status' => 200,
            'error' => null,
            'data' => $response,
        ]);
    }
}
