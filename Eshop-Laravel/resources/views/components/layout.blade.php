<!DOCTYPE html>
<html lang="en">

@include('include._head')

<body>
    
    @include('include._alert')
    @include('include._header')
    <div class="container">
        <main>
          <div class="row">
                {{ $slot }}
            </div>
        </main>
    </div>
    @include('include._footer')
</body>

</html>
