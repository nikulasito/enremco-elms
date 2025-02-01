<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-9/assets/css/registration-9.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <div class="header-inner header-1" style="display: block;">
					<!--Topbar-->
					<div class="topbar full-view-switch bg-theme semi-dark">
						<div class="basic-container clearfix typo-white">
							<ul class="nav topbar-items pull-left">
								<li class="nav-item">
									<ul class="nav header-info">
										<div class="header-address typo-dark"><span class="ti-headphone-alt"></span>
											<a href="tel:+(123) 456-7890">+(123) 456-7890</a><span class="ti-email ms-3"></span> <a href="mailto:info@example.com">info@example.com</a>
										</div>
									</ul>
								</li>
							</ul>
							<ul class="nav topbar-items pull-right">
								<li class="nav-item">
									<div class="social-icons typo-white">
										<a href="#" class="social-fb"><span class="ti-facebook"></span></a>
										<a href="#" class="social-twitter"><span class="ti-twitter"></span></a>
										<a href="#" class="social-instagram"><span class="ti-instagram"></span></a>
										<a href="#" class="social-pinterest"><span class="ti-pinterest"></span></a>
										<a href="#" class="social-youtube"><span class="ti-youtube"></span></a>
										<a href="#" class="social-dribble"><span class="ti-dribbble"></span></a>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!--Topbar-->
          <div class="main-menu">
                    <header class="container">
                        <div class="flex lg:justify-center lg:col-start-2">
                            
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                              <a href="{{ url('/') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Home</a>
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    <!-- @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Become a Member?
                                        </a>
                                    @endif -->
                                @endauth
                            </nav>
                        @endif
                    </header>
                </div>
            </div>
				</div>
        <div class="py-3 py-md-5 register-main">
            <div class="registration">
                <!-- Registration 9 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row gy-4 align-items-center">

      <div class="col-12 col-md-6 col-xl-7 center-reg">
        <div class="card border-0 rounded-4">
          <div class="card-body p-3 p-md-4 p-xl-4">
            <div class="row">
              <div class="col-12">
                <div class="mb-4">
                  <h2 class="h3">Registration</h2>
                  <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register</h3>
                </div>
              </div>
            </div>
                {{ $slot }}
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
        </div>
    </body>
</html>
