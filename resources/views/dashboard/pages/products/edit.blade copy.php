@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

<div class="page-header">
    <div class="page-block">
        <h5>Edit Product</h5>
    </div>
</div>

<div class="main-body">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Product Details</h5>
                    </div>
                    <div class="card-body">

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <!-- Name -->
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $product->name) }}">
                                </div>

                                <!-- Category -->
                                <div class="col-md-6 mb-3">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $product->category_id == $category->id ? 'selected':'' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Item Number -->
                                <div class="col-md-6 mb-3">
                                    <label>Item Number</label>
                                    <input type="text" name="item_number" class="form-control"
                                        value="{{ old('item_number', $product->item_number) }}">
                                </div>

                                <!-- Material -->
                                <div class="col-md-6 mb-3">
                                    <label>Material</label>
                                    <input type="text" name="material" class="form-control"
                                        value="{{ old('material', $product->material) }}">
                                </div>

                                <!-- Item Size -->
                                <div class="col-md-6 mb-3">
                                    <label>Item Size</label>
                                    <input type="text" name="item_size" class="form-control"
                                        value="{{ old('item_size', $product->item_size) }}">
                                </div>

                                <!-- Imprint Area -->
                                <div class="col-md-6 mb-3">
                                    <label>Imprint Area</label>
                                    <input type="text" name="imprint_area" class="form-control"
                                        value="{{ old('imprint_area', $product->imprint_area) }}">
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                                </div>

                                <!-- Colors -->
                                <div class="col-md-12 mb-3">
                                    <label>Colors</label>

                                    <div id="colors-wrapper">
                                        @foreach($product->colors as $index => $c)
                                            <div class="color-row d-flex gap-2 mb-2">
                                                <input type="hidden" name="old_color_id[]" value="{{ $c->id }}">

                                                <input type="text" name="old_colors[{{ $c->id }}]" class="form-control"
                                                    value="{{ $c->color_name }}">

                                                @if($c->color_image)
                                                    <img src="{{ asset('storage/'.$c->color_image) }}" width="40">
                                                @endif

                                                <input type="file" name="old_color_images[{{ $c->id }}]" class="form-control">

                                                <a href="{{ route('products.color.delete', $c->id) }}"
                                                   class="btn btn-danger btn-sm">X</a>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="button" id="add-color" class="btn btn-sm btn-secondary mt-2">
                                        Add More Color
                                    </button>
                                </div>

                                <!-- Product Images -->
                                <div class="col-md-12 mb-3">
                                    <label>Existing Images</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($product->images as $img)
                                            <div>
                                                <img src="{{ asset('storage/'.$img->image_path) }}" width="80">
                                                <br>
                                                <a href="{{ route('products.image.delete', $img->id) }}"
                                                   class="btn btn-danger btn-sm mt-1">Delete</a>
                                            </div>
                                        @endforeach
                                    </div>

                                    <label class="mt-3">Add More Images</label>
                                    <input type="file" name="product_images[]" class="form-control" multiple>
                                </div>

                                <!-- Tabs -->
    <div class="col-md-12 mb-4">
    <h5 class="mb-3">Top Tabs</h5>

    <div id="top-tabs-wrapper">

        @foreach($product->tabs->where('section', 'top') as $tab)
            <div class="card p-3 shadow-sm mb-3">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong>Tab</strong>
                    <a href="{{ route('products.tab.delete', $tab->id) }}" class="btn btn-sm btn-danger">Delete Tab</a>
                </div>

                <input type="text" name="old_top_tabs[{{ $tab->id }}]"
                       class="form-control mb-3" value="{{ $tab->title }}">

                <div id="existing-top-tab-{{ $tab->id }}-rows">

                    @foreach($tab->rows as $row)
                        <div class="border p-2 rounded mb-2">

                            <div class="d-flex justify-content-between">
                                <strong>Row</strong>
                                <a href="{{ route('products.tab.row.delete', $row->id) }}" class="btn btn-sm btn-danger">Delete Row</a>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <input type="text"
                                        name="old_top_tab_rows[{{ $tab->id }}][{{ $row->id }}][label]"
                                        class="form-control" placeholder="Label"
                                        value="{{ $row->label }}">
                                </div>

                                <div class="col-md-9 d-flex gap-2 flex-wrap align-items-start">
                                    @foreach($row->cells as $cell)
                                        <input type="text"
                                            class="form-control mb-1"
                                            name="old_top_tab_cells[{{ $tab->id }}][{{ $row->id }}][{{ $cell->id }}]"
                                            value="{{ $cell->value }}">
                                    @endforeach
                                </div>
                            </div>

                            <button type="button"
                                onclick="addOldTopColumn({{ $tab->id }}, {{ $row->id }})"
                                class="btn btn-sm btn-secondary mt-2">Add Column</button>

                        </div>
                    @endforeach

                </div>

                <button type="button"
                    onclick="addOldTopRow({{ $tab->id }})"
                    class="btn btn-sm btn-primary mt-2">Add Row</button>

            </div>
        @endforeach

    </div>

    <button type="button" id="add-top-tab" class="btn btn-sm btn-dark">
        + Add New Top Tab
    </button>
</div>

                                    <!-- Bottom Tabs Section -->
<div class="col-md-12 mb-4">
    <h5 class="mb-3">Bottom Tabs</h5>

    <div id="bottom-tabs-wrapper">

        @foreach($product->tabs->where('section', 'bottom') as $tab)
            <div class="card p-3 shadow-sm mb-3">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong>Tab</strong>
                    <a href="{{ route('products.tab.delete', $tab->id) }}" class="btn btn-sm btn-danger">Delete Tab</a>
                </div>

                <input type="text" name="old_bottom_tabs[{{ $tab->id }}]"
                       class="form-control mb-3" value="{{ $tab->title }}">

                <div id="existing-bottom-tab-{{ $tab->id }}-rows">

                    @foreach($tab->rows as $row)
                        <div class="border p-2 rounded mb-2">

                            <div class="d-flex justify-content-between">
                                <strong>Row</strong>
                                <a href="{{ route('products.tab.row.delete', $row->id) }}" class="btn btn-sm btn-danger">Delete Row</a>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <input type="text"
                                        name="old_bottom_tab_rows[{{ $tab->id }}][{{ $row->id }}][label]"
                                        class="form-control"
                                        value="{{ $row->label }}"
                                        placeholder="Label">
                                </div>

                                <div class="col-md-9 d-flex gap-2 flex-wrap align-items-start">
                                    @foreach($row->cells as $cell)
                                        <input type="text"
                                            class="form-control mb-1"
                                            name="old_bottom_tab_cells[{{ $tab->id }}][{{ $row->id }}][{{ $cell->id }}]"
                                            value="{{ $cell->value }}">
                                    @endforeach
                                </div>
                            </div>

                            <button type="button"
                                onclick="addOldBottomColumn({{ $tab->id }}, {{ $row->id }})"
                                class="btn btn-sm btn-secondary mt-2">Add Column</button>

                        </div>
                    @endforeach

                </div>

                <button type="button"
                    onclick="addOldBottomRow({{ $tab->id }})"
                    class="btn btn-sm btn-primary mt-2">Add Row</button>

            </div>
        @endforeach

    </div>

    <button type="button" id="add-bottom-tab" class="btn btn-sm btn-dark">
        + Add New Bottom Tab
    </button>
</div>



                                

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
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
   let topTabIndex = {{ $product->tabs->where('section','top')->count() }};
    let bottomTabIndex = {{ $product->tabs->where('section','bottom')->count() }};

    function addOldTopRow(tabId) {
        let container = document.getElementById(`existing-top-tab-${tabId}-rows`);
        let row = document.createElement('div');
        row.classList.add("border", "p-2", "rounded", "mb-2");

        row.innerHTML = `
            <strong>Row</strong>
            <div class="row mt-2">
                <div class="col-md-3">
                    <input type="text" name="new_top_tab_rows[${tabId}][][label]" 
                           class="form-control" placeholder="Label">
                </div>
                <div class="col-md-9 d-flex gap-2 flex-wrap columns-wrapper"></div>
            </div>
            <button type="button" class="btn btn-sm btn-secondary mt-2"
               onclick="addOldTopColumn({{ $tab->id }}, {{ $row->id }})"
>Add Column</button>
        `;

        container.appendChild(row);
    }

function addOldTopColumn(tabId, rowId) {
    let selector = `input[name="old_top_tab_rows[${tabId}][${rowId}][label]"]`;
    let rowWrapper = document.querySelector(selector)
        .closest('.row')
        .querySelector('.columns-wrapper');

    let input = document.createElement('input');
    input.type = 'text';
    input.classList.add('form-control', 'mb-1');
    input.name = `new_top_tab_cells[${tabId}][${rowId}][]`;
    input.placeholder = "New Column";

    rowWrapper.appendChild(input);
}

// add colors
document.getElementById("add-color").addEventListener("click", function () {
    let wrapper = document.getElementById("colors-wrapper");
    let div = document.createElement("div");
    div.classList.add("color-row", "d-flex", "gap-2", "mb-2");
    div.innerHTML = `
        <input type="text" name="colors[]" placeholder="Color Name" class="form-control">
        <input type="file" name="color_images[]" class="form-control">
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
        function addOldBottomRow(tabId) {
    let container = document.getElementById(`existing-bottom-tab-${tabId}-rows`);
    let row = document.createElement('div');
    row.classList.add("border", "p-2", "rounded", "mb-2");

    row.innerHTML = `
        <strong>Row</strong>
        <div class="row mt-2">
            <div class="col-md-3">
                <input type="text" name="new_bottom_tab_rows[${tabId}][][label]" 
                       class="form-control" placeholder="Label">
            </div>
            <div class="col-md-9 d-flex gap-2 flex-wrap columns-wrapper"></div>
        </div>
        <button type="button" class="btn btn-sm btn-secondary mt-2"
            onclick="addOldBottomColumn(${tabId}, 'NEW_ROW')">Add Column</button>
    `;

    container.appendChild(row);
}

</script>

@endsection
