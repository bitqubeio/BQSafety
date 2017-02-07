<?php

namespace App\Http\Controllers;

use App\Location;
use App\Http\Requests\LocationCreateRequest;
use App\Http\Requests\LocationUpdateRequest;
use Yajra\Datatables\Facades\Datatables;
use narutimateum\Toastr\Facades\Toastr;

class LocationController extends Controller
{
    public function listing()
    {
        // locations
        $locations = Location::select([
            'id',
            'location_name',
            'location_description',
            'location_status',
            'created_at'
        ])->get();

        // return
        return Datatables::of($locations)
            ->addColumn('delete', function ($location) {
                return '<input type="checkbox" name="row-' . $location->id . '">';
            })
            ->addColumn('action', function ($location) {
                if ($location->location_status) {
                    $estado = '<i class="fa fa-toggle-on" title="Activo"></i>';
                } else {
                    $estado = '<i class="fa fa-toggle-off" title="Inactivo"></i>';
                }
                return '<a href="location/' . $location->id . '" title="Ver"><i class="fa fa-eye"></i></a>
                        <a href="location/' . $location->id . '/edit" title="Editar"><i class="fa fa-pencil"></i></a>
                        ' . $estado . '
                        <button type="button" value="' . $location->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-close" aria-hidden="true" title="Eliminar"></i></button>';
            })
            ->editColumn('created_at', function ($location) {
                return '<span class="badge badge-success badge-md"><i class="fa fa-clock-o"></i> ' . $location->created_at->toFormattedDateString() . '</span>';
            })
            ->editColumn('location_name', function ($location) {
                return '<p>' . $location->location_name . '</p><p class="small">Creado ' . $location->created_at->diffForHumans() . '</p>';
            })
            ->rawColumns(['delete', 'action', 'created_at', 'location_name'])
            ->make(true);
    }

    public function index()
    {
        // view
        return view('location.index');
    }

    public function create()
    {
        // view
        return view('location.create');
    }

    public function store(LocationCreateRequest $request)
    {
        // store
        Location::create($request->all());

        // notification
        Toastr::success(
            '¡Agregado correctamente!',
            $title = $request->input('location_name'),
            $options = [
                // options
            ]
        );

        // condition
        if ($request->input('action') === 'Guardar')
            return redirect()->route('location.index');

        // redirect
        return redirect()->route('location.create');
    }

    public function show($id)
    {
        // find
        $location = Location::findOrFail($id);

        // redirect
        return view('location.show', ['location' => $location]);
    }

    public function edit($id)
    {
        // find
        $location = Location::findOrFail($id);

        // redirection
        return view('location.edit', ['location' => $location]);
    }

    public function update(LocationUpdateRequest $request, $id)
    {
        // find
        $location = Location::findOrfail($id);

        // title
        $titles = $location->location_name;

        // request
        $location->fill($request->all());

        // save
        $location->save();

        // notification
        Toastr::success(
            '¡Actualizado correctamente!',
            $title = $titles,
            $options = [
                // options
            ]
        );

        // redirect
        return redirect()->route('location.index');
    }

    public function destroy($id)
    {
        // find
        $location = Location::findOrFail($id);

        // title for alerts
        $title = $location->location_name;

        // delete
        $location->delete();

        // response
        return response()->json([
            'title' => $title,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
