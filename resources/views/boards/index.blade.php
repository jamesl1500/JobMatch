@php $active = 'boards'; @endphp
@php $title = 'My Boards'; @endphp
@php $section = true; @endphp

@extends('layouts.app')

@section('content')
    <div class="page row my-boards-page">
        <?php
        if(auth()->user()->role == "employer")
        {
            ?>
            <div class="left-blank-space col-lg-3">

            </div>
            <div class="middle-boards col-lg-6">
                <div class="inner-middle-boards">
                    <?php
                        // Check if the user has boards
                        $boards = auth()->user()->jobBoards;

                        if(count($boards) > 0)
                        {
                            ?>
                                <div class="boards">
                                    <?php
                                        foreach($boards as $board)
                                        {
                                            $description = $board->description;

                                            if(strlen($description) > 100)
                                            {
                                                $description = substr($description, 0, 100) . "...";
                                            }
                                            ?>
                                                <div class="board">
                                                    <div class="board-top-banner" style="background-image: url(<?php echo asset('board_banners/' . $board->banner); ?>);"></div>
                                                    <div class="board-inner">
                                                        <div class="board-logo">
                                                            <img src="{{ asset('board_logos/' . $board->logo) }}" alt="">
                                                        </div>
                                                        <div class="board-info">
                                                            <h2>{{ $board->name }}</h2>
                                                            <p>{{ $description }}</p>
                                                        </div>
                                                        <div class="board-stats">
                                                            <div class="board-stats-item">
                                                                <h3>Jobs</h3>
                                                                <p>0</p>
                                                            </div>
                                                            <div class="board-stats-item">
                                                                <h3>Views</h3>
                                                                <p>0</p>
                                                            </div>
                                                        </div>
                                                        <div class="board-actions">
                                                            <a href="{{ route('job_board.show', $board->id) }}" class="btn btn-primary">View Board</a>
                                                            <a href="{{ route('job_board.edit', $board->id) }}" class="btn btn-primary">Edit board</a>
                                                            <a href="{{ route('job_board.destroy', $board->id) }}" class="btn btn-danger">Delete board</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            <?php
                        }else{
                            ?>
                                <div class="no-boards">
                                    <h2>You have no boards</h2>
                                    <p>You need a job board to post jobs</p><br/>
                                    <a href="{{ route('job_board.create') }}" class="btn btn-primary">Create a Board</a>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="right-blank-space col-lg-3">

            </div>
            <?php
        }
        ?>
    </div>
@endsection