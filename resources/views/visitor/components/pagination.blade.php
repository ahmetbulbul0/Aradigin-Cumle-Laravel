@isset($data['pagination'])
    <div class="outPaginate">
        <div class="inPaginate">

            @isset($data['pagination']['previousPage'])
                <a href="{{ $data['pagination']['previousPage'] }}">
                    <i class="fas fa-arrow-left"></i>
                </a>
            @endisset

            @if ($data['pagination']['nowPage'] > 3)
                <span class="emptiess">...</span>
            @endif

            @if ($data['pagination']['previousPreviousPage'])
                <a class="number" href="{{ $data['pagination']['mainLink'] }}/{{ $data['pagination']['previousPreviousPage'] }}">{{ $data['pagination']['previousPreviousPage'] }}</a>
            @endif

            @if ($data['pagination']['previousPage'])
                <a class="number" href="{{ $data['pagination']['mainLink'] }}/{{ $data['pagination']['previousPage'] }}">{{ $data['pagination']['previousPage'] }}</a>
            @endif

            <a class="number active" href="{{ $data['pagination']['mainLink'] }}/{{ $data['pagination']['nowPage'] }}">{{ $data['pagination']['nowPage'] }}</a>

            @if ($data['pagination']['nextPage'])
                <a class="number" href="{{ $data['pagination']['mainLink'] }}/{{ $data['pagination']['nextPage'] }}">{{ $data['pagination']['nextPage'] }}</a>
            @endif

            @if ($data['pagination']['nextNextPage'])
                <a class="number" href="{{ $data['pagination']['mainLink'] }}/{{ $data['pagination']['nextNextPage'] }}">{{ $data['pagination']['nextNextPage'] }}</a>
            @endif

            @if (($data['pagination']['nowPage'] + 2) < $data['pagination']['totalPageNumber'])
                <span class="emptiess">...</span>
            @endif

            @isset($data['pagination']['nextPage'])
                <a class="number" href="{{ $data['pagination']['nextPage'] }}">
                    <i class="fas fa-arrow-right"></i>
                </a>
            @endisset

        </div>
    </div>
@endisset
