{{-- <li class="header">MAIN NAVIGATION</li> --}}
<li class="{{ \Request::is('/') ? 'active' : '' }}">
    <a href="{{ URL::to('/') }}">
        <i class="fa fa-home"></i> <span>Beranda</span>
    </a>
</li>
<li class="{{ \Request::is('komentar') ? 'active' : '' }}">
    <a href="{{ route('komentar.index_komentar') }}">
        <i class="fa fa-comments"></i> <span>Komentar</span>
        {{-- <span class="pull-right-container">
            <small class="label pull-right bg-green" title="16 device connected successfully">1</small>
        </span> --}}
    </a>
</li>
<li class="treeview">
    <a href="{{ URL::to('/') }}">
        <i class="fa fa-tasks"></i> <span>Opinion Mining</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('komentar.index_preproses') }}"><i class="fa fa-comment"></i> Preprosesing Komentar</a></li>
        <li><a href="{{ route('komentar.index_klasifikasi') }}"><i class="fa fa-bar-chart"></i> Klasifikasi</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="{{ URL::to('/') }}">
        <i class="fa fa-gear"></i> <span>Pengaturan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ \Request::is('pengaturan/mining') ? 'active' : '' }}"><a href="{{ URL::to('pengaturan/mining') }}"><i class="fa fa-cogs"></i> Mining</a></li>
        <li><a href="invoice.html"><i class="fa fa-info"></i> Tentang Aplikasi</a></li>
    </ul>
</li>
