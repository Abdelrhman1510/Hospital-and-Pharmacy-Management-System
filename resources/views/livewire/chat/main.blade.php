<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0;">

@extends('Dashboard.layouts.master')

@section('css')
<!-- Custom CSS can be added here -->
@endsection

@section('page-header')
    <div class="breadcrumb-header" style="background-color: #007bff; padding: 15px; color: white; border-radius: 5px;">
        <div class="d-flex justify-content-between">
            <h4 class="content-title" style="margin: 0; font-size: 24px;">Conversations</h4>
            <span style="font-size: 14px;">/ Last Conversations</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="container" style="display: flex; padding: 20px;">
        <div class="col-md-4" style="flex: 1; max-width: 350px;">
            <div class="card" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="main-content-left main-content-left-chat" style="padding: 15px;">
                    <nav class="nav main-nav-line main-nav-line-chat" style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                        <a class="nav-link active" style="font-size: 16px; color: #007bff;">Last Conversations</a>
                    </nav>
                    @livewire('chat.chatlist')
                </div>
            </div>
        </div>

        <div class="col-md-8" style="flex: 2; max-width: 800px;">
            <div class="card" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <a class="main-header-arrow" href="" id="ChatBodyHide" style="padding: 10px; background: #f1f1f1; color: #007bff;">
                    <i class="icon ion-md-arrow-back" style="font-size: 18px;"></i>
                </a>
                @livewire('chat.chatbox')
                @livewire('chat.send-message')
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{URL::asset('Dashboard/plugins/lightslider/js/lightslider.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/js/chat.js')}}"></script>
@endsection

</body>
</html>
