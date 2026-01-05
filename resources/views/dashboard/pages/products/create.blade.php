@extends('layouts.app')

@section('title', 'Create Product')

@section('content')

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5>Add Product</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-body">
        <div class="page-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Product Details</h5>
                        </div>
                        <div class="card-body">

                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <!-- Name -->
                                    <div class="col-md-6 mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>

                                    <!-- Category -->
                                    <div class="col-md-6 mb-3">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            <option value="">-- Select Category --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Item Number -->
                                    <div class="col-md-6 mb-3">
                                        <label>Item Number</label>
                                        <input type="text" name="item_number" class="form-control"
                                            value="{{ old('item_number') }}">
                                    </div>

                                    <!-- Material -->
                                    <div class="col-md-6 mb-3">
                                        <label>Material</label>
                                        <input type="text" name="material" class="form-control"
                                            value="{{ old('material') }}">
                                    </div>

                                    <!-- Item Size -->
                                    <div class="col-md-6 mb-3">
                                        <label>Item Size</label>
                                        <input type="text" name="item_size" class="form-control"
                                            value="{{ old('item_size') }}">
                                    </div>

                                    <!-- Imprint Area -->
                                    <div class="col-md-6 mb-3">
                                        <label>Imprint Area</label>
                                        <input type="text" name="imprint_area" class="form-control"
                                            value="{{ old('imprint_area') }}">
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-12 mb-3">
                                        <label>Description</label>
                                        <textarea name="description"
                                            class="form-control">{{ old('description') }}</textarea>
                                    </div>


                                    <!-- Colors -->
                                    <div class="col-md-12 mb-3">
                                        <label>Colors</label>
                                        <div id="colors-wrapper">
                                            <div class="color-row mb-2 d-flex gap-2">

                                                <input type="text" name="color_names[]" class="form-control"
                                                    placeholder="Color Name (Black)">

                                                <input type="color" name="colors[]" class="form-control color-picker">

                                                <input type="file" name="color_images[]" class="form-control">
                                                <input type="file" name="color_templates[]" class="form-control"
                                                    accept="application/pdf">
                                            </div>

                                        </div>
                                        <button type="button" id="add-color" class="btn btn-sm btn-secondary mt-2">Add More
                                            Color</button>
                                    </div>
                                    <!-- Black & White Template -->


                                    <div class="col-md-12 mb-3">
                                        <label>Black & White Template (PDF)</label>
                                        <input type="file" name="bw_template_pdf" class="form-control"
                                            accept="application/pdf">
                                    </div>

                                    <!-- Product Images -->
                                    <div class="col-md-12 mb-3">
                                        <label>Product Images</label>
                                        <input type="file" name="product_images[]" class="form-control" multiple>
                                    </div>

                                    <!-- Top Tabs Section -->
                                    <div class="col-md-12 mb-3">
                                        <label>Top Tabs</label>
                                        <div id="top-tabs-wrapper"></div>
                                        <button type="button" id="add-top-tab" class="btn btn-sm btn-secondary mt-2">Add Top
                                            Tab</button>
                                    </div>
@php
    function safe_display($value, $separator = ', ') {
        if (is_array($value)) return implode($separator, $value);
        return $value ?? '';
    }
@endphp

<div class="row">

    <!-- ================= BLANK TAB ================= -->
    <div class="col-md-6 mb-3">
        <label>Price Include</label>
        <textarea name="price_include_text" class="form-control">{{ safe_display(old('price_include_text', $product->price_include_sh ?? []), "\n") }}</textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label>Lead Time</label>
        <input type="text" name="lead_time_text" class="form-control" 
               value="{{ safe_display(old('lead_time_text', $product->lead_time_sh ?? [])) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>MOQ</label>
        <input type="text" name="MOQ" class="form-control" 
               value="{{ old('MOQ', $product->MOQ_blank ?? '') }}">
    </div>

</div>

<div class="row">

    <!-- ================= SPOT / HEAT PRINTING ================= -->
    <div class="col-md-6 mb-3">
        <label>Price Includes (Spot Printing)</label>
        <input type="text" name="price_includes[0]" class="form-control"
               value="{{ safe_display(old('price_includes.0', $product->price_include_sh[0] ?? '')) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Price Includes (Heat Printing)</label>
        <input type="text" name="price_includes[1]" class="form-control"
               value="{{ safe_display(old('price_includes.1', $product->price_include_sh[1] ?? '')) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Lead Time (Spot Printing)</label>
        <input type="text" name="lead_time_repeat[0]" class="form-control"
               value="{{ safe_display(old('lead_time_repeat.0', $product->lead_time_sh[0] ?? '')) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Lead Time (Heat Printing)</label>
        <input type="text" name="lead_time_repeat[1]" class="form-control"
               value="{{ safe_display(old('lead_time_repeat.1', $product->lead_time_sh[1] ?? '')) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Setup Charge (Spot Printing)</label>
        <input type="text" name="setup_charge[0]" class="form-control"
               value="{{ safe_display(old('setup_charge.0', $product->setup_charge_sh[0] ?? '')) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Setup Charge (Heat Printing)</label>
        <input type="text" name="setup_charge[1]" class="form-control"
               value="{{ safe_display(old('setup_charge.1', $product->setup_charge_sh[1] ?? '')) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Repeat Setup (Spot Printing)</label>
        <input type="text" name="repeat_setup[0]" class="form-control"
               value="{{ safe_display(old('repeat_setup.0', $product->repeat_setup_sh[0] ?? '')) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Repeat Setup (Heat Printing)</label>
        <input type="text" name="repeat_setup[1]" class="form-control"
               value="{{ safe_display(old('repeat_setup.1', $product->repeat_setup_sh[1] ?? '')) }}">
    </div>

</div>


                                    <!-- Bottom Tabs Section -->
                                    <div class="col-md-12 mb-3">
                                        <label>Bottom Tabs</label>
                                        <div id="bottom-tabs-wrapper"></div>
                                        <button type="button" id="add-bottom-tab" class="btn btn-sm btn-secondary mt-2">Add
                                            Bottom Tab</button>
                                    </div>




                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Save Product</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        let colorIndex = 1;
        let priceIndex = 1;
        let topTabIndex = 0;
        let bottomTabIndex = 0;

        // Colors

        document.getElementById('add-color').addEventListener('click', function () {
            let wrapper = document.getElementById('colors-wrapper');
            let div = document.createElement('div');
            div.classList.add('color-row', 'mb-2', 'd-flex', 'gap-2');

            div.innerHTML = `
                <input type="text" name="color_names[]" class="form-control" placeholder="Color Name">
                <input type="color" name="colors[]" class="form-control color-picker">
                <input type="file" name="color_images[]" class="form-control">
                <input type="file" name="color_templates[]" class="form-control" accept="application/pdf">
            `;


            wrapper.appendChild(div);
        });


        // Top Tabs
        document.getElementById('add-top-tab').addEventListener('click', function () {
            let wrapper = document.getElementById('top-tabs-wrapper');
            let div = document.createElement('div');
            div.classList.add('tab-row', 'mb-2');
            div.innerHTML = `
                                            <input type="text" name="top_tabs[]" placeholder="Tab Title" class="form-control mb-1">
                                            <div class="tab-rows-inner" id="top-tab-${topTabIndex}-rows"></div>
                                            <button type="button" onclick="addTopRow(${topTabIndex})" class="btn btn-sm btn-secondary mt-1">Add Row</button>
                                        `;
            wrapper.appendChild(div);
            topTabIndex++;
        });

        function addTopRow(tabIndex) {
            let container = document.getElementById(`top-tab-${tabIndex}-rows`);
            let rowIndex = container.children.length;
            let div = document.createElement('div');
            div.classList.add('row', 'mb-1');
            div.innerHTML = `
                                            <div class="col"><input type="text" name="top_tab_rows[${tabIndex}][${rowIndex}][label]" placeholder="Label" class="form-control"></div>
                                            <div class="columns-wrapper d-flex gap-2"></div>
                                            <button type="button" onclick="addTopColumn(${tabIndex},${rowIndex})" class="btn btn-sm btn-secondary">Add Column</button>
                                        `;
            container.appendChild(div);
        }

        function addTopColumn(tabIndex, rowIndex) {
            let row = document.querySelector(`#top-tab-${tabIndex}-rows .row:nth-child(${rowIndex + 1}) .columns-wrapper`);
            if (!row) return;
            let colIndex = row.children.length;
            let input = document.createElement('input');
            input.type = 'text';
            input.name = `top_tab_rows[${tabIndex}][${rowIndex}][cells][${colIndex}]`;
            input.placeholder = `Column ${colIndex + 1}`;
            input.classList.add('form-control');
            row.appendChild(input);
        }

        // Bottom Tabs
        document.getElementById('add-bottom-tab').addEventListener('click', function () {
            let wrapper = document.getElementById('bottom-tabs-wrapper');
            let div = document.createElement('div');
            div.classList.add('tab-row', 'mb-2');
            div.innerHTML = `
                                            <input type="text" name="bottom_tabs[]" placeholder="Tab Title" class="form-control mb-1">
                                            <div class="tab-rows-inner" id="bottom-tab-${bottomTabIndex}-rows"></div>
                                            <button type="button" onclick="addBottomRow(${bottomTabIndex})" class="btn btn-sm btn-secondary mt-1">Add Row</button>
                                        `;
            wrapper.appendChild(div);
            bottomTabIndex++;
        });

        function addBottomRow(tabIndex) {
            let container = document.getElementById(`bottom-tab-${tabIndex}-rows`);
            let rowIndex = container.children.length;
            let div = document.createElement('div');
            div.classList.add('row', 'mb-1');
            div.innerHTML = `
                                            <div class="col"><input type="text" name="bottom_tab_rows[${tabIndex}][${rowIndex}][label]" placeholder="Label" class="form-control"></div>
                                            <div class="columns-wrapper d-flex gap-2"></div>
                                            <button type="button" onclick="addBottomColumn(${tabIndex},${rowIndex})" class="btn btn-sm btn-secondary">Add Column</button>
                                        `;
            container.appendChild(div);
        }

        function addBottomColumn(tabIndex, rowIndex) {
            let row = document.querySelector(`#bottom-tab-${tabIndex}-rows .row:nth-child(${rowIndex + 1}) .columns-wrapper`);
            if (!row) return;
            let colIndex = row.children.length;
            let input = document.createElement('input');
            input.type = 'text';
            input.name = `bottom_tab_rows[${tabIndex}][${rowIndex}][cells][${colIndex}]`;
            input.placeholder = `Column ${colIndex + 1}`;
            input.classList.add('form-control');
            row.appendChild(input);
        }
    </script>
@endsection