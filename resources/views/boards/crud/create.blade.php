@php $active = 'boards'; @endphp
@php $title = 'Create Board'; @endphp
@php $section = true; @endphp

@extends('layouts.app')

@section('content')
    <div class="page row create-board-page">
        <div class="left-blank-space col-lg-4">

        </div>
        <div class="middle-create-form box box-centered col-lg-4">
            <form action="{{ route('job_board.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <img id="create-board-logo-img" class="logo-img" src="" alt="">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" class="form-control" id="create-board-logo" placeholder="Upload logo">
                    @error('logo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="banner">Banner</label>
                    <input type="file" name="banner" class="form-control" id="banner" placeholder="Upload banner">
                    @error('banner')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" >
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Enter description"></textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" name="website" class="form-control" id="website" placeholder="Enter website">
                    @error('website')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <!-- Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Create">
                </div>
            </form>
        </div>
        <div class="right-blank-space col-lg-4">
            
        </div>
    </div>
@endsection