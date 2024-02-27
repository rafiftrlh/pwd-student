<?php

namespace App\Http\Controllers;

use App\Models\Master\Student;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public static function index()
    {
        return view('components.tables.student_table');
    }

    public static function getDataStudent()
    {
        $data = DB::select("select * from student");

        return $data;
    }

    public static function getStudentAll()
    {
        return Student::with('getClass')->get();
    }

    public function store(Request $request)
    {
        try {
            $student = new Student();
            $student->nama = $request->nama;
            $student->nis = $request->nis;
            $student->umur = $request->umur;
            $student->alamat = $request->alamat;
            // $student->jeniskelamin = $request->gender;
            $student->class_id = $request->class_id;

            $student->save();

            return response()->json([
                'messege' => 'Berhasil Tambah Data',
                'data' => $student
            ]);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public static function create()
    {
        return view('components.forms.create_form');
    }

    public static function update(Request $request, $id)
    {

        $before = DB::table('students')->where("id", $id)->first();
        $now = now();
        $data = DB::select(
            "update students set 
        nama = '$request->nama',
        nis = '$request->nis',
        updated_at = '$now',
        created_at = '$before->created_at'
        where id = '$id'"
        );

        // $insert = DB::table('students')->where("id", $id)->insert([
        //     "nama" => $request->nama
        // ]);

        $student = Student::find($id);
        return $data;

        // $student->nama = $request->nama;
        // $student->nis = $request->nis;
        // $student->umur = $request->age;
        // $student->alamat = $request->address;
        // $student->jeniskelamin = $request->gender;
        // $student->class_id = $request->class_id;

        // $student->save();

        // $update = $data::where($id);
        // $updated = Student::find($id);

        // return $updated;
    }

    public function destroy(Request $request, $id)
    {
        try {

            $student = Student::destroy($id);

            if ($student) {
                return "Data berhasil terhapus";
            } else {
                return "Tidak ada data dengan id = $id";
            }
        } catch (\Exception $e) {

            throw $e;

        }
    }
}