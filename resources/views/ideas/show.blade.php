@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @session('success')
                @include('shared.success-message')
            @endsession
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
        </div>
        <div class="col-3">
           @include('shared.search-bar')
           @include('shared.follow-box')
            
        </div>
    </div>
@endsection
