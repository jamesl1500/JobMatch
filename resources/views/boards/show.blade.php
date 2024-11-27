@php $active = 'boards'; @endphp
@php $title = $board->name; @endphp
@php $section = true; @endphp

@extends('layouts.app')

@section('banner')
    <div class="view-board-banner" style="background-image: url(<?php echo asset('board_banners/' . $board->banner); ?>);">
        <div class="view-board-banner-overlay">
            <div class="view-board-banner-info container">
                <div class="banner-info-img">
                    <img src="{{ asset('board_logos/' . $board->logo) }}" alt="">
                </div>
                <div class="banner-info-text">
                    <h1>{{ $board->name }}</h1>
                    <p>{{ $board->description }}</p>
                </div>
                <?php
                if(auth()->user()->role == "employer")
                {
                    ?>
                        <div class="banner-info-actions">
                            <a href="{{ route('job_board.edit', $board->id) }}" class="btn btn-primary">Edit board</a>
                            <a href="{{ route('job_board.destroy', $board->id) }}" class="btn btn-danger">Delete board</a>
                        </div>
                    <?php
                }else
                {
                    ?>
                        <div class="banner-info-actions">
                            <a href="{{ route('job_board.show', $board->id) }}" class="btn btn-primary">Share Board</a>
                        </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
@endsection

@section('page-navigation')
    <div class="page-navigation">
        <div class="container">
            <ul class="page-navigation-list">
                <li class="active"><a href="{{ route('job_board.show', $board->id) }}">Jobs</a></li>
                <?php
                if(auth()->check())
                {
                    if(auth()->user()->role == "employer")
                    {
                        ?>
                            <li><a href="">Applicants</a></li>
                            <li><a href="">Insights</a></Li>
                        <?php
                    }else if(auth()->user()->role == "job_seeker")
                    {
                        ?>
                            <li><a href="">Applications</a></li>
                        <?php

                    }
                }
                ?>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="page view-board-page">
        <div class="page-inner row">
            <div class="left-filters-view col-lg-3">
                <div class="box">
                    <div class="box-body">
                        <form action="">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" id="search" placeholder="Search..." />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="view-jobs-middle col-lg-6">
                <?php
                if(count($board->jobs) > 0)
                {
                    ?>
                        <div class="jobs">
                            <?php
                            foreach($board->jobs as $job)
                            {
                                ?>
                                   
                                <?php
                            }
                            ?>
                        </div>
                    <?php
                }else{
                    ?>
                        <div class="no-jobs">
                            <h2>Uh Oh!</h2>
                            <p>No jobs found</p>
                            <?php
                                // Check to see if logged user is owner of the board
                                if(auth()->check() && auth()->user()->id == $board->user_id)
                                {
                                    ?>
                                        <a href="{{ route('job.create') }}" class="btn btn-primary">Create Job</a>
                                    <?php
                                }
                            ?>
                        </div>
                    <?php
                }
                ?>
            </div>
            <div class="right-jobs-view col-lg-3">

            </div>
        </div>
    </div>
@endsection