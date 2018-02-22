<?php

namespace App\Http\Controllers;

use App\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return Ruangan::paginate(10);
	}

	public function all() {
		//
		return Ruangan::all();
	}

	public function search(Request $request) {
		return Ruangan::where('namaruangan', 'LIKE', "%$request->q%")->paginate(10);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
		$request->validate([
			'namaruangan' => 'required',
		]);
		$ruangan = Ruangan::create($request->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
		return Ruangan::find($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
		$request->validate([
			'namaruangan' => 'required',
		]);
		$ruangan = Ruangan::find($id)->update($request->all());
		if ($ruangan) {
			return response(200);
		} else {
			return response(500);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		$ruangan = Ruangan::destroy($id);
		if ($ruangan) {
			return response(200);
		} else {
			return response(500);
		}
	}
}
