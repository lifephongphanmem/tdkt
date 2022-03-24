@if(canGeneral('qldoituong','index'))
    @if(can('qldoituong','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Quản lý danh sách đối tượng">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Quản lý danh sách đối tượng</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('qldoituongcn','index'))
                    <li>
                        <a href="{{url('qldoituongcn')}}">Quản lý đối tượng cá nhân</a>
                    </li>
                @endif
                @if(can('qldoituongtt','index'))
                    <li>
                        <a href="{{url('qldoituongtt')}}">Quản lý đối tượng tập thể</a>
                    </li>
                @endif

            </ul>
        </li>
    @endif
@endif