@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('social_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.socials.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.social.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.social.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Social">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.link') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.template') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.template.fields.style') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.template.fields.javascript') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.logo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.page_title') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($socials as $key => $social)
                                    <tr data-entry-id="{{ $social->id }}">
                                        <td>
                                            {{ $social->link->destination ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->template->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->template->style ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->template->javascript ?? '' }}
                                        </td>
                                        <td>
                                            @if($social->logo)
                                                <a href="{{ $social->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $social->logo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $social->page_title ?? '' }}
                                        </td>
                                        <td>
                                            @can('social_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.socials.show', $social->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('social_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.socials.edit', $social->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('social_delete')
                                                <form action="{{ route('frontend.socials.destroy', $social->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('social_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.socials.massDestroy') }}",
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
  let table = $('.datatable-Social:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection