@if(canGeneral('hiepykhenthuong','index'))
    @if(can('hiepykhenthuong','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Quản lý hiệp y khen thưởng">
            <a href="{{url('hiepykhenthuong')}}"><i class="icon-folder"></i>Quản lý Hiệp y khen thưởng</a>
        </li>
    @endif
@endif