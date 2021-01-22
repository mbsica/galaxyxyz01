<div class="mn-contact-top">
    <div class="container">
        <div class="float-left">
            <ul class="mn-social-link">
                <li><a href="#"><i class="fab fa-twitch"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                <li><a href="#"><i class="fab fa-discord"></i></a></li>
            </ul>
        </div>
        <div class="float-right">
            <ul class="mn-social-link">
                <li><a href="#">About</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Service</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</div>

<!-------------Nav Menu ------------------->
<nav class="navbar sticky-top navbar-expand-md mn-navbar">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars fa-iconscolor"></i>
            </span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo" src=" {{ site_logo() }}" alt="">
        </a>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03" style="margin-right: -5px">
            <ul class="navbar-nav">
                @foreach($navbar as $element)
                    @if(!$element->isDropdown())
                        <li class="nav-item @if($element->isCurrent()) active @endif">
                            <a class="nav-link" href="{{ $element->getLink() }}" @if($element->new_tab) target="_blank" rel="noopener noreferrer" @endif>{{ $element->name }}</a>
                        </li>
                    @else
                        <li class="topdropdown nav-item dropdown @if($element->isCurrent()) active @endif">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{ $element->id }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $element->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown{{ $element->id }}">
                                @foreach($element->elements as $childElement)
                                    <a class="dropdown-item @if($childElement->isCurrent()) active @endif" href="{{ $childElement->getLink() }}" @if($childElement->new_tab) target="_blank" rel="noopener noreferrer" @endif>{{ $childElement->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>
