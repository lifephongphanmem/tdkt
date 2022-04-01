
<li>
    <a href="javascript:;">
        <i class="icon-folder"></i>
        <span class="title">Thi đua, khen thưởng các cấp</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
{{--        Phong trào thi đua--}}
        @if(can('tdktcaccap','index'))
            <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                data-original-title="Quản lý thi đua khen thưởng các cấp">
                <a href="javascript:;">
                    <span class="title">Phong trào thi đua</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(can('dangkytd','index'))
                        <li>
                            <a href="{{url('/DanhKyThiDua/ThongTin')}}">Danh sách phong trào thi đua</a>
                        </li>
                    @endif

                    @if(can('laphosotd','index'))
                        <li>
                            <a href="{{url('/HoSoThiDua/ThongTin')}}">Tạo lập hồ sơ đăng ký thi đua</a>
                        </li>
                    @endif

                    @if(can('duyethosocapduoi','index'))
                        <li>
                            <a href="{{url('/HoSoThiDua/XetDuyet')}}">Duyệt hồ sơ đăng ký thi đua</a>
                        </li>
                    @endif

                        <li>
                            <a href="{{url('/HoSoThiDua/KhenThuong')}}">Khen thưởng phong trào thi đua</a>
                        </li>
                </ul>
            </li>
        @endif

{{--        Khen thưởng theo công trạng--}}
        @if(can('tdktcaccap','index'))
            <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                data-original-title="Quản lý thi đua khen thưởng các cấp">
                <a href="javascript:;">
                    <span class="title">Khen thưởng theo công trạng</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    @if(can('laphosotd','index'))
                        <li>
                            <a href="{{url('/KhenThuongCongTrang/ThongTin')}}">Tạo lập hồ sơ đề nghị khen thưởng</a>
                        </li>
                    @endif

                    @if(can('duyethosocapduoi','index'))
                        <li>
                            <a href="{{url('/KhenThuongCongTrang/XetDuyet')}}">Duyệt hồ sơ đề nghị khen thưởng</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

{{--        Khen thưởng đột xuất--}}
        @if(can('tdktcaccap','index'))
            <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                data-original-title="Quản lý thi đua khen thưởng các cấp">
                <a href="javascript:;">
                    <span class="title">Khen thưởng đột xuất</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    @if(can('laphosotd','index'))
                        <li>
                            <a href="{{url('/KhenThuongDotXuat/ThongTin')}}">Tạo lập hồ sơ đề nghị khen thưởng</a>
                        </li>
                    @endif

                    @if(can('duyethosocapduoi','index'))
                        <li>
                            <a href="{{url('/KhenThuongDotXuat/XetDuyet')}}">Duyệt hồ sơ đề nghị khen thưởng</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
    </ul>
</li>
