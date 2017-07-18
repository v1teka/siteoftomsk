@extends('layouts.app')

@section('title', 'Томск 7.0. Технологии и творчество')

@section('content')
  @parent
  <div class="section welcome">
      <div class="container welcome__container">
          <div class="title title-xl welcome__title">Уважаемые посетители портала,</div>
          <div class="text welcome__text">здесь Вы можете ознакомиться с проектами по социологическим исследованиям в городе Томске. На страницах нашего портала Вы можете принять участие в разных опросах, оставить свои комментарии и просто узнать очень много интересного!</div>
      </div>
  </div>

  @if(count($projects))
      <div class="section projects">
          <div class="container projects__container">
              <h2 class="title title-xl projects__title">Проекты</h2>
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
