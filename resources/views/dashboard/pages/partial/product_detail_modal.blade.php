{{-- resources/views/dashboard/pages/partial/product_detail_modal.blade.php --}}

<style>
    /* Enable horizontal scrolling inside tables */
    .table-scroll {
        overflow-x: auto;
        white-space: nowrap;
    }

    /* Optional: Increase modal max width */
    .modal-lg {
        max-width: 95% !important;
    }
</style>

<div class="container-fluid">

    {{-- Basic Info --}}
    <h6>Basic Info</h6>
    <ul>
        <li>Category: {{ $product->category->name ?? '-' }}</li>
        <li>Item Number: {{ $product->item_number }}</li>
        <li>Description: {{ $product->description }}</li>
        <li>Material: {{ $product->material }}</li>
        <li>Size: {{ $product->item_size }}</li>
        <li>Imprint Area: {{ $product->imprint_area }}</li>
    </ul>

    <hr>

    {{-- Product Images --}}
    <h6>Images</h6>
    <div class="d-flex flex-wrap gap-2">
        @foreach($product->images as $image)
            <img src="{{ asset('storage/' . $image->image_path) }}" class="img-thumbnail mb-2" width="100" />
        @endforeach
    </div>

    <hr>

    {{-- Colors --}}
    <h6>Colors</h6>
    <div class="d-flex flex-wrap gap-2">
        @foreach($product->colors as $color)
            <div class="text-center mr-2">
                @if($color->color_image)
                    <img src="{{ asset('storage/' . $color->color_image) }}" class="img-thumbnail mb-1" width="50"
                        style="height:60px">
                @endif
                <div style="
                            width:40px;
                            height:40px;
                            border-radius:6px;
                            border:1px solid #ccc;
                            background: {{ $color->color_name }};
                        ">
                </div>
            </div>
        @endforeach
    </div>

    <hr>

    {{-- Top Tabs --}}
    <h6>Top Tabs</h6>
    @php
        $topTabs = $product->tabs->where('section', 'top');
    @endphp

    @if($topTabs->count() > 0)

        {{-- Tab Header --}}
        <ul class="nav nav-tabs" role="tablist">
            @foreach($topTabs as $index => $tab)
                <li class="nav-item">
                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}" data-toggle="tab" href="#top-tab-{{ $tab->id }}"
                        role="tab">
                        {{ $tab->title }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Tab Content --}}
        <div class="tab-content border p-2">

            @foreach($topTabs as $index => $tab)
                <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="top-tab-{{ $tab->id }}" role="tabpanel">

                    <div class="table-scroll">
                        <table class="table table-sm table-bordered mb-2">
                            <tbody>
                                @foreach($tab->rows as $row)
                                    <tr>
                                        <td>{{ $row->label }}</td>
                                        @foreach($row->cells as $cell)
                                            <td>{{ $cell->value }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            @endforeach

        </div>
    @endif

    <hr>


    {{-- Extra Fields --}}
<h6>Extra Details</h6>
@php
    $price_include = json_decode($product->price_include_sh ?? '[]', true);
    $lead_time = json_decode($product->lead_time_sh ?? '[]', true);
    $setup_charge = json_decode($product->setup_charge_sh ?? '[]', true);
    $repeat_setup = json_decode($product->repeat_setup_sh ?? '[]', true);
@endphp

<ul>

    {{-- BLANK --}}
    <li><strong>Price Include (Blank):</strong> {{ show_value($product->price_include_blank, ' | ') }}</li>
    <li><strong>Lead Time (Blank):</strong> {{ show_value($product->lead_time_repeat_blank) }}</li>
    <li><strong>MOQ:</strong> {{ show_value($product->MOQ_blank) }}</li>

    <hr>

    {{-- SPOT / HEAT --}}
    <li><strong>Price Include (Spot):</strong> {{ show_value($price_include[0] ?? '-') }}</li>
    <li><strong>Price Include (Heat):</strong> {{ show_value($price_include[1] ?? '-') }}</li>

    <li><strong>Lead Time (Spot):</strong> {{ show_value($lead_time[0] ?? '-') }}</li>
    <li><strong>Lead Time (Heat):</strong> {{ show_value($lead_time[1] ?? '-') }}</li>

    <li><strong>Setup Charge (Spot):</strong> {{ show_value($setup_charge[0] ?? '-') }}</li>
    <li><strong>Setup Charge (Heat):</strong> {{ show_value($setup_charge[1] ?? '-') }}</li>

    <li><strong>Repeat Setup (Spot):</strong> {{ show_value($repeat_setup[0] ?? '-') }}</li>
    <li><strong>Repeat Setup (Heat):</strong> {{ show_value($repeat_setup[1] ?? '-') }}</li>
</ul>

<hr>

    <hr>

    {{-- Bottom Tabs --}}
    <h6>Bottom Tabs</h6>
    @php
        $bottomTabs = $product->tabs->where('section', 'bottom')->values();
    @endphp

    @if($bottomTabs->count())

        {{-- Tab Headers --}}
        <ul class="nav nav-tabs" role="tablist">
            @foreach($bottomTabs as $index => $tab)
                <li class="nav-item">
                    <a class="nav-link {{ $index === 0 ? 'active' : '' }}" data-toggle="tab" href="#bottom-tab-{{ $tab->id }}"
                        role="tab">
                        {{ $tab->title }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Tab Content --}}
        <div class="tab-content border p-2">
            @foreach($bottomTabs as $index => $tab)
                <div class="tab-pane  {{ $index === 0 ? 'in active' : '' }}" id="bottom-tab-{{ $tab->id }}" role="tabpanel">
                    <div class="table-scroll">
                        <table class="table table-sm table-bordered mb-2">
                            <tbody>
                                @foreach($tab->rows as $row)
                                    <tr>
                                        <td>{{ $row->label }}</td>
                                        @foreach($row->cells as $cell)
                                            <td>{{ $cell->value }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>

    @endif

    <hr>

</div>