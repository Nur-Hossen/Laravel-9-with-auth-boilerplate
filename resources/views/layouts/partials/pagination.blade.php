<div class="row">
    <div class="col-sm-12 col-md-5">
      <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries</div>
    </div>
    <div class="col-sm-12 col-md-7">
      <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
        @if ($paginator->hasPages())
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="paginate_button page-item previous disabled" id="example2_previous">
                    <a href="#" class="page-link">Previous</a>
                </li>
            @else
                <li class="paginate_button page-item previous" id="example2_previous">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link">Previous</a>
                </li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="paginate_button page-item disabled">
                        <a href="#" class="page-link">{{ $element }}</a>
                    </li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginate_button page-item active">
                                <a href="#" class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="paginate_button page-item ">
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif               
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next" id="example2_next">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link">Next</a>
                </li>
            @else
                <li class="paginate_button page-item next disabled" id="example2_next">
                    <a href="#" class="page-link">Next</a>
                </li>
            @endif
        </ul>
        @endif
      </div>
    </div>
</div>