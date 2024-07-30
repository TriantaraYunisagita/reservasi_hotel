<li class="menu-header">MAIN MENU</li>
<li class="nav-item {{request()->is('customer/pembayaran')? 'active' : ''}}">
    <a href="{{url('customer/pembayaran')}}"><i class="fas fa-money-bill-wave"></i><span>Pembayaran</span></a>
</li>
<li class="nav-item {{request()->is('customer/reservasi')? 'active' : ''}}">
    <a href="{{url('customer/reservasi')}}"><i class="fas fa-landmark"></i><span>Reservasi</span></a>
</li>