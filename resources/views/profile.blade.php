@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @include('layouts.navbar')

    <div class="page-section">
        <div class="page-panel card profile-panel mx-auto">
            <div class="section-header">
                <div>
                    <h1>My Profile</h1>
                    <p class="text-muted mb-0">Your account and personal information.</p>
                </div>
            </div>

            <div class="profile-card">
                <div class="profile-identity">
                    <div class="profile-photo" aria-label="Profile photo">
                        <img
                            src="{{ asset('image.png') }}"
                            alt="Profile photo">
                    </div>
                    <div>
                        <h2>Your Full Name</h2>
                        <span class="profile-role">Your Role</span>
                    </div>
                </div>

                <div class="profile-details">
                    <div class="profile-detail">
                        <small>Email</small>
                        <strong>email@example.com</strong>
                    </div>
                    <div class="profile-detail">
                        <small>Joined</small>
                        <strong>DD Month YYYY</strong>
                    </div>
                    <div class="profile-detail">
                        <small>Phone Number</small>
                        <strong class="profile-placeholder">Add your phone number</strong>
                    </div>
                    <div class="profile-detail">
                        <small>Address</small>
                        <strong class="profile-placeholder">Add your address</strong>
                    </div>
                </div>

                <div class="profile-note">
                    <h5>About Me</h5>
                    <p class="mb-0">Add a short description about yourself here.</p>
                </div>
            </div>
        </div>
    </div>
@endsection