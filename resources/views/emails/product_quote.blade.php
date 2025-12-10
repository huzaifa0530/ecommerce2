<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Quotation Request - {{ $product->name }}</title>
</head>

<body style="background:#f2f4f8; padding:20px; font-family:Arial, Helvetica, sans-serif;">
    <table width="600" cellpadding="0" cellspacing="0"
        style="margin:auto; background:#ffffff; border-radius:8px; overflow:hidden;">

        <!-- HEADER -->
        <tr>
            <td style="background:#16324a; padding:18px; color:white; font-size:20px; font-weight:bold;">
                New Quotation Request
            </td>
        </tr>

        <!-- PRODUCT DETAILS -->
        <tr>
            <td style="padding:20px;">
                <h3 style="color:#16324a; margin:0 0 10px;">Product Details</h3>
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="140">
                            @php
                                $image = ($product->images && $product->images->count())
                                    ? url('storage/' . $product->images->first()->image_path)
                                    : 'https://via.placeholder.com/120';
                            @endphp
                            <img src="{{ $image }}" width="120" style="border-radius:4px;">
                        </td>
                        <td style="padding-left:14px; font-size:14px;">
                            <strong>{{ $product->name }}</strong><br>
                            Item #: {{ $product->item_number }}<br>
                            @if($product->item_size) Size: {{ $product->item_size }}<br>@endif
                            @if($product->material) Material: {{ $product->material }}<br>@endif
                            @if($product->imprint_area) Imprint Area: {{ $product->imprint_area }}<br>@endif
                        </td>
                    </tr>
                </table>

                @if($product->colors && $product->colors->count())
                    <div style="margin-top:10px;">
                        <strong>Available Colors:</strong>

                        <ul style="list-style:none; padding-left:0; margin-top:8px;">
                            @foreach($product->colors as $color)

                                <li style="margin-bottom:10px; font-size:14px;">

                                    <!-- Row container -->
                                    <div style="display:flex; align-items:center; gap:10px;">

                                        <!-- Color Box -->
                                        <div style="
                                    width:20px;
                                    height:20px;
                                    border-radius:6px;
                                    border:1px solid #ccc;
                                    background: {{ $color->color_name }};
                                "></div>

                                        <!-- Image (if exists) -->
                                        @if($color->color_image)
                                            <img src="{{ url('storage/' . $color->color_image) }}" width="20"
                                                style="border:1px solid #ccc;">
                                        @endif

                                    </div>

                                </li>

                            @endforeach
                        </ul>
                    </div>
                @endif

            </td>
        </tr>

        <!-- CUSTOMER FORM DETAILS -->
        <tr>
            <td style="padding:20px;">
                <h3 style="color:#16324a;">Customer Submitted Information</h3>
                <table cellpadding="6" cellspacing="0" width="100%" style="font-size:14px; border-collapse:collapse;">
                    @foreach($form as $key => $value)
                        @if(!str_contains($key, 'attachment'))
                            <tr>
                                <td width="30%" style="background:#f7f9fc; border:1px solid #e3e7ed;">
                                    <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}</strong>
                                </td>
                                <td style="border:1px solid #e3e7ed;">
                                    {{ $value ?: '—' }}
                                </td>
                            </tr>
                        @endif
                    @endforeach

                    <!-- Attachments -->
                    @if(!empty($form['attachment1']))
                        <tr>
                            <td style="background:#f7f9fc; border:1px solid #e3e7ed;">Attachment 1</td>
                            <td style="border:1px solid #e3e7ed;">
                                <a href="{{ url('storage/' . $form['attachment1']) }}">Download</a>
                            </td>
                        </tr>
                    @endif

                    @if(!empty($form['attachment2']))
                        <tr>
                            <td style="background:#f7f9fc; border:1px solid #e3e7ed;">Attachment 2</td>
                            <td style="border:1px solid #e3e7ed;">
                                <a href="{{ url('storage/' . $form['attachment2']) }}">Download</a>
                            </td>
                        </tr>
                    @endif
                </table>
            </td>
        </tr>

        <!-- FOOTER -->
        <tr>
            <td style="background:#16324a; text-align:center; padding:16px; color:white;">
                Ink Well – Automated Quote Notification
            </td>
        </tr>
    </table>
</body>

</html>