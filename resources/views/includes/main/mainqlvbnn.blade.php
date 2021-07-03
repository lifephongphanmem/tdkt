@if(canGeneral('qlvbnn','index'))
    @if(can('qlvbnn','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Quản lý văn bản pháp lý, hướng dẫn, hỏi đáp">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Quản lý văn bản pháp lý, hướng dẫn, hỏi đáp</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('vbpq','index'))
                    <!--li>
                        <a href="{{url('vbpq')}}">Quản lý văn bản pháp quy</a>
                    </li>
                @endif
                @if(can('vbhd','index'))
                    <li>
                        <a href="{{url('vbhd')}}">Quản lý văn bản hướng dẫn</a>
                    </li-->
                @endif
                @if(can('qlhoidap','index'))
                    <li>
                        <a href="{{url('qlhoidap')}}">Quản lý hỏi, đáp</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
@endif