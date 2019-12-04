@extends('layouts.admin')
@section('content')
@can('documents_expiry_date_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.documents-expiry-dates.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.documentsExpiryDate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.documentsExpiryDate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DocumentsExpiryDate">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.documentsExpiryDate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentsExpiryDate.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentsExpiryDate.fields.expiry_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentsExpiryDate.fields.owner') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentsExpiryDate.fields.document') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentsExpiryDates as $key => $documentsExpiryDate)
                        <tr data-entry-id="{{ $documentsExpiryDate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $documentsExpiryDate->id ?? '' }}
                            </td>
                            <td>
                                {{ $documentsExpiryDate->title ?? '' }}
                            </td>
                            <td>
                                {{ $documentsExpiryDate->expiry_date ?? '' }}
                            </td>
                            <td>
                                {{ $documentsExpiryDate->owner->name ?? '' }}
                            </td>
                            <td>
                                {{ $documentsExpiryDate->owner->email ?? '' }}
                            </td>
                            <td>
                                @if($documentsExpiryDate->document)
                                    <a href="{{ $documentsExpiryDate->document->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('documents_expiry_date_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.documents-expiry-dates.show', $documentsExpiryDate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('documents_expiry_date_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.documents-expiry-dates.edit', $documentsExpiryDate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('documents_expiry_date_delete')
                                    <form action="{{ route('admin.documents-expiry-dates.destroy', $documentsExpiryDate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('documents_expiry_date_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.documents-expiry-dates.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-DocumentsExpiryDate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection