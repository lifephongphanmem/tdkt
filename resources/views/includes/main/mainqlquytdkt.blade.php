@if(canGeneral('qlquytdkt','index'))
    @if(can('qlquytdkt','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Quản lý quỹ thi đua khen thưởng">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Quản lý quỹ thi đua khen thưởng</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('qldauvao','index'))
                    <li>
                        <a href="{{url('qldauvao')}}">Quản lý khoản thu</a>
                    </li>
                @endif
                @if(can('qlchihdtdkt','index'))
                    <li>
                        <a href="{{url('qlchihdtdkt')}}">Quản lý chi hoạt động TĐKT</a>
                    </li>
                @endif
                @if(can('qldmchi','index'))
                    <li>
                        <a href="{{url('qldmchi')}}">Quản lý danh mục chi</a>
                    </li>
                @endif
                @if(can('baocaoquy','index'))
                    <li>
                        <a href="{{url('baocaoquy')}}">Báo cáo tổng hợp</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
@endif