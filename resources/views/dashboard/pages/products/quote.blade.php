<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Quotation - {{ $product->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <style>
        /* Simple reset */
        * {
            box-sizing: border-box;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }

        body {
            background: #f6f7f9;
            margin: 0;
            padding: 30px;
            color: #1b2b3a;
        }

        /* modal-like card */
        .quote-card {
            width: 720px;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            border-top: 6px solid #16324a;
            /* dark-blue header band */
            margin: 0 auto;
        }

        .quote-header {
            background: #16324a;
            color: #fff;
            padding: 10px 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .quote-header h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        .quote-header .close {
            color: #cfe6f3;
            font-weight: 700;
            cursor: pointer;
        }

        .quote-body {
            display: flex;
            padding: 16px;
            gap: 14px;
        }

        /* left column (image + color swatches) */
        .left-col {
            width: 38%;
            padding-right: 6px;
            border-right: 1px solid #e6e9ec;
        }

        .product-thumb {
            width: 100%;
            background: #f4f6f8;
            border: 1px solid #e1e6ea;
            padding: 8px;
            display: block;
            text-align: center;
            border-radius: 4px;
        }

        .product-thumb img {
            max-width: 100%;
            height: auto;
            display: inline-block;
        }

        .product-title {
            margin-top: 10px;
            font-weight: 700;
            font-size: 15px;
            color: #16324a;
        }

        .product-dims {
            color: #6b7d8b;
            font-size: 13px;
            margin-top: 6px;
        }

        .sku {
            color: #6b7d8b;
            font-size: 12px;
            margin-top: 6px;
        }

        .section-label {
            font-weight: 700;
            margin-top: 12px;
            font-size: 13px;
            color: #16324a;
        }

        /* color swatches grid */
        .color-grid {
            margin-top: 8px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .color-item {
            display: flex;
            align-items: center;
            gap: 6px;
            background: transparent;
            font-size: 13px;
        }

        .swatch {
            width: 18px;
            height: 18px;
            border-radius: 3px;
            border: 1px solid #cfd8df;
            display: inline-block;
            vertical-align: middle;
        }

        .color-checkbox {
            width: 14px;
            height: 14px;
            margin-right: 4px;
        }

        .preset-radio {
            margin-top: 10px;
            display: flex;
            gap: 12px;
            align-items: center;
            color: #445668;
            font-size: 13px;
        }

        /* right column (form) */
        .right-col {
            width: 62%;
            padding-left: 14px;
        }

        .form-row {
            margin-bottom: 10px;
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .form-row .label {
            width: 35%;
            font-size: 13px;
            color: #445668;
            padding-top: 6px;
        }

        .form-row .control {
            flex: 1;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #d3dbe2;
            border-radius: 4px;
            font-size: 14px;
            background: white;
        }

        textarea {
            min-height: 70px;
            resize: vertical;
        }

        .small-input {
            width: 150px;
        }

        .radio-inline {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-right: 12px;
            color: #445668;
            font-size: 13px;
        }

        .attach-row {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 6px;
        }

        .browse-btn {
            background: #16324a;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        /* bottom buttons */
        .bottom-actions {
            border-top: 1px solid #e6e9ec;
            padding: 12px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fbfdff;
        }

        .left-actions button {
            background: #16324a;
            color: #fff;
            padding: 8px 14px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-right: 8px;
        }

        .delete-btn {
            background: #c12d2d;
        }

        .submit-btn {
            background: #7b8b96;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .success {
            color: green;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>

<div class="quote-card">
    <div class="quote-header">
        <h3>Quotation</h3>
        <div class="close" onclick="window.close()">✕</div>
    </div>

    <div class="quote-body">
        <!-- Left Column -->
        <div class="left-col">
            <div class="product-thumb">
                @php
                    $fallbackImage = '/mnt/data/8f61849d-eb90-4291-82f7-b8ebfdc25838.png';
                    $imagePath = ($product->images && $product->images->count()) ? asset('storage/' . $product->images->first()->image_path) : $fallbackImage;
                @endphp
                <img src="{{ $imagePath }}" alt="{{ $product->name }}">
            </div>
            <div class="product-title">{{ $product->name }}</div>
            <div class="product-dims">{{ $product->dimensions ?? 'N/A' }}</div>
            <div class="sku">{{ $product->sku ?? 'N/A' }}</div>

            <div class="section-label">Select Color:</div>
            <div class="color-grid">
                @forelse($product->colors as $color)
                    <label class="color-item">
                        <input type="checkbox" name="color[]" value="{{ $color->color_name }}" class="color-checkbox">
                        @if($color->color_image)
                            <span class="swatch" style="background:url('{{ asset('storage/' . $color->color_image) }}') center/cover;"></span>
                        @else
                            <span class="swatch" style="background: {{ $color->color_name }};"></span>
                        @endif
                        <span>{{ $color->color_name }}</span>
                    </label>
                @empty
                    @php $preset = ['Black','Chocolate','Dark Grey','Light Pink','Lime','Natural','Navy','Red','Royal','White','Yellow']; @endphp
                    @foreach($preset as $p)
                        <label class="color-item">
                            <input type="checkbox" name="color[]" value="{{ $p }}" class="color-checkbox">
                            <span class="swatch" title="{{ $p }}"></span>
                            <span>{{ $p }}</span>
                        </label>
                    @endforeach
                @endforelse
            </div>

            <div class="preset-radio">
                <label><input type="radio" name="decorate" value="blank" checked> Blank</label>
                <label><input type="radio" name="decorate" value="decorated"> Decorated</label>
            </div>
        </div>

        <!-- Right Column: Form -->
        <div class="right-col">
            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('product.quote.submit', $product->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="label">Quantity:</div>
                    <div class="control"><input name="quantity" type="text" placeholder="Enter Quantity"></div>
                </div>

                <div class="form-row">
                    <div class="label">Ship To Zip Code:</div>
                    <div class="control"><input name="zip" type="text" placeholder=""></div>
                </div>

                <div class="form-row">
                    <div class="label">Company Name:</div>
                    <div class="control"><input name="company" type="text" placeholder=""></div>
                </div>

                <div class="form-row">
                    <div class="label">Email:</div>
                    <div class="control"><input name="email" type="email" placeholder=""></div>
                </div>

                <div class="form-row">
                    <div class="label">Phone:</div>
                    <div class="control"><input name="phone" type="tel" placeholder=""></div>
                </div>

                <div class="form-row">
                    <div class="label">ASI / PPAI / SAGE #:</div>
                    <div class="control"><input name="asi" type="text" placeholder=""></div>
                </div>

                <div class="form-row">
                    <div class="label">In Hand Date:</div>
                    <div class="control"><input name="in_hand_date" type="text" class="small-input" placeholder="YYYY-MM-DD"></div>
                </div>

                <div class="form-row">
                    <div class="label">Need Freight Estimate?</div>
                    <div class="control">
                        <label class="radio-inline"><input type="radio" name="need_freight" value="yes"> Yes</label>
                        <label class="radio-inline"><input type="radio" name="need_freight" value="no" checked> No</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="label">Loading Dock at receiving End?</div>
                    <div class="control">
                        <label class="radio-inline"><input type="radio" name="loading_dock" value="yes"> Yes</label>
                        <label class="radio-inline"><input type="radio" name="loading_dock" value="no" checked> No</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="label">Message:</div>
                    <div class="control"><textarea name="message" placeholder="Enter your message here"></textarea></div>
                </div>

                <div class="form-row">
                    <div class="label">Attach file:</div>
                    <div class="control">
                        <input type="file" name="attachment1">
                        <input type="file" name="attachment2">
                    </div>
                </div>

                <div class="bottom-actions">
                    <button class="submit-btn" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>