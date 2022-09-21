@extends('layout')
@section('content')
    <div class="datatable-content">
        {!! $dataTable->table([]) !!}
    </div>
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
