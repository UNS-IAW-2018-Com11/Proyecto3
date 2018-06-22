@extends('layouts.layout')

@section('body')

<div class="container-fluid">
 <div class="row content">
  <div class="col IAWbanner"></div>
  <div class="col-8">
   <!--    aca va la lista -->
	 <div class="container lista">
		 <h2 align="center">Watch these video tutorials for some tips for your next match!</h2>
		 <div class="list-group" id="torneosactivos">
    <div id="videos">
    </div>
		</div>
		</div>

  </div>
  <div class="col IAWbanner"></div>
 </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/youtubeAPI.js')}}" async></script>
@endsection
