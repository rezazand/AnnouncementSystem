@if ($paginator->lastPage() > 1)
    {{($paginator->currentPage()-1)*10}}-{{$paginator->currentPage()*10}}/{{$paginator->lastPage()*10}}
    <div class="btn-group mb-1">
        <a class="btn btn-default btn-sm {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}"
           href="{{$paginator->currentPage() == 1 ? '#':$paginator->url($paginator->currentPage()-1)}}"><i
                class="fa fa-chevron-right"></i></a>


        <a class="btn btn-default btn-sm {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}"
           href="{{$paginator->currentPage() == $paginator->lastPage() ? '#':$paginator->url($paginator->currentPage()+1)}}"><i
                class="fa fa-chevron-left"></i></a>

    </div>
@endif
