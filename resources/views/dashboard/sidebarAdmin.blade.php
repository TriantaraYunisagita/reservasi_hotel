<li class="menu-header">MAIN MENU</li>
<li class="nav-item {{request()->is('admin/user')? 'active' : ''}}">
    <a href="{{url('admin/user')}}"><i class="fas fa-users"></i><span>Users</span></a>
</li>
<li class="nav-item {{request()->is('admin/customers')? 'active' : ''}}">
    <a href="{{url('admin/customers')}}"><i class="fas fa-id-badge"></i><span>Customers</span></a>
</li>
<li class="nav-item {{request()->is('admin/kamar')? 'active' : ''}}">
    <a href="{{url('admin/kamar')}}"><i class="fas fa-bed"></i><span>Kamar</span></a>
</li>
<li class="nav-item {{request()->is('admin/hargahariini')? 'active' : ''}}">
    <a href="{{url('admin/hargahariini')}}"><i class="fas fa-building"></i><span>Harga Hari Ini</span></a>
</li>
<li class="nav-item {{request()->is('admin/invoice')? 'active' : ''}}">
    <a href="{{url('admin/invoice')}}"><i class="fas fa-file-invoice"></i><span>Invoice</span></a>
</li>
<li class="nav-item {{request()->is('admin/pembayaran')? 'active' : ''}}">
    <a href="{{url('admin/pembayaran')}}"><i class="fas fa-money-bill-wave"></i><span>Pembayaran</span></a>
</li>
<li class="nav-item {{request()->is('admin/reservasi')? 'active' : ''}}">
    <a href="{{url('admin/reservasi')}}"><i class="fas fa-landmark"></i><span>Reservasi</span></a>
</li>