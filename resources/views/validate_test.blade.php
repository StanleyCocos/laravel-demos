<html>
    <head>
        <title>
            test validate error
        </title>
    </head>
    <body>
    <h1>Create Post</h1>
    <p>
    <form action="/test_validate1" method="post">
        <p>First name: <input type="text" name="name" /></p>
        <p>Last id: <input type="text" name="id" /></p>
        <input type="submit" value="Submit" />
    </form>
    </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </body>
</html>