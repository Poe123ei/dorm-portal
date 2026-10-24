
@extends('layouts.app')

@section('content')
    <h1>Worship Event Details</h1>

    <p><strong>Dorm:</strong> {{ $event->dorm }}</p>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Session:</strong> {{ $event->session }}</p>

    <a href="{{ route('events.index') }}">Back to Events</a>
@endsection
