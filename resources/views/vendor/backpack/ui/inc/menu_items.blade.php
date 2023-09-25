{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" icon="la la-user" :link="backpack_url('user')" />
<x-backpack::menu-item title="Zones" icon="la la-building" :link="backpack_url('zone')" />
<x-backpack::menu-item title="App preferences" icon="la la-exclamation" :link="backpack_url('edit-app-info')" />

<x-backpack::menu-item title="Otp codes" icon="la la-question" :link="backpack_url('otp-code')" />
<x-backpack::menu-item title="Userimports" icon="la la-question" :link="backpack_url('userimport')" />