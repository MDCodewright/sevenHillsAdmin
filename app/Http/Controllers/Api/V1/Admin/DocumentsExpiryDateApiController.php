<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DocumentsExpiryDate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDocumentsExpiryDateRequest;
use App\Http\Requests\UpdateDocumentsExpiryDateRequest;
use App\Http\Resources\Admin\DocumentsExpiryDateResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentsExpiryDateApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documents_expiry_date_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentsExpiryDateResource(DocumentsExpiryDate::with(['owner'])->get());
    }

    public function store(StoreDocumentsExpiryDateRequest $request)
    {
        $documentsExpiryDate = DocumentsExpiryDate::create($request->all());

        if ($request->input('document', false)) {
            $documentsExpiryDate->addMedia(storage_path('tmp/uploads/' . $request->input('document')))->toMediaCollection('document');
        }

        return (new DocumentsExpiryDateResource($documentsExpiryDate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocumentsExpiryDate $documentsExpiryDate)
    {
        abort_if(Gate::denies('documents_expiry_date_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentsExpiryDateResource($documentsExpiryDate->load(['owner']));
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

        return (new DocumentsExpiryDateResource($documentsExpiryDate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocumentsExpiryDate $documentsExpiryDate)
    {
        abort_if(Gate::denies('documents_expiry_date_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentsExpiryDate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
