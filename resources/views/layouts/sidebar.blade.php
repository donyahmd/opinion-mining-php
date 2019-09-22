{{-- <li class="header">MAIN NAVIGATION</li> --}}
<li class="treeview">
    <a href="#">
        <i class="fa fa-home"></i> <span>Home</span>
    </a>
</li>
<li>
  <a href="{{ URL::to('devices') }}">
    <i class="fa fa-tablet"></i> <span>Devices</span>
    <span class="pull-right-container">
        <small class="label pull-right bg-red" title="2 device not connected/error">1</small>
        <small class="label pull-right bg-green" title="16 device connected successfully">1</small>
    </span>
  </a>
</li>
<li class="treeview">
  <a href="#">
    <i class="fa fa-gear"></i> <span>Setting</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
    <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
    <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
  </ul>
</li>
