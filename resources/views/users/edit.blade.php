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
                @include('shared.user-update-card')
                <hr>

                @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
            @empty
                <p class="text-center mt-4">no results found</p>
            @endforelse




            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')

        </div>
    </div>
@endsection
