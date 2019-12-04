<?php

namespace App\Http\Controllers\Admin;

use App\DocumentsExpiryDate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentsExpiryDateRequest;
use App\Http\Requests\StoreDocumentsExpiryDateRequest;
use App\Http\Requests\UpdateDocumentsExpiryDateRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentsExpiryDateController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documents_expiry_date_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentsExpiryDates = DocumentsExpiryDate::all();

        return view('admin.documentsExpiryDates.index', compact('documentsExpiryDates'));
    }

    public function create()
    {
        abort_if(Gate::denies('documents_expiry_date_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owners = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.documentsExpiryDates.create', compact('owners'));
    }

    public function store(StoreDocumentsExpiryDateRequest $request)
    {
        $documentsExpiryDate = DocumentsExpiryDate::create($request->all());

        if ($request->input('document', false)) {
            $documentsExpiryDate->addMedia(storage_path('tmp/uploads/' . $request->input('document')))->toMediaCollection('document');
        }

        return redirect()->route('admin.documents-expiry-dates.index');
    }

    public function edit(DocumentsExpiryDate $documentsExpiryDate)
    {
        abort_if(Gate::denies('documents_expiry_date_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owners = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $documentsExpiryDate->load('owner');

        return view('admin.documentsExpiryDates.edit', compact('owners', 'documentsExpiryDate'));
    }

    public function update(UpdateDocumentsExpiryDateRequest $request, DocumentsExpiryDate $documentsExpiryDate)
    {
        $documentsExpiryDate->update($request->all());

        if ($request->input('document', false)) {
            if (!$documentsExpiryDate->document || $request->input('document') !== $documentsExpiryDate->document->file_name) {
                $documentsExpiryDate->addMedia(storage_path('tmp/uploads/' . $request->input('document')))->toMediaCollection('document');
            }
        } elseif ($documentsExpiryDate->document) {
            $documentsExpiryDate->document->delete();
        }

        return redirect()->route('admin.documents-expiry-dates.index');
    }

    public function show(DocumentsExpiryDate $documentsExpiryDate)
    {
        abort_if(Gate::denies('documents_expiry_date_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentsExpiryDate->load('owner');

        return view('admin.documentsExpiryDates.show', compact('documentsExpiryDate'));
    }

    public function destroy(DocumentsExpiryDate $documentsExpiryDate)
    {
        abort_if(Gate::denies('documents_expiry_date_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentsExpiryDate->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentsExpiryDateRequest $request)
    {
        DocumentsExpiryDate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
