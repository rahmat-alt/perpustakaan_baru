<!DOCTYPE html>
<html>

<head>
    <title>Test Captcha Laravel 12</title>
</head>

<body>
    @if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
    @endif

    @if($errors->any())
    <p style="color: red">{{ $errors->first('captcha') }}</p>
    @endif

    <form action="/captcha-test" method="post">
        @csrf
        <div class="captcha">
            <span>{!! captcha_img() !!}</span>
            <button type="button" id="refresh-captcha">Refresh</button>
        </div>
        <input type="text" name="captcha" placeholder="Enter captcha" required>
        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('refresh-captcha').addEventListener('click', function() {
            fetch('/refresh-captcha')
                .then(res => res.json())
                .then(data => document.querySelector('.captcha span').innerHTML = data.captcha);
        });
    </script>
</body>

</html>
