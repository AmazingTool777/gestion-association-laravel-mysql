@php
    // The desired locale
    $locale = 'fr_FR';
    // Create a new IntlDateFormatter object
    $dateFormatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    // Readable posting date
    $readablePostDate = $dateFormatter->format($donationCall->created_at);
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $donationCall->title }}</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .donation-call-subheading {
            margin-bottom: 40px;
        }

        .donation-call-type {
            color: #fff;
            background-color: #43c0e5;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
        }

        .image-container {
            text-align: center;
            width: 100%;
        }

        .image-container img {
            max-width: 100%;
            max-height: 458px;
        }

        .donation-call-amount {
            color: #555;
        }

        .donation-call-amount strong {
            color: #000;
        }
    </style>
</head>

<body>
    <h1>{{ $donationCall->title }}</h1>
    <p class="donation-call-subheading">
        <strong class="donation-call-type">{{ $donationCall->type->name }}</strong>
        <span style="font-weight: 700">
            ·
        </span>
        Lancé le {{ $readablePostDate }}
    </p>
    <div class="image-container">
        <img src="{{ ImageFacade::convertImageToBase64('/public/images/donation_calls/' . $donationCall->photo) }}"
            alt="{{ $donationCall->title }}">
    </div>
    <p class="donation-call-description">
        {!! $donationCall->description !!}
    </p>
    <p class="donation-call-amount">
        Montant requis:
        <strong>{{ $donationCall->required_amount }}Ar</strong>
    </p>
</body>

</html>
