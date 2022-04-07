@extends('guest.master')

@section('content')

{{-- sample CMS --}}
{{-- <section class="hm-frm hm-frm1 swiper">
    <div class="hm-frm1__slider swiper-wrapper">
        @foreach($page->content['section1_banner_images'] as $item)
		<div class="hm-frm1__item swiper-slide">
			<div class="page-bg--16-9">
				<div class="absolute top-0 left-0 w-full h-full bg-cover bg-center bg-no-repeat" style="background: linear-gradient(0deg, rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $page->renderUrl( $item['image']) }}') no-repeat center;"></div>
			</div>
		</div>
        @endforeach
	</div>

    <div class="hm-frm1__cntnt">
        <h1 class="text-white mb-4">{{ $page->content['section1_title'] }}</h1>
        <h2 class="text-white mb-4">{{ $page->content['section1_subtitle'] }}</h2>
        <div class="text-white">
            {!! $page->content['section1_desc'] !!}
        </div>
    </div>
</section> --}}

<section class="h-screen">
    <div class="h-full flex items-center justify-center">
        <h2 class="text-center">This is Laravel Homepage</h2>
    </div>
</section>

@endsection
