<?php

namespace App\Http\Requests;

use App\DocumentsExpiryDate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDocumentsExpiryDateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('documents_expiry_date_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title'       => [
                'required',
                'unique:documents_expiry_dates',
            ],
            'expiry_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'owner_id'    => [
                'required',
                'integer',
            ],
        ];
    }
}
