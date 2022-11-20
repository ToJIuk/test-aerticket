<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test aerticket</title>
</head>
<body>
    <form action="/" method="POST">
        @csrf
        <h3>User:</h3>
        <div>
            <label for="login">Login</label>
            <input type="text" name="login"><br>
            <label for="password">Password</label>
            <input type="password" name="password"><br>
        </div>
        <hr>
        <h3>Query params:</h3>
        <div>
            <label for="departureAirport">Departure airport</label>
            <input type="text" name="departureAirport"><br>
            <label for="arrivalAirport">Arrival airport</label>
            <input type="text" name="arrivalAirport"><br>
            <label for="departureDate">Departure date</label>
            <input type="text" name="departureDate"><br>
        </div>
        <input type="submit" value="Search">
    </form>
    @isset($response['error'])
        <h3 style="color: red">Errors:</h3>
        @if (is_array($response['error']))
            @foreach($response['error'] as $key => $val)
                <spane style="color: red">{{ $key }}: {{ $val[0] }}</spane><br>
            @endforeach
        @else
            <spane style="color: red">{{ $response['error'] }}</spane>
        @endif
    @endisset
    @isset($response['searchResults'])
        <pre>
            {{ print_r($response, 1) }}
        </pre>
    @endisset
</body>
</html>
