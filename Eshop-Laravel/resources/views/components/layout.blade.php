<!DOCTYPE html>
<html lang="en">

@include('include._head')

<body>
    @include('include._header')
    <main>
        <div class="container">
            <div class="row">
                {{ $slot }}
            </div>
        </div>
    </main>
    @include('include._footer')
</body>

</html>
