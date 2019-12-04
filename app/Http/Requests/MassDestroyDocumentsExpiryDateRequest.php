<?php

namespace App\Http\Requests;

use App\DocumentsExpiryDate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDocumentsExpiryDateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('documents_expiry_date_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:documents_expiry_dates,id',
        ];
    }
}
