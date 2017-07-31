@extends('layouts.app')

@section('title', 'Томск 7.0. Технологии и творчество')

@section('content')
  @parent

  <div class="section slider">
      @include ('pages.includes.slider')
  </div>

  <div class="section welcome">
      <div class="container-fluid">
          <div class="title h2">Уважаемые посетители портала,</div>
          <p>здесь Вы можете ознакомиться с проектами по социологическим исследованиям в городе Томске. На страницах нашего портала Вы можете принять участие в разных опросах, оставить свои комментарии и просто узнать очень много интересного!</p>
      </div>
  </div>

  @if (count($projects))
      <div class="section section--last projects">
          <div class="container-fluid">
              <h2 class="title title--xl">Проекты</h2>
              @foreach ($projects->chunk(3) as $chunk)
                  <div class="row">
                      @foreach ($chunk as $project)
                          @include('projects.includes.card')
                      @endforeach
                  </div>
              @endforeach
          </div>
      </div>
  @endif

@endsection
