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

                            <form action="{{ route('products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
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
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
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
                                        <textarea name="description"
                                            class="form-control">{{ old('description', $product->description) }}</textarea>
                                    </div>

                                    <!-- Colors -->
                                    <div class="col-md-12 mb-3">
                                        <label>Colors</label>

                                        <div id="colors-wrapper">
                                            @foreach($product->colors as $c)
                                                <div class="color-row d-flex gap-2 mb-2">

                                                    <input type="text" name="old_color_names[{{ $c->id }}]" class="form-control"
                                                        value="{{ $c->color_name }}" placeholder="Color Name">

                                                    <input type="color" name="old_colors[{{ $c->id }}]"
                                                        class="form-control color-picker" value="{{ $c->color_code }}">

                                                    @if($c->color_image)
                                                        <img src="{{ asset('storage/' . $c->color_image) }}" width="40">
                                                    @endif

                                                    <input type="file" name="old_color_images[{{ $c->id }}]"
                                                        class="form-control">

                                                    @if($c->color_template_pdf)
                                                        <div class="mb-1">
                                                            <a href="{{ asset('storage/' . $c->color_template_pdf) }}"
                                                                target="_blank">View Color Template</a>
                                                        </div>
                                                    @endif

                                                    <input type="file" name="old_color_templates[{{ $c->id }}]"
                                                        class="form-control" accept="application/pdf">

                                                    <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                        data-id="{{ $c->id }}" data-type="color">X</button>

                                                </div>
                                            @endforeach

                                        </div>

                                        <button type="button" id="add-color" class="btn btn-sm btn-secondary mt-2">
                                            Add More Color
                                        </button>
                                    </div>
                                    <!-- Black & White Template (PDF) -->
                                    <div class="col-md-12 mb-3">
                                        <label>Black & White Template (PDF)</label>

                                        @if($product->bw_template_pdf)
                                            <div class="mb-2">
                                                <a href="{{ asset('storage/' . $product->bw_template_pdf) }}"
                                                    target="_blank">View Existing Template</a>
                                            </div>
                                        @endif

                                        <input type="file" name="bw_template_pdf" class="form-control"
                                            accept="application/pdf">
                                    </div>

                                    <!-- Product Images -->
                                    <div class="col-md-12 mb-3">
                                        <label>Existing Images</label>
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach($product->images as $img)
                                                <div>
                                                    <img src="{{ asset('storage/' . $img->image_path) }}" width="80">
                                                    <br>
                                                    <button type="button" class="btn btn-danger btn-sm mt-1 delete-btn"
                                                        data-id="{{ $img->id }}" data-type="image">Delete</button>

                                                </div>
                                            @endforeach
                                        </div>

                                        <label class="mt-3">Add More Images</label>
                                        <input type="file" name="product_images[]" class="form-control" multiple>
                                    </div>

                                    <!-- Top Tabs -->
                                    <div class="col-md-12 mb-4">
                                        <h5 class="mb-3">Top Tabs</h5>

                                        <div id="top-tabs-wrapper">
                                            @foreach($product->tabs->where('section', 'top') as $tab)
                                                <div class="card p-3 shadow-sm mb-3">

                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <strong>Tab</strong>
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                            data-id="{{ $tab->id }}" data-type="tab">Delete Tab</button>

                                                    </div>

                                                    <input type="text" name="old_top_tabs[{{ $tab->id }}]"
                                                        class="form-control mb-3" value="{{ $tab->title }}">

                                                    <div id="existing-top-tab-{{ $tab->id }}-rows">
                                                        @foreach($tab->rows as $row)
                                                            <div class="border p-2 rounded mb-2">

                                                                <div class="d-flex justify-content-between">
                                                                    <strong>Row</strong>
                                                                    <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                                        data-id="{{ $row->id }}" data-type="row">Delete Row</button>

                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col-md-3">
                                                                        <input type="text"
                                                                            name="old_top_tab_rows[{{ $tab->id }}][{{ $row->id }}][label]"
                                                                            class="form-control" placeholder="Label"
                                                                            value="{{ $row->label }}">
                                                                    </div>

                                                                    <div class="col-md-9 d-flex gap-2 flex-wrap columns-wrapper">
                                                                        @foreach($row->cells as $cell)
                                                                            <input type="text" class="form-control mb-1"
                                                                                name="old_top_tab_cells[{{ $tab->id }}][{{ $row->id }}][{{ $cell->id }}]"
                                                                                value="{{ $cell->value }}">
                                                                        @endforeach
                                                                    </div>
                                                                </div>

                                                                <button type="button"
                                                                    class="btn btn-sm btn-secondary mt-2 add-top-column"
                                                                    data-tab="{{ $tab->id }}" data-row="{{ $row->id }}">
                                                                    Add Column
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <button type="button" onclick="addOldTopRow({{ $tab->id }})"
                                                        class="btn btn-sm btn-primary mt-2">Add Row</button>

                                                </div>
                                            @endforeach
                                        </div>

                                        <button type="button" id="add-top-tab" class="btn btn-sm btn-dark">
                                            + Add New Top Tab
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label>Price Include</label>
                                            <textarea name="price_include"
                                                class="form-control">{{ old('price_include', $product->price_include) }}</textarea>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label>Lead Time</label>
                                            <input type="text" name="lead_time" class="form-control"
                                                value="{{ old('lead_time', $product->lead_time) }}">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label>MOQ</label>
                                            <input type="text" name="MOQ" class="form-control"
                                                value="{{ old('MOQ', $product->MOQ) }}">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label>Price Includes</label>
                                            <textarea name="price_includes"
                                                class="form-control">{{ old('price_includes', $product->price_includes) }}</textarea>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label>Lead Time (Repeat)</label>
                                            <input type="text" name="lead_time_repeat" class="form-control"
                                                value="{{ old('lead_time_repeat', $product->lead_time_repeat) }}">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label>Setup Charge</label>
                                            <input type="text" name="setup_charge" class="form-control"
                                                value="{{ old('setup_charge', $product->setup_charge) }}">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label>Repeat Setup</label>
                                            <input type="text" name="repeat_setup" class="form-control"
                                                value="{{ old('repeat_setup', $product->repeat_setup) }}">
                                        </div>
                                    </div>
                                    <!-- Bottom Tabs -->
                                    <div class="col-md-12 mb-4">
                                        <h5 class="mb-3">Bottom Tabs</h5>

                                        <div id="bottom-tabs-wrapper">
                                            @foreach($product->tabs->where('section', 'bottom') as $tab)
                                                <div class="card p-3 shadow-sm mb-3">

                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <strong>Tab</strong>
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                            data-id="{{ $tab->id }}" data-type="tab">Delete Tab</button>

                                                    </div>

                                                    <input type="text" name="old_bottom_tabs[{{ $tab->id }}]"
                                                        class="form-control mb-3" value="{{ $tab->title }}">

                                                    <div id="existing-bottom-tab-{{ $tab->id }}-rows">
                                                        @foreach($tab->rows as $row)
                                                            <div class="border p-2 rounded mb-2">

                                                                <div class="d-flex justify-content-between">
                                                                    <strong>Row</strong>
                                                                    <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                                        data-id="{{ $row->id }}" data-type="row">Delete Row</button>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col-md-3">
                                                                        <input type="text"
                                                                            name="old_bottom_tab_rows[{{ $tab->id }}][{{ $row->id }}][label]"
                                                                            class="form-control" value="{{ $row->label }}"
                                                                            placeholder="Label">
                                                                    </div>

                                                                    <div class="col-md-9 d-flex gap-2 flex-wrap columns-wrapper">
                                                                        @foreach($row->cells as $cell)
                                                                            <input type="text" class="form-control mb-1"
                                                                                name="old_bottom_tab_cells[{{ $tab->id }}][{{ $row->id }}][{{ $cell->id }}]"
                                                                                value="{{ $cell->value }}">
                                                                        @endforeach
                                                                    </div>
                                                                </div>

                                                                <button type="button"
                                                                    class="btn btn-sm btn-secondary mt-2 add-bottom-column"
                                                                    data-tab="{{ $tab->id }}" data-row="{{ $row->id }}">
                                                                    Add Column
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <button type="button" onclick="addOldBottomRow({{ $tab->id }})"
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
        let topTabIndex = {{ $product->tabs->where('section', 'top')->count() }};
        let bottomTabIndex = {{ $product->tabs->where('section', 'bottom')->count() }};

        // ------------------- COLORS -------------------
        document.getElementById("add-color").addEventListener("click", function () {
            let wrapper = document.getElementById("colors-wrapper");
            let div = document.createElement("div");
            div.classList.add("color-row", "d-flex", "gap-2", "mb-2");

            div.innerHTML = `
                                    <input type="text"
                                           name="color_names[]"
                                           class="form-control"
                                           placeholder="Color Name">

                                    <input type="color"
                                           name="colors[]"
                                           class="form-control color-picker">

                                    <input type="file"
                                           name="color_images[]"
                                           class="form-control">

                                    <input type="file"
                                           name="color_templates[]"
                                           class="form-control"
                                           accept="application/pdf">
                                `;

            wrapper.appendChild(div);
        });


        // ------------------- EXISTING ROWS -------------------
        function addOldTopRow(tabId) {
            let container = document.getElementById(`existing-top-tab-${tabId}-rows`);
            let rowIndex = container.children.length;

            let row = document.createElement('div');
            row.classList.add("border", "p-2", "rounded", "mb-2");

            row.innerHTML = `
                <div class="d-flex justify-content-between"><strong>Row</strong></div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <input type="text" name="new_top_tab_rows[${tabId}][${rowIndex}][label]" 
                               class="form-control" placeholder="Label">
                    </div>
                    <div class="col-md-9 d-flex gap-2 flex-wrap columns-wrapper"></div>
                </div>
                <button type="button" class="btn btn-sm btn-secondary mt-2 add-new-column" data-tab="${tabId}" data-row="${rowIndex}">Add Column</button>
            `;
            container.appendChild(row);
        }
        function addOldBottomRow(tabId) {
            let container = document.getElementById(`existing-bottom-tab-${tabId}-rows`);
            let rowIndex = container.children.length;

            let row = document.createElement('div');
            row.classList.add("border", "p-2", "rounded", "mb-2");

            row.innerHTML = `
                    <div class="d-flex justify-content-between"><strong>Row</strong></div>
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="text" name="new_bottom_tab_rows[${tabId}][${rowIndex}][label]" 
                                   class="form-control" placeholder="Label">
                        </div>
                        <div class="col-md-9 d-flex gap-2 flex-wrap columns-wrapper"></div>
                    </div>
                    <button type="button" class="btn btn-sm btn-secondary mt-2 add-bottom-column" data-tab="${tabId}" data-row="${rowIndex}">Add Column</button>
                `;
            container.appendChild(row);
        }

        // ------------------- EVENT DELEGATION -------------------
        document.addEventListener('click', function (e) {
            if (!e.target.matches('.add-top-column, .add-bottom-column, .add-new-column')) return;

            let button = e.target;
            let rowWrapper = button.closest('.border').querySelector('.columns-wrapper');

            let tabId = button.dataset.tab;
            let rowId = button.dataset.row;

            let input = document.createElement('input');
            input.type = 'text';
            input.classList.add('form-control', 'mb-1');
            input.placeholder = "New Column";

            if (button.classList.contains('add-top-column')) {
                if (button.classList.contains('add-new-column')) {
                    // New row in existing tab
                    input.name = `new_top_tab_rows[${tabId}][${rowId}][cells][]`;
                } else {
                    // Existing row, new column
                    input.name = `new_top_tab_cells[${tabId}][${rowId}][]`;
                }
            }


            else if (button.classList.contains('add-bottom-column')) {
                if (button.classList.contains('add-new-column')) {
                    input.name = `new_bottom_tab_rows[${tabId}][${rowId}][cells][]`;
                } else {
                    input.name = `new_bottom_tab_cells[${tabId}][${rowId}][]`;
                }
            }

            rowWrapper.appendChild(input);
        });


    </script>
    <script>
        function addNewTopTab() {
            let index = topTabIndex++;

            let html = `
                                                                                        <div class="card p-3 shadow-sm mb-3 new-top-tab" id="new-top-tab-${index}">
                                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                                <strong>New Top Tab</strong>
                                                                                            </div>

                                                                                            <input type="text" 
                                                                                                   name="top_tabs[${index}][title]" 
                                                                                                   class="form-control mb-3" 
                                                                                                   placeholder="Enter Tab Title">

                                                                                            <div class="tab-rows-inner" id="top-tab-${index}-rows"></div>

                                                                                            <button type="button" class="btn btn-sm btn-primary mt-2"
                                                                                                    onclick="addNewTopRow(${index})">
                                                                                                + Add Row
                                                                                            </button>
                                                                                        </div>
                                                                                    `;

            document.getElementById("top-tabs-wrapper").insertAdjacentHTML("beforeend", html);
        }

        function addNewTopRow(tabIndex) {
            let container = document.getElementById(`top-tab-${tabIndex}-rows`);
            let rowIndex = container.children.length;

            let html = `
                                                                                        <div class="border p-2 rounded mb-2">
                                                                                            <strong>Row</strong>

                                                                                            <div class="row mt-2">
                                                                                                <div class="col-md-3">
                                                                                                    <input type="text" 
                                                                                                           name="top_tabs[${tabIndex}][rows][${rowIndex}][label]" 
                                                                                                           class="form-control" 
                                                                                                           placeholder="Label">
                                                                                                </div>

                                                                                                <div class="col-md-9 d-flex gap-2 flex-wrap columns-wrapper" 
                                                                                                     id="top-tab-${tabIndex}-row-${rowIndex}-columns"></div>
                                                                                            </div>

                                                                                            <button type="button" class="btn btn-sm btn-secondary mt-2"
                                                                                                    onclick="addNewTopColumn(${tabIndex}, ${rowIndex})">
                                                                                                Add Column
                                                                                            </button>
                                                                                        </div>
                                                                                    `;

            container.insertAdjacentHTML("beforeend", html);
        }

        function addNewTopColumn(tabIndex, rowIndex) {
            let container = document.getElementById(`top-tab-${tabIndex}-row-${rowIndex}-columns`);
            let html = `
                                                                                        <input type="text" 
                                                                                               class="form-control mb-1"
                                                                                               name="top_tabs[${tabIndex}][rows][${rowIndex}][cells][]" 
                                                                                               placeholder="Value">
                                                                                    `;
            container.insertAdjacentHTML("beforeend", html);
        }
    </script>
    <script>
        function addNewBottomTab() {
            let index = bottomTabIndex++;

            let html = `
                            <div class="card p-3 shadow-sm mb-3 new-bottom-tab" id="new-bottom-tab-${index}">
                                <div class="d-flex justify-content-between mb-2">
                                    <strong>New Bottom Tab</strong>
                                </div>

                                <input type="text" 
                                       name="bottom_tabs[${index}][title]" 
                                       class="form-control mb-3" 
                                       placeholder="Enter Tab Title">

                                <div class="tab-rows-inner" id="bottom-tab-${index}-rows"></div>

                                <button type="button" class="btn btn-sm btn-primary mt-2"
                                        onclick="addNewBottomRow(${index})">
                                    + Add Row
                                </button>
                            </div>
                        `;

            document.getElementById("bottom-tabs-wrapper").insertAdjacentHTML("beforeend", html);
        }
        function addNewBottomRow(tabIndex) {
            let container = document.getElementById(`bottom-tab-${tabIndex}-rows`);
            let rowIndex = container.children.length;

            let html = `
                            <div class="border p-2 rounded mb-2">
                                <strong>Row</strong>

                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <input type="text" 
                                               name="bottom_tabs[${tabIndex}][rows][${rowIndex}][label]" 
                                               class="form-control" 
                                               placeholder="Label">
                                    </div>

                                    <div class="col-md-9 d-flex gap-2 flex-wrap columns-wrapper" 
                                         id="bottom-tab-${tabIndex}-row-${rowIndex}-columns"></div>
                                </div>

                                <button type="button" class="btn btn-sm btn-secondary mt-2"
                                        onclick="addNewBottomColumn(${tabIndex}, ${rowIndex})">
                                    Add Column
                                </button>
                            </div>
                        `;

            container.insertAdjacentHTML("beforeend", html);
        }

        function addNewBottomColumn(tabIndex, rowIndex) {
            let container = document.getElementById(`bottom-tab-${tabIndex}-row-${rowIndex}-columns`);
            let html = `
            <input type="text" 
                   class="form-control mb-1"
                   name="new_bottom_tab_rows[${tabIndex}][${rowIndex}][cells][]"
                   placeholder="Value">
        `;
            container.insertAdjacentHTML("beforeend", html);
        }


    </script>
    <script>
        document.getElementById("add-top-tab").addEventListener("click", addNewTopTab);
        document.getElementById("add-bottom-tab").addEventListener("click", addNewBottomTab);
    </script>
    <script>
        document.addEventListener("click", function (e) {

            if (!e.target.classList.contains("delete-btn")) return;

            let id = e.target.getAttribute("data-id");
            let type = e.target.getAttribute("data-type");

            let url = "";
            if (type === "color") url = `/product/color/${id}`;
            if (type === "image") url = `/product/image/${id}`;
            if (type === "tab") url = `/products/tab/${id}`;
            if (type === "row") url = `/products/tab-row/${id}`;

            if (!confirm("Delete this item?")) return;

            fetch(url, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                }
            })
                .then(res => res.json())
                .then(data => {

                    if (data.success) {

                        let card = null;

                        if (type === "color") card = e.target.closest(".color-row");
                        if (type === "image") card = e.target.closest("div");
                        if (type === "tab") card = e.target.closest(".card");
                        if (type === "row") card = e.target.closest(".border");

                        if (!card) return;

                        card.style.opacity = "0";
                        setTimeout(() => card.remove(), 300);
                    }

                })
                .catch(err => console.error(err));

        });
    </script>


@endsection