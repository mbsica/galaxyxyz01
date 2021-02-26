@extends('layouts.app')

@section('title', trans('shop::messages.title'))

@push('footer-scripts')
    <script>
        document.querySelectorAll('[data-package-url]').forEach(function (el) {
            el.addEventListener('click', function (ev) {
                ev.preventDefault();

                axios.get(el.dataset['packageUrl'], {
                    headers: {
                        'X-PJAX': 'true'
                    }
                }).then(function (response) {
                    $('#itemModal').html(response.data).modal('show');
                }).catch(function (error) {
                    createAlert('danger', error, true);
                });
            });
        });
    </script>
@endpush

@section('content')
@include('elements.serverinfo')
<div style="height: 15px"></div> 
    <div class="container content pl-0 pr-0">
        <div class="card">
            <div class="card-body pt-3 pb-3">
                @auth
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="d-flex">
                                <i class="fas fa-shopping-cart" style="margin: auto 20px auto 0; font-size:32px; color:#fff;"></i>
                                <a href="shop/cart">
                                    <div class="pl-2">
                                        <h6 class="text-red">Сагс</h6>
                                        <p class="small p-0 m-0">Сагсруу очих</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8 shopCat-right">HOME</div>
                    </div>
                @else 
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="d-flex">
                                <i class="fas fa-shopping-cart" style="margin: auto 20px auto 0; font-size:32px; color:#fff;"></i>
                                <a href="">
                                    <div class="pl-2">
                                        <h6 class="text-red">WELLCOME</h6>
                                        <p class="small p-0 m-0">Нэвтрээгүй байна.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8 shopCat-right">HOME</div>
                    </div>
                @endauth
            </div>
        </div>
        <div style="height: 15px;"></div>
        <div class="row">
            <div class="col-md-4 pb-4">
                @include('shop::categories.sidebar')
            </div>

            <div class="col-md-8">
                <div class="row">
                    @forelse($packages as $package)
                        <div class="col-lg-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    @if($package->image !== null)
                                        <a href="#" data-package-url="{{ route('shop.packages.show', $package) }}">
                                            <img class="card-img-top" src="{{ $package->imageUrl() }}" alt="{{ $package->name }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                                        </a>
                                    @endif
                                    <h6 class="text-center">{{ $package->name }}</h6>
                                    <p class="text-center">
                                        @if($package->isDiscounted())
                                            <del class="small" style="color: red; font-size: 65%">{{ $package->getOriginalPrice() }}</del>
                                        @endif
                                        {{ shop_format_amount($package->getPrice()) }}
                                    </p>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-warning mr-2" data-package-url="{{ route('shop.packages.show', $package) }}">
                                            <i class="fas fa-info"></i>
                                        </button>

                                        @auth
                                            @if($package->isInCart())
                                                <form action="{{ route('shop.cart.remove', $package) }}" method="POST" class="form-inline">
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger ">
                                                        {{ trans('shop::messages.actions.remove') }}
                                                    </button>
                                                </form>
                                            @elseif($package->getMaxQuantity() < 1)
                                                {{ trans('shop::messages.packages.limit') }}
                                            @elseif(! $package->hasBoughtRequirements())
                                                {{ trans('shop::messages.packages.requirements') }}
                                            @else
                                                <form action="{{ route('shop.packages.buy', $package) }}" method="POST" class="d-flex">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success" style="font-size: 12px;">
                                                        {{ trans('shop::messages.buy') }}
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <button type="submit" class="btn btn-success" style="font-size: 12px;" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                {{ trans('shop::messages.buy') }}
                                            </button>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col">
                            <div class="alert alert-warning" role="alert">
                                {{ trans('shop::messages.categories.empty') }}
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true"></div>
@endsection