@if ($crud->hasAccess('update'))
  <a href="{{ url($crud->route.'/'.$entry->getKey().'/schedule') }}" class="btn btn-sm btn-link text-capitalize"><i class="la la-calendar"></i> schedule</a>
@endif