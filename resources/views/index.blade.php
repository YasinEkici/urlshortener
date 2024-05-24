<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
</head>
<body>
    <h1>URL Shortener</h1>
    <form action="{{ route('shorten') }}" method="POST">
        @csrf
        <input type="text" name="original_url" placeholder="Enter URL" required>
        <button type="submit">Shorten</button>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('short_url'))
        <div>
            <p>Short URL: <a href="{{ url(session('short_url')) }}">{{ url(session('short_url')) }}</a></p>
        </div>
    @endif
</body>
</html>
