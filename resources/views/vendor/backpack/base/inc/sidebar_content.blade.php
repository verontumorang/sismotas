{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('teacher') }}"><i class="nav-icon la la-question"></i> Teachers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('course') }}"><i class="nav-icon la la-question"></i> Courses</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('schedule') }}"><i class="nav-icon la la-question"></i> Schedules</a></li>