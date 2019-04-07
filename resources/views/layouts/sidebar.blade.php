<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">MKULIMA DIGITAL </div>
  <div class="list-group list-group-flush">
    <a href="{{ url('/dashboard') }}" class="{{Request::is('dashboard') ? 'active': ''}} list-group-item list-group-item-action">Dashboard</a>
    @permission(['VIEW-FARMER'])
    <a href="{{ url('/farmers') }}" class="{{Request::is('farmers') ? 'active': ''}} list-group-item list-group-item-action">Farmers</a>
    @endpermission
    @permission(['VIEW-FARMER'])
    <a href="{{ url('/employees') }}" class="{{Request::is('employees') ? 'active': ''}} list-group-item list-group-item-action">Employees</a>
    @endpermission
    <a href="{{ url('/deliveries') }}" class="{{Request::is('deliveries') ? 'active': ''}} list-group-item list-group-item-action">Deliveries</a>
    <a href="{{ url('dashboard/comments') }}" class="{{Request::is('dashboard/comments') ? 'active': ''}} list-group-item list-group-item-action">Comments</a>
    @permission(['MANAGE-SETTINGS'])
    <a href="{{ url('/settings') }}" class="{{Request::is('settings') ? 'active': ''}} list-group-item list-group-item-action">Settings</a>
    @endpermission
    @permission(['VIEW-USER'])
    <a href="{{ url('dashboard/users') }}" class="{{Request::is('dashboard/users') ? 'active': ''}} list-group-item list-group-item-action">Users</a>
    <a href="{{ url('dashboard/roles') }}" class="{{Request::is('dashboard/roles') ? 'active': ''}} list-group-item list-group-item-action">Roles</a>
    <a href="{{ url('dashboard/permissions') }}" class="{{Request::is('dashboard/permissions') ? 'active': ''}} list-group-item list-group-item-action">Permissions</a>
    @endpermission
  </div>
</div>