@if(canGeneral('qltailieu','index'))
    @if(can('qltailieu','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Quản lý tài liệu liên quan">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Quản lý tài liệu liên quan</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('qlquyetdinhkt','index'))
                    <li>
                        <a href="{{url('qlquyetdinhkt')}}">Quản lý quyết định khen thưởng</a>
                    </li>
                @endif

                @if(can('qltotrinhkt','index'))
                    <!--li>
                        <a href="{{url('qltotrinhkt')}}">Quản lý tờ trình khen thưởng</a>
                    </li>
                @endif
                @if(can('qlbienban','index'))
                    <li>
                        <a href="{{url('qlbienban')}}">Quản lý biên bản</a>
                    </li>
                @endif
                @if(can('qlfile','index'))
                    <li>
                        <a href="{{url('qlfile')}}">Quản lý tài liệu file đính kèm</a>
                    </li-->
                @endif
                @if(can('qlphontraotd','index'))
                    <li>
                        <a href="{{url('qlphontraotd')}}">Quản lý phong trào thi đua khen thưởng</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
@endif