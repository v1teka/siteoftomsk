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
@endsection
