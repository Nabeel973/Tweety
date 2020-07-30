@if (Session::has('success'))
    <div class="alert col-3 float-right alert-success alert-dismissible fade show" role="alert" style="color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;">
        <h4 class="alert-heading">Success!</h4>
        <p>{{ Session::get('success') }}</p>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
