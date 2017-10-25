@extends('layouts.app')

@section('title', 'Томск 7.0. Технологии и творчество')

@section('content')
  @parent

  <div class="section slider">
      @include ('pages.includes.slider')
  </div>

  <!--<div class="section welcome">
      <div class="container-fluid">
          <div class="alert alert-success" role="alert">
              <div class="title h2">Уважаемые посетители!</div>
              <p>На нашем портале вы можете получить информацию и выразить свое мнение по вопросам, связанным с формированием комфортной и безопасной городской среды, отслеживать динамику процесса  формирования Томска как города равных возможностей.</p>
          </div>
      </div>
  </div>-->

  @if (count($projects))
      <div class="section section--last projects">
          <div class="container-fluid">
              <h2 class="title title--projects">Наиболее обсуждаемые проекты</h2>
              <div class="GrossGroup">
                  @foreach ($projects as $project)
                      @include('projects.includes.card')
                  @endforeach
              </div>
          </div>
      </div>
  @endif

@endsection
