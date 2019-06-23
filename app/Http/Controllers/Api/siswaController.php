<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\user;
use App\siswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        if (count($siswa) < 0) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Siswa tidak ditemukan.'
            ];
            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $siswa,
            'message' => 'Berhasil.'
        ];

        return response()->json($response, 200);
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
        // 1. tampung semua imputan ke $input;
        $input = $request->all();

        //2. Buat validasi ditampung ke $validator
        $validator = Validator::make($input, [
            'nama' => 'required|min::15'
        ]);

        // 3. Chek validasi
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validator Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        // 4. buat fungsi untuk menghandle semua inputan ->
        // dimasukan ke table
        $siswa = Siswa::create($input);

        // 5. menampilkan response
        $response = [
            'success' => true,
            'data' => $siswa,
            'message' => 'Siswa Berhasil ditambahkan.'
        ];

        // 6. tampilkan hasil
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = siswa::Find($id);
        if (!$siswa) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Siswa tidak ditemukan.'
            ];
            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $siswa,
            'message' => 'Berhasil.'
        ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $input = $request->all();

        if (!$siswa) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Siswa tidak ditemukan.'
            ];
            return response()->json($response, 404);
        }

        $validator = Validator::make($input, [
            'nama' => 'required|min::15'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validator Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }

        $siswa->nama = input['nama'];
        $siswa->save();

        $response = [
            'success' => true,
            'data' => $siswa,
            'message' => 'Siswa Berhasil di update.'
        ];

        return response()->json($response, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            $response = [
                'success' => false,
                'data' => 'Gagal update.',
                'message' => 'Siswa Tidak Ditemukan'
            ];
            return response()->json($response, 404);

            $siswa->delete();
            $response = [
                'success' => true,
                'data' => $siswa,
                'message' => 'Siswa Berhasil Dihapus.'
            ];

            return response()->json($response, 200);
        }
    }
}
