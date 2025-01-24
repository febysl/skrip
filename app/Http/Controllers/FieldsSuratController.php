<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\FieldsSurat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FieldsSuratController extends Controller
{
    public function create()
    {
        $fields = session('fields', []);

        if (empty($fields)) {
            return redirect()->route('data.store')->with('error', 'No fields data available.');
        }

        return view('fields.create', compact('fields'));
    }

    public function store(Request $request)
    {
        $data = json_decode($request->data, true);
        DB::transaction(function() use ($request, $data) {
            if (isset($data['id'])) {
                $surat = Data::findOrFail($data['id']);
                $surat->update([
                    'nama' => $data['nama'],
                    'template' => $data['template'],
                    'deskripsi' => $data['deskripsi'],
                ]);
            } else {
                $surat = Data::create([
                    'nama' => $data['nama'],
                    'template' => $data['template'],
                    'deskripsi' => $data['deskripsi'],
                ]);
            }
            $fieldsData = collect($request->fields)->map(function ($field) use ($surat) {
                return [
                    'data_id' => $surat->id,
                    'nama' => $field['nama'],
                    'alias' => $field['alias'],
                    'tipe' => $field['tipe'],
                ];
            })->toArray();
    
            // Bulk insert into the database
            FieldsSurat::insert($fieldsData);
        });
        
        if (isset($data['id'])) {
            return redirect()->route('data.data')->with('success', 'Data updated successfully.');
        }
        return redirect()->route('data.data')->with('success', 'Data added successfully.');
    }

    public function edit($id)
    {
        $fields = FieldsSurat::where('data_id', $id)->get();

        return view('fields.edit', compact('fields', 'id'));
    }

    public function update(Request $request, $id)
    {
        try {
            $inputFields = $request->input('fields', []); // Input fields as an associative array
            if (empty($inputFields)) {
                return redirect()->back()->with('error', 'No fields to update.');
            }

            DB::transaction(function() use ($inputFields) {
                foreach ($inputFields as $fieldData) {
                    $field = FieldsSurat::findOrFail($fieldData['id']);
                    $field->update([
                        'nama' => $fieldData['nama'],
                        'alias' => $fieldData['alias'],
                        'tipe' => $fieldData['tipe'],
                    ]);

                }
            });
    
            return redirect()->route('data.data')->with('success', 'Data updated successfully.');

        } catch (\Throwable $th) {
            return redirect()->route('data.data')->with('error', $th->getMessage());
        }

    }
}
