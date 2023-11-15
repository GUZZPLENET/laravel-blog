<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<div style="padding: 3rem 1rem;  color: #333333 !important;  font-family: 'Roboto', sans-serif !important;  background-color: #ffffff !important;">
    <a href="%url%" style="display: block !important; margin-bottom: 2rem !important; text-align: center !important;" target="_blank">
        <h1>{{ config('app.name') }}</h1>
    </a>
    <div style="max-width: 640px !important; margin: 0 auto !important; text-align: center !important; background-color: #ffffff !important; font-size: 1rem !important; line-height: 1.5 !important; border: 1px solid #cccccc !important; border-top: 5px solid #2dce89 !important; border-radius: .5rem !important;">
        <div style="padding: 1.25rem !important;">
            <p style="margin-top: 0 !important; margin-bottom: 1rem !important;">Merhaba</strong>,</p>
            <p style="margin-top: 0 !important; margin-bottom: 1rem !important;">{{ $blog->user->name }} kişisi yeni bir blog oluşturdu.</p>
            <p style="margin-top: 0 !important; margin-bottom: 1rem !important; color: #6c757d !important;">Blog konusu: {{ $blog->title }}</p>
            <a href="{{ $link }}" style="color: #fff !important; text-decoration: none !important; padding-left: 12px; padding-right: 12px; padding-bottom: 6px; padding-top: 6px; border-radius: 32px; background: #0aa073" target="_blank">Oku</a>
        </div>
    </div>
</div>
</body>
</html>
