<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $model->name }} - Registration Form</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #222;
            font-size: 12px;
        }
        .container {
            width: 100%;
            margin: auto;
        }
        .row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }
        .col-md-5, .col-md-10 {
            width: 45%;
            margin: 5px;
        }
        .label {
            font-weight: bold;
            display: block;
            margin-bottom: 3px;
        }
        .value {
            border-bottom: 1px solid #ccc;
            padding: 3px 0;
            min-height: 16px;
        }
        .section-title {
            background: #f4f4f4;
            padding: 5px 10px;
            border-left: 3px solid #007bff;
            margin-top: 15px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        img {
            border-radius: 6px;
            margin-top: 5px;
            max-width: 100%;
            height: auto;
        }
        .gallery img {
            width: 100px;
            height: 120px;
            object-fit: cover;
            border: 1px solid #ddd;
            margin: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div style="text-align:center">
        <img src="{{ public_path('User/assets/img/logo.png') }}" style="width:80px">
        <h2>Model Registration Form</h2>
        <p>Generated on {{ now()->format('d M Y, h:i A') }}</p>
    </div>

    <!-- PERSONAL INFO -->
    <div class="section-title">Personal Information</div>
    <div class="row">
        <div class="col-md-5">
            <label class="label">Full Name</label>
            <div class="value">{{ $model->name ?? '-' }}</div>
        </div>
        <div class="col-md-5">
            <label class="label">Father Name</label>
            <div class="value">{{ $model->father_name ?? '-' }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <label class="label">Date of Birth</label>
            <div class="value">{{ $model->dob ?? '-' }}</div>
        </div>
        <div class="col-md-5">
            <label class="label">Age</label>
            <div class="value">{{ $model->age ?? '-' }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <label class="label">Gender</label>
            <div class="value">{{ ucfirst($model->gender ?? '-') }}</div>
        </div>
        <div class="col-md-5">
            <label class="label">Occupation</label>
            <div class="value">{{ $model->occupation ?? '-' }}</div>
        </div>
    </div>
    @if($userRole !== 'Brand')
    <!-- CONTACT -->
    <div class="section-title">Contact Information</div>
    <div class="row">
        <div class="col-md-5">
            <label class="label">Mobile No.</label>
            <div class="value">{{ $model->mobile_no ?? '-' }}</div>
        </div>
        <div class="col-md-5">
            <label class="label">Home No.</label>
            <div class="value">{{ $model->home_no ?? '-' }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <label class="label">Address</label>
            <div class="value">{{ $model->address ?? '-' }}</div>
        </div>
    </div>



    <!-- SOCIAL -->
    <div class="section-title">Social Media</div>
    <div class="row">
        <div class="col-md-5"><label class="label">Facebook</label><div class="value">{{ $model->facebook_id ?? '-' }}</div></div>
        <div class="col-md-5"><label class="label">Instagram</label><div class="value">{{ $model->instagram_id ?? '-' }}</div></div>
    </div>
    <div class="row">
        <div class="col-md-5"><label class="label">Snapchat</label><div class="value">{{ $model->snapchat_id ?? '-' }}</div></div>
        <div class="col-md-5"><label class="label">Tiktok</label><div class="value">{{ $model->tiktok_id ?? '-' }}</div></div>
    </div>
    <div class="row">
        <div class="col-md-5"><label class="label">YouTube</label><div class="value">{{ $model->youtube_id ?? '-' }}</div></div>
    </div>

    <!-- PASSPORT & CNIC -->
    <div class="section-title">Identification</div>
    <div class="row">
        <div class="col-md-5"><label class="label">Passport No.</label><div class="value">{{ $model->passport_no ?? '-' }}</div></div>
        <div class="col-md-5"><label class="label">Expiry</label><div class="value">{{ $model->passport_expiry ?? '-' }}</div></div>
    </div>

    <div class="row">
        <div class="col-md-5"><label class="label">CNIC</label><div class="value">{{ $model->cnic ?? '-' }}</div></div>
        <div class="col-md-5"><label class="label">Expiry</label><div class="value">{{ $model->cnic_expiry ?? '-' }}</div></div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <label class="label">CNIC Front</label>
            @if($model->cnic_front)<img src="{{ public_path(str_replace(url('/'), '', $model->cnic_front)) }}" width="200">@endif
        </div>
        <div class="col-md-5">
            <label class="label">CNIC Back</label>
            @if($model->cnic_back)<img src="{{ public_path(str_replace(url('/'), '', $model->cnic_back)) }}" width="200">@endif
        </div>
    </div>

    <!-- MEASUREMENTS -->
    <div class="section-title">Measurements</div>
    @php $measurements = $model->measurements ? json_decode($model->measurements, true) : []; @endphp
    <div class="row">
        @foreach($measurements as $key => $value)
            <div class="col-md-5">
                <label class="label">{{ ucwords(str_replace('_', ' ', $key)) }}</label>
                <div class="value">{{ $value ?? '-' }}</div>
            </div>
        @endforeach
    </div>

    <!-- LANGUAGES -->
    @php $languages = $model->languages ? json_decode($model->languages, true) : []; @endphp
    <div class="section-title">Languages</div>
    <p>{{ $languages ? implode(', ', $languages) : '-' }}</p>
@endif
    <!-- GALLERY -->
    <div class="section-title">Gallery</div>
    <div class="gallery">
        @foreach($model->assets as $asset)
            @if($asset->type === 'image')
                <img src="{{ public_path(str_replace(url('/'), '', $asset->url)) }}" alt="">
            @endif
        @endforeach
    </div>

</div>
</body>
</html>
