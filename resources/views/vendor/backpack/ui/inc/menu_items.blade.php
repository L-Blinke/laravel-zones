{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Zone preferences" icon="la la-cog" :link="backpack_url('preferences/1/edit')" />
<x-backpack::menu-item title="Users" icon="la la-user" :link="backpack_url('user')" />
<x-backpack::menu-item title="Zones" icon="la la-building" :link="backpack_url('zone')" />
<x-backpack::menu-item title="Otp codes" icon="la la-key" :link="backpack_url('otp-code')" />
<x-backpack::menu-item title="Pathology types" icon="la la-heartbeat" :link="backpack_url('pathology-type')" />
<x-backpack::menu-item title="Pathologies" icon="la la-notes-medical" :link="backpack_url('pathologies')" />
<x-backpack::menu-item title="Medical insurances" icon="la la-hospital" :link="backpack_url('medical-insurance')" />
<x-backpack::menu-item title="Clinical logs" icon="la la-file-medical" :link="backpack_url('clinical-log')" />

<x-backpack::menu-item title="Zone components" icon="la la-question" :link="backpack_url('zone-component')" />
<x-backpack::menu-item title="Reports" icon="la la-question" :link="backpack_url('report')" />