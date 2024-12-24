<x-company::layouts
    :has-header="false"
    :has-feature="false"
    :has-footer="false"
>
@php
    $errorCode = 400;
@endphp
    
    <!-- Page Title -->
    <x-slot:title>
        {{ $errorCode }} @lang("saas::app.tenant.custom-errors.not-allowed-to-visit-this-section")
    </x-slot>

    <!-- Cursor movement canvas line -->
    <canvas 
        resize="true"
        id="canvas-wd"
    >
    </canvas>

    <!-- Error page Information -->
	<div class="container absolute left-[50%] top-0 -translate-x-[50%] px-16 max-lg:px-8 max-sm:px-4">
		<div class="grid h-[100vh] w-full">
			<div class="wrapper-404 max-868:!text-[294px] max-md:!text-[140px]">
				<div class="glow-404">
                    {{ $errorCode }}
                </div>

				<div class="glow-shadow-404">
                    {{ $errorCode }}
                </div>

				<div class="absolute left-[50%] top-[80%] mt-10 -translate-x-[50%] -translate-y-[50%] text-center max-868:w-full">
					<h1 class="text-3xl font-semibold">
                        @lang("saas::app.tenant.custom-errors.tenant-blocked")
                    </h1>

					<p class="mt-2 text-lg text-[#6E6E6E]">
                        <strong><i>{{ $_SERVER['HTTP_HOST'] ?? NULL }}</i></strong> @lang("saas::app.tenant.custom-errors.blocked").
                    </p>

					<p class="mt-2 text-lg text-[#6E6E6E]">
                        @lang("saas::app.tenant.custom-errors.block-message")
                    </p>

					<a 
                        href="{{ env('APP_URL') }}"
						class="m-auto mt-8 block w-max cursor-pointer rounded-[45px] bg-navyBlue px-5 py-2.5 text-center text-base font-medium text-white max-sm:mb-10 max-sm:px-6 max-sm:text-sm"
                    >
						@lang('shop::app.errors.go-to-home') 
                    </a>
				</div>
			</div>
		</div>
	</div>

    @pushOnce('scripts')
        <script type="text/paperscript" canvas="canvas-wd">
            var points = 30;
            var length = 30;
        
            var path = new Path({
                strokeColor: '#060C3B',
                strokeWidth: 10,
                strokeCap: 'round'
            });
        
            var start = view.center / [10, 1];
            for (var i = 0; i < points; i++)
                path.add(start + new Point(i * length, 0));
        
            function onMouseMove(event) {
                path.firstSegment.point = event.point;
                for (var i = 0; i < points - 1; i++) {
                    var segment = path.segments[i];
                    var nextSegment = segment.next;
                    var vector = segment.point - nextSegment.point;
                    vector.length = length;
                    nextSegment.point = segment.point - vector;
                }
                path.smooth({ type: 'continuous' });
            }
        </script>
    @endPushOnce
</x-company::layouts>