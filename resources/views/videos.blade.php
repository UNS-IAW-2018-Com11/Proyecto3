@extends('layouts.layout')

@section('body')
	<div>
	    <div id ="container">
	        <ul id="results"></ul>
	    </div>
	</div>

@endsection

@section('scripts')
  <script src="{{asset('js/youtubeAPI.js')}}" async></script>
@endsection
