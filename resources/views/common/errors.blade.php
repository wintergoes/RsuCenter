@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
                <div class="font-35 text-danger"><i class="bx bx-info-circle"></i>
                </div>
                <div class="ms-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>        

    </div>
@endif