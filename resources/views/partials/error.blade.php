@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li class="list-group-item">
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif