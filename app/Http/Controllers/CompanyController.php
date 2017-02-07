<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Yajra\Datatables\Facades\Datatables;
use narutimateum\Toastr\Facades\Toastr;

class CompanyController extends Controller
{
    public function listing()
    {
        // companies
        $companies = Company::select([
            'id',
            'company_name',
            'company_description',
            'company_status',
            'created_at'
        ])->get();

        // return
        return Datatables::of($companies)
            ->addColumn('delete', function ($company) {
                return '<input type="checkbox" name="row-' . $company->id . '">';
            })
            ->addColumn('action', function ($company) {
                if ($company->company_status) {
                    $estado = '<i class="fa fa-toggle-on" title="Activo"></i>';
                } else {
                    $estado = '<i class="fa fa-toggle-off" title="Inactivo"></i>';
                }
                return '<a href="company/' . $company->id . '" title="Ver"><i class="fa fa-eye"></i></a>
                        <a href="company/' . $company->id . '/edit" title="Editar"><i class="fa fa-pencil"></i></a>
                        ' . $estado . '
                        <button type="button" value="' . $company->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-close" aria-hidden="true" title="Eliminar"></i></button>';
            })
            ->editColumn('created_at', function ($company) {
                return '<span class="badge badge-success badge-md"><i class="fa fa-clock-o"></i> ' . $company->created_at->toFormattedDateString() . '</span>';
            })
            ->editColumn('company_name', function ($company) {
                return '<p>' . $company->company_name . '</p><p class="small">Creado ' . $company->created_at->diffForHumans() . '</p>';
            })
            ->rawColumns(['delete', 'action', 'created_at', 'company_name'])
            ->make(true);
    }

    public function index()
    {
        // view
        return view('company.index');
    }

    public function create()
    {
        // view
        return view('company.create');
    }

    public function store(CompanyCreateRequest $request)
    {
        // store
        Company::create($request->all());

        // notification
        Toastr::success(
            '¡Agregado correctamente!',
            $title = $request->input('company_name'),
            $options = [
                // options
            ]
        );

        // condition
        if ($request->input('action') === 'Guardar')
            return redirect()->route('company.index');

        // redirect
        return redirect()->route('company.create');
    }

    public function show($id)
    {
        // fin
        $company = Company::findOrFail($id);

        // redirect
        return view('company.show', ['company' => $company]);
    }

    public function edit($id)
    {
        // find
        $company = Company::findOrFail($id);

        // redirection
        return view('company.edit', ['company' => $company]);
    }

    public function update(CompanyUpdateRequest $request, $id)
    {
        // find
        $company = Company::findOrfail($id);

        // title
        $titles = $company->company_name;

        // request
        $company->fill($request->all());

        // save
        $company->save();

        // notification
        Toastr::success(
            '¡Actualizado correctamente!',
            $title = $titles,
            $options = [
                // options
            ]
        );

        // redirect
        return redirect()->route('company.index');
    }

    public function destroy($id)
    {
        // find
        $company = Company::findOrFail($id);

        // title for alerts
        $title = $company->company_name;

        // delete
        $company->delete();

        // response
        return response()->json([
            'title' => $title,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
