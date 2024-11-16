<!DOCTYPE html>
<html lang="en">

@include('include._head')

<body>
    <div class="container-fluid border">
        <div class="row">
            @include('include._header')
            <main class="col-12">
                {{ $slot }}
            </main>
            @include('include._footer')
        </div>
    </div>
</body>

</html>
