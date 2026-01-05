@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 45px;
            height: 22px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 2px;
            bottom: 2px;
            background: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background: #28a745;
        }

        input:checked+.slider:before {
            transform: translateX(23px);
        }
    </style>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5>All Products</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">All</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-body">
        <div class="page-wrapper">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5>Products</h5>
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Add Product</a>
                        </div>
                        <div class="card-body table-border-style">
                            <table class="table table-striped table-hover datatable nowrap">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Category</th>

                                        <th>Item Number</th>
                                        <th>Special Offer</th>
                                        <th>Popular</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name ?? '-' }}</td>
                                            <td>{{ $product->item_number }}</td>


                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="special-offer-toggle"
                                                        data-id="{{ $product->id }}"
                                                        data-before="{{ $product->special_price_before }}"
                                                        data-after="{{ $product->special_price_after }}" {{ $product->is_special_offer ? 'checked' : '' }}>

                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="popular-toggle" data-id="{{ $product->id }}"
                                                        {{ $product->is_popular ? 'checked' : '' }}>

                                                    <span class="slider round"></span>
                                                </label>
                                            </td>


                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('products.edit', $product) }}"
                                                        class="btn btn-warning btn-sm text-light"><i
                                                            class="feather icon-edit"></i></a>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#productModal{{ $product->id }}">
                                                        <i class="feather icon-eye"></i>
                                                    </button>
                                                    <!-- 
                                                                            <a href="{{ route('product.quote.show', $product->id) }}" target="_blank"
                                                                                class="btn btn-primary">
                                                                                Quote
                                                                            </a> -->

                                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                        onsubmit="return confirm('Delete this product?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="feather icon-trash"></i></button>
                                                    </form>
                                                </div>

                                                <!-- View button -->

                                                <!-- Modal -->
                                                <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">{{ $product->name }} Details</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('dashboard.pages.partial.product_detail_modal', ['product' => $product])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">No products found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="specialOfferModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="specialOfferForm" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set Special Offer Prices</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="modal_product_id">

                    <div class="form-group">
                        <label>Price Before</label>
                        <input type="number" step="0.01" id="price_before" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Price After</label>
                        <input type="number" step="0.01" id="price_after" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Prices</button>
                </div>
            </form>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ===================== TOGGLE HANDLING =====================
            document.querySelector('table').addEventListener('change', function (e) {
                const toggle = e.target;

                // ----- Special Offer Toggle -----
                if (toggle.classList.contains('special-offer-toggle')) {
                    const productId = toggle.dataset.id;

                    if (toggle.checked) {
                        // Fill modal values
                        document.getElementById('modal_product_id').value = productId;
                        document.getElementById('price_before').value = toggle.dataset.before || '';
                        document.getElementById('price_after').value = toggle.dataset.after || '';
                        // Show modal
                        $('#specialOfferModal').modal('show');
                    } else {
                        // Disable special offer directly
                        updateSpecialOffer(productId, 0, null, null);
                    }
                }

                // ----- Popular Toggle -----
                if (toggle.classList.contains('popular-toggle')) {
                    const productId = toggle.dataset.id;
                    const status = toggle.checked ? 1 : 0;

                    fetch(`/products/${productId}/popular-toggle`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ is_popular: status })
                    })
                        .then(res => res.json())
                        .then(data => console.log('Popular updated:', data))
                        .catch(err => console.error('Error updating popular:', err));
                }
            });

            // ===================== SPECIAL OFFER MODAL FORM =====================
            document.getElementById('specialOfferForm').addEventListener('submit', function (e) {
                e.preventDefault();

                const id = document.getElementById('modal_product_id').value;
                const before = document.getElementById('price_before').value;
                const after = document.getElementById('price_after').value;

                updateSpecialOffer(id, 1, before, after);

                // Hide modal after submit
                $('#specialOfferModal').modal('hide');
            });

            // ===================== PRODUCT DETAIL MODAL =====================
            const productModal = new bootstrap.Modal(document.getElementById('productDetailModal'));
            const productContent = document.getElementById('productDetailContent');

            document.querySelectorAll('.view-product-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.dataset.id;

                    fetch(`/products/${productId}/detail`)
                        .then(res => res.text())
                        .then(html => {
                            productContent.innerHTML = html;
                            productModal.show();
                        })
                        .catch(err => {
                            productContent.innerHTML = '<p class="text-danger">Failed to load product details.</p>';
                            productModal.show();
                        });
                });
            });

        });

        // ===================== AJAX FUNCTIONS =====================
        function updateSpecialOffer(id, status, before, after) {
            fetch(`/products/${id}/special-offer`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    is_special_offer: status,
                    special_price_before: before,
                    special_price_after: after
                })
            })
                .then(res => res.json())
                .then(data => console.log('Special Offer updated:', data))
                .catch(err => console.error('Error updating special offer:', err));
        }

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('productDetailModal'));
            const content = document.getElementById('productDetailContent');

            document.querySelectorAll('.view-product-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.getAttribute('data-id');

                    fetch(`/products/${productId}/detail`)
                        .then(response => response.text())
                        .then(html => {
                            content.innerHTML = html;
                            modal.show();
                        })
                        .catch(err => {
                            content.innerHTML = '<p class="text-danger">Failed to load product details.</p>';
                            modal.show();
                        });
                });
            });
        });
    </script>

@endsection