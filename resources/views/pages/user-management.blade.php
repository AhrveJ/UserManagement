@extends('layouts.app')

@section('title', 'User Management – Edit Users')

@section('content')
    <x-navbar />

    <div class="d-flex position-relative">
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

        <x-sidebar active="edit-users" />

        <main class="content-area flex-grow-1" style="min-width:0;">
            <h1 class="panel-title">User Management - Edit Users</h1>

            <x-search-bar />

            <x-filters :regions="$regions" :divisions="$divisions" :statuses="$statuses" />

            <x-user-table :users="$users" />

            <x-pagination :total="count($users)" />
        </main>
    </div>

    <x-user-modal />
    <x-delete-modal />
    <x-toast />

    @push('scripts')
        {{-- Seed the client-side store with the same data the controller rendered server-side --}}
        <script>
            window.INITIAL_USERS = @json($users);
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
    @endpush
@endsection