
<li>
    <a href="javascript:;">
        <i class="icon-folder"></i>
        <span class="title">Cụm, khối thi đua, khen thưởng</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        @if(can('dangkytd','index'))
            <li>
                <a href="{{url('/CumKhoiThiDua/DanhSach')}}">Danh sách cụm, khối</a>
            </li>
        @endif

        @if(can('laphosotd','index'))
            <li>
                <a href="{{url('/CumKhoiThiDua/ThongTin')}}">Tạo lập hồ sơ thi đua, khen thưởng</a>
            </li>
        @endif

        @if(can('duyethosocapduoi','index'))
            <li>
                <a href="{{url('/CumKhoiThiDua/XetDuyet')}}">Duyệt hồ sơ thi đua, khen thưởng</a>
            </li>
        @endif
    </ul>
</li>
