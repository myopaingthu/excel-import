@extends('layouts.app')

@section('css')
<style>
    .card-outer {
        min-height: 100vh;
    }
</style>
@endsection

@section('content')

<div class="align-items-center d-flex justify-content-center card-outer">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Please upload excel file.</h5>
                <form action="{{ route('import.upload') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="excel_input" class="form-label">File</label>
                        <input type="file" class="form-control @error('excel_file') is-invalid @enderror" name="excel_file" id="excel_input" placeholder="name@example.com">
                        @if ($errors->has('excel_file'))
                        <span class="text-danger">{{ $errors->first('excel_file') }}</span>
                        @endif
                    </div>
                    <input type="submit" value="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection