@if (Session::has('success'))
    <div class="bg-indigo-900 alert col-3 float-right" style=" color:white;border-color: #c3e6cb; padding-right: 4rem; position: relative;padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;">
        <strong>Success! </strong>{{ session('message') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif
