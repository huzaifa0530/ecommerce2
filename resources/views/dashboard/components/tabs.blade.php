<ul class="nav nav-tabs mb-3" id="{{ $id ?? 'customTabs' }}" role="tablist">
    @foreach ($tabs as $key => $tab)
        <li class="nav-item">
            <a class="nav-link {{ $loop->first ? 'active' : '' }} text-uppercase"
               id="{{ $key }}-tab"
               data-toggle="tab"
               href="#{{ $key }}"
               role="tab"
               aria-controls="{{ $key }}"
               aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                {{ $tab['title'] }}
            </a>
        </li>
    @endforeach
</ul>

<div class="tab-content" id="{{ $id ?? 'customTabs' }}Content">
    @foreach ($tabs as $key => $tab)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
             id="{{ $key }}"
             role="tabpanel"
             aria-labelledby="{{ $key }}-tab">
            {!! $tab['content'] !!}
        </div>
    @endforeach
</div>
