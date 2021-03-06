@extends('layouts.app')

@section('head')
    @parent
    <title>{{ config('app.name', 'The Fittest Warrior') }} | About</title>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div class="spacer-50"></div>
    <div id="about">
        <div class="col">
            <div class="row">
                <div id="bruce-lee-story" class="col">
                    <img class="img-fluid" src="{{ asset('images/bruce_track_suit.jpg') }}">
                    <hr style="border: 2px solid #ccc;">
                    <h2 style="color: #ffffff;">Our Bruce Lee - Story</h2>
                    <p>From 1959 to 1963 Bruce Lee, James DeMile an undefeated Military Boxing Heavyweight Champion, Jesse Glover a Judo Practitioner, and Ed Hart a grappler fought, trained, and explored the strengths and weaknesses of Wing Chun, Boxing, Judo, Grappling, and the importance of speed training. They worked on different fight scenarios, reaction speed response, and attack strategies while developing a criteria to determine whether a technique met the standard of practicality, simplicity, and efficiency.</p>
                </div>
                <div id="our-mission" class="col">
                    <h2>Our Mission</h2>
                    <hr style="border: 2px solid #000000;">
                    <p>We are a competition and information site for athletes, fighters, martial artists, military, police and everyday men and women who seek to be the best in what they do and like to share their passion with others.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="spacer-50"></div>
@endsection
@section('footer')
    @parent
@endsection