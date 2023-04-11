{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('teacher') }}"><i class="nav-icon la la-user"></i> Teachers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('course') }}"><i class="nav-icon la la-school"></i> Courses</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('teacher-class') }}"><i class="nav-icon la la-school"></i> Teacher Class</a></li>