<div class="fixed-bottom">
    <div class="float-right">
        <!-- Authentication Links -->
        @guest
            <div class="footer-profile" data-toggle="modal" data-target=".bd-example-modal-lg">
                <div class="nav-link"><i class="fas fa-sign-in-alt"></i></div>
                
            </div>
        @else
            <div class="d-flex flex-row-reverse bd-highlight footer-profile">
                <div class="bd-highlight">
                    @include('elements.notifications')
                </div>
                <div class="bd-highlight">
                    <div class="dropdown notifications-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="notificationsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: azure;">
                            <!-- Counter - Notifications -->
                            <i class="fas fa-user-tie"></i>
                        </a>
                        <div class="dropdown-list dood-1 dropdown-menu dropdown-menu-right" aria-labelledby="notificationsDropdown">
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                {{ trans('messages.nav.profile') }}
                            </a>
    
                            @foreach(plugins()->getUserNavItems() ?? [] as $navId => $navItem)
                                <a class="dropdown-item" href="{{ route($navItem['route']) }}">
                                    {{ trans($navItem['name']) }}
                                </a>
                            @endforeach
    
                            @if(Auth::user()->hasAdminAccess())
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    {{ trans('messages.nav.admin') }}
                                </a>
                            @endif
    
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ trans('auth.logout') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endguest
    </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 login-form-1">
                        
                        <h3>{{ trans('auth.login') }}</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf <!-- {{ csrf_field() }} -->
                            <div class="form-group">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="{{ trans('auth.email') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ trans('auth.password') }}" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="{{ trans('auth.login') }}" />
                            </div>
                            <div class="form-group">
                                <a href="{{ route('password.request') }}" class="btnForgetPwd">{{ trans('auth.forgot-password') }}</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 login-form-2">
                        <div class="login-logo">
                            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        </div>
                        <h3>{{ trans('auth.register') }}</h3>
                        <form method="POST" action="{{ route('register') }}" id="captcha-form">
                            @csrf
                            <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ trans('auth.name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ trans('auth.email') }}" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ trans('auth.password') }}" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" placeholder="{{ trans('auth.confirm-password') }}" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            @include('elements.captcha', ['center' => true])

                            <div class="form-group ">
                                    <button type="submit" class="btnSubmit">
                                        {{ trans('auth.register') }}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>