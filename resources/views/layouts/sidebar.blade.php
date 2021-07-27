<div class="menu_section">
<h3>General</h3>
<ul class="nav side-menu">
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Beranda</a>
    </li>
    @if(Auth::user()->role_id == 2) <li><a href="{{ route('pengajuan.index') }}"><i class="fa fa-columns"></i> Pengajuan</a>
    </li> @endif
    @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 4 || Auth::user()->role_id == 5) <li><a href="{{ route('approval.index') }}"><i class="fa fa-columns"></i> Approval</a>
    </li> @endif
    @if(Auth::user()->role_id == 5) <li><a href="{{ route('pencairan.index') }}"><i class="fa fa-columns"></i> Pencairan Dana</a>
    </li> @endif
    @if(Auth::check() && Auth::user()->role_id  == 1)
    <li><a href="{{ url('/perjalanan') }}"><i class="fa fa-map-marker"></i> Tujuan Perjalanan</a></li>
    <li><a href="{{ url('/transportasi') }}"><i class="fa fa-taxi"></i> Jenis Transportasi</a></li>
    <li><a href="{{ url('/users') }}"><i class="fa fa-user"></i> List User</a></li>
    @endif
</ul>
</div>