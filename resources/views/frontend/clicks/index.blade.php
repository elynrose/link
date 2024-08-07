@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('click_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.clicks.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.click.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.click.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Click">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.click.fields.link') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.click.fields.click_count') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.click.fields.source') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.click.fields.user_agent') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.click.fields.ip_address') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clicks as $key => $click)
                                    <tr data-entry-id="{{ $click->id }}">
                                        <td>
                                            {{ $click->link->custom_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $click->click_count ?? '' }}
                                        </td>
                                        <td>
                                            {{ $click->source ?? '' }}
                                        </td>
                                        <td>
                                            {{ $click->user_agent ?? '' }}
                                        </td>
                                        <td>
                                            {{ $click->ip_address ?? '' }}
                                        </td>
                                        <td>
                                            @can('click_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.clicks.show', $click->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('click_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.clicks.edit', $click->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('click_delete')
                                                <form action="{{ route('frontend.clicks.destroy', $click->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('click_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.clicks.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Click:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection