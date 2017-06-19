@if (Session::has('errors'))

    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}<BR>
        @endforeach
    </div>

    <?php Session::forget('errors') ?>
@endif


@if(Session::has('error') )

    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>

    <?php Session::forget('error') ?>
@endif


@if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>

    <?php Session::forget('message') ?>


@endif


