@switch($status)
    @case('DRAFT')
        <span class="badge badge-info">{{ $status }}</span>
    @break

    @case('DONE')
        <span class="badge badge-success">{{ $status }}</span>
    @break

    @default
        <span class="badge badge-danger">{{ $status }}</span>
    @break
@endswitch
