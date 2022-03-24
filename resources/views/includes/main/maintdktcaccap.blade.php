@if(canGeneral('tdktcaccap','index'))
    @if(can('tdktcaccap','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Quản lý thi đua khen thưởng thời kỳ kháng chiến">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Quản lý thi đua, khen thưởng các cấp</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('dangkytd','index'))
                    <li>
                        <a href="{{url('/DanhKyThiDua/ThongTin')}}">Phong trào thi đua</a>
                    </li>
                @endif
                <!--
                @if(can('duyetdktd','index'))
                    <li>
                        <a href="{{url('duyetdktd')}}">Duyệt đăng ký thi đua</a>
                    </li>
                @endif
                        -->
                @if(can('laphosotd','index'))
                    <li>
                        <a href="{{url('/HoSoThiDua/ThongTin')}}">Tạo lập hồ sơ đăng ký thi đua khen thưởng</a>
                    </li>
                @endif

                @if(can('duyethosocapduoi','index'))
                    <li>
                        <a href="{{url('/XetDuyetHoSoThiDua/ThongTin')}}">Duyệt hồ sơ đăng ký thi đua cấp dưới</a>
                    </li>
                @endif

{{--                @if(can('denghitang','index'))--}}
{{--                    <li>--}}
{{--                        <a href="{{url('denghitang')}}">Lập danh sách đề nghị tặng DHTĐ và HTKT</a>--}}
{{--                    </li>--}}
{{--                @endif--}}
{{--                @if(can('duyetdenghitang','index'))--}}
{{--                    <li>--}}
{{--                        <a href="{{url('duyetdenghitang')}}">Duyệt danh sách đề nghị tặng DHTĐ và HTKT</a>--}}
{{--                    </li>--}}
{{--                @endif--}}
            </ul>
        </li>
    @endif
@endif