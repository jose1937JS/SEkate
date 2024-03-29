@include('layouts.header')
@include('layouts.navbar')




{{--<div class="embed-responsive">
	<iframe class="embed-responsive-item" src="{{  }}"></iframe>
</div>--}}







<br>
<div class="container my-5 pt-5 animated fadeIn bg">

	<div class="row">

		<div class="col-md-3 col-sm-12 animated slideInLeft">
			<div class="row">
				<div class="col-sm-6 col-md-12">
					<div class="card testimonial-card">
						<div class="card-up cyan lighten-3 dark-text"></div>
						<div class="avatar mx-auto white">
							<img src="{{ asset('storage/'.$me->people->avatar) }}" class="rounded-circle" alt="404">
						</div>
						<div class="card-body">
							<h4 class="card-title">{{ $me->people->first_name }} {{ $me->people->last_name }}</h4>
							<p class="lead">{{ $me->type }}</p>
							<p class="lead">{{ ucfirst($me->people->type) }}</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-12 mt-3">
					<div class="card mb-5">
						<div class="card-header cyan lighten-3 text-dark ">
							<h5 class="d-flex justify-content-between">
								<span><i class="fas fa-book mr-2"></i>Unidades</span>
								<span>{{ $topics->count() }}</span>
							</h5>
						</div>
						<div class="card-body">
							<ul class="list-group">
								@foreach( $topics as $topic )
									<li class="list-group-item">
										<a href='{{ url("tema/$topic->topic") }}'>{{ $topic->topic }}</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<div class="col-md-9 col-sm-12 animated zoomInRight slow">
			
			<!-- Classic tabs -->
			<div class="classic-tabs mx-2">

				<ul class="nav cyan lighten-3" id="myClassicTabOrange" role="tablist">
					<li class="nav-item">
						<a class="nav-link black-text  waves-light active show" id="contenido-tab-classic-orange" data-toggle="tab" href="#contenido-classic-orange" role="tab" aria-controls="contenido-classic-orange" aria-selected="true">
							<i class="fas fa-edit fa-2x pb-2" aria-hidden="true"></i><br>Contenido
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link black-text waves-light" id="images-tab-classic-orange" data-toggle="tab" href="#images-classic-orange" role="tab" aria-controls="images-classic-orange" aria-selected="false">
							<i class="fas fa-image fa-2x pb-2" aria-hidden="true"></i><br>Imágenes
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link black-text waves-light" id="videos-tab-classic-orange" data-toggle="tab" href="#videos-classic-orange"
						role="tab" aria-controls="videos-classic-orange" aria-selected="false">
							<i class="fas fa-video fa-2x pb-2" aria-hidden="true"></i><br>Vídeos
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link black-text waves-light" id="files-tab-classic-orange" data-toggle="tab" href="#files-classic-orange" role="tab" aria-controls="files-classic-orange" aria-selected="false">
							<i class="fas fa-file fa-2x pb-2" aria-hidden="true"></i><br>Archivos
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link black-text waves-light" id="test-tab-classic-orange" data-toggle="tab" href="#test-classic-orange" role="tab" aria-controls="test-classic-orange" aria-selected="false">
							<i class="fas fa-star fa-2x pb-2" aria-hidden="true"></i><br>Pruebas
						</a>
					</li>
				</ul>

				<div class="tab-content card" id="myClassicTabContentOrange">
					<div class="tab-pane fade active show" id="contenido-classic-orange" role="tabpanel" aria-labelledby="contenido-tab-classic-orange">
						
						@if( count($textcontents) > 0 )
							@foreach($textcontents as $t)
								<div class="card mb-3 hoverable">
									<div class="card-body">
										<h4 class="card-title">{{ $t->name }}</h4>
										<p class="card-text">{{!! $t->textcontent !!}}</p>
									</div>
								</div>
							@endforeach
						@else
							<h2 class="text-center">Aun no hay contenido registrado.</h2>
						@endif

					</div>
					<div class="tab-pane fade" id="images-classic-orange" role="tabpanel" aria-labelledby="images-tab-classic-orange">
						
						@if( count($images) > 0 )
							@foreach($images as $img)
								<div class="card mb-3 view zoom hoverable">
									<div class="card-body d-flex justify-content-center">
										<img class="img-fluid" src='{{ asset("storage/$img->file") }}' alt="">
									</div>
								</div>
							@endforeach
						@else
							<h2 class="text-center">Aun no hay contenido registrado.</h2>
						@endif

					</div>
					<div class="tab-pane fade" id="videos-classic-orange" role="tabpanel" aria-labelledby="videos-tab-classic-orange">
						
						@if( count($videos) > 0 )
							@foreach( $videos as $v )
								<div class="card mb-3 hoverable">
									<div class="card-body">
										<video class="video-fluid" controls src='{{ "storage/$v->file" }}'></video>
									</div>
									<div class="card-footer">
										<p class="h4 text-monospace">{{ $v->name }}</p>
									</div>
								</div>
							@endforeach
						@else
							<h2 class="text-center">Aun no hay contenido registrado.</h2>
						@endif

					</div>
					<div class="tab-pane fade" id="files-classic-orange" role="tabpanel" aria-labelledby="files-tab-classic-orange">
						
						<div class="row">
							@if( count($files) > 0 )
								@foreach($files as $content)
									<div class="col-4">
										<div class="card wider mb-4 img hoverable">
											<!-- Card image -->
											<div class="view text-center mt-3" data-toggle="modal" data-target="#imgmodal">

												@if( preg_match("/(\.pdf)$/", $content->file) )
													<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-pdf fa-5x"></i></a>
												@endif

												@if( preg_match("/(\.docx|\.doc|\.odt)$/", $content->file) )
													<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-word fa-5x"></i></a>
												@endif
												
												@if( preg_match("/(.txt)$/", $content->file) )
													<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-alt fa-5x"></i></a>
												@endif

												@if( preg_match("/(\.csv)$/", $content->file) )
													<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-csv fa-5x"></i></a>
												@endif

												@if( preg_match("/(.ppt)$/", $content->file) )
													<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-powerpoint fa-5x"></i></a>
												@endif
												
												@if( preg_match("/(\.excel|\.xls)$/", $content->file) )
													<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-excel fa-5x"></i></a>
												@endif

											</div>
											<!-- Card content -->
											<div class="card-body card-body-cascade text-justify">
												<!-- Title -->
												<p class="card-title text-center">{{ $content->name }}</p>
												<!-- Subtitle -->
												<p class="blue-text pb-2 text-center">{{ $content->topic->topic }}</p>
												<!-- Text -->
												<p class="card-text">{{ $content->comment }}</p>
											</div>
											<div class="card-footer">
										    	<small class="text-muted">{{ $carbon->diffForHumans($content->created_at) }}</small>
											</div>

										</div>
									</div>
								@endforeach
							@else
								<div class="col">
									<h2 class="text-center">Aun no hay contenido registrado.</h2>
								</div>
							@endif
						</div>


					</div>
					<div class="tab-pane fade" id="test-classic-orange" role="tabpanel" aria-labelledby="test-tab-classic-orange">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
							ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
							eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
						deserunt mollit anim id est laborum.</p>
					</div>
				</div>

			</div>
			<!-- Classic tabs -->








			
			
		</div>
	</div>
</div>


@include('layouts.footer')