<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>{{ config('app.name', "Sales Manager's Dashboard") }}</title>
    @include('elements.meta_tags')
    @include('elements.styles')
    @include('elements.scripts')
</head>
<body>
    <div class="container p-5">
        @yield('content')
    </div>
    <script>
        $('#addSalesRep').modal({ 'show' : {{ count($errors) > 0 ? 'true' : 'false' }}  });
    </script>
</body>