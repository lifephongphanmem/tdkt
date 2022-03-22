@if(canGeneral('tdktkhangchien','index'))
    @if(can('tdktkhangchien','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Quản lý thi đua khen thưởng thời kỳ kháng chiến">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Quản lý khen thưởng thời kỳ kháng chiến</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('chongphapcanhan','index'))
                    <li>
                        <a href="{{url('chongphapcanhan')}}">Quản lý khen thưởng kháng chiến chống Pháp (cá nhân)</a>
                    </li>
                @endif
                @if(can('chongmycanhan','index'))
                    <li>
                        <a href="{{url('chongmycanhan')}}">Quản lý khen thưởng kháng chiến chông Mỹ (cá nhân)</a>
                    </li>
                @endif
                @if(can('chongmygiadinh','index'))
                    <li>
                        <a href="{{url('chongmygiadinh')}}">Quản lý khen thưởng gia đình chống Mỹ</a>
                    </li>
                @endif
                @if(can('ktthutuong','index'))
                    <li>
                        <a href="{{url('ktthutuong')}}">Quản lý bằng khen thủ tướng</a>
                    </li>
                @endif
                    @if(can('ktctubnd','index'))
                        <li>
                            <a href="{{url('ktctubnd')}}">Quản lý bằng khen chủ tịch UBND tỉnh</a>
                        </li>
                    @endif
                    @if(can('kyniemchuong','index'))
                        <li>
                            <a href="{{url('kyniemchuong')}}">Quản lý kỷ niệm chương</a>
                        </li>
                    @endif
            </ul>
        </li>
    @endif
@endif