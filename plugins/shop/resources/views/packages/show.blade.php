
<div class="modal-dialog" style="max-width: 800px" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="itemModalLabel">{{ $package->name }}</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="news-box">
                <div class="box-each" style="border-left: 0; text-align: center;">
                    @if($package->image !== null)
                        <img  src="{{ $package->imageUrl() }}" alt="{{ $package->name }}">
                    @endif
                    <h4 class="pt-3">{{ $package->name }}</h4>
                   
                    <h6 class="pt-2 pb-2">
                        @if($package->isDiscounted())
                            <del class="small" style="color: red; font-size: 75%">{{ $package->getOriginalPrice() }}</del>
                        @endif
                        {{ shop_format_amount($package->getPrice()) }}
                    </h6>
                    @auth
                        @if($package->isInCart())
                            <form action="{{ route('shop.cart.remove', $package) }}" method="POST" class="form-inline">
                                @csrf

                                <button type="submit" class="btn btn-danger w-100 ml-5 mr-5">
                                    {{ trans('shop::messages.actions.remove') }}
                                </button>
                            </form>
                        @elseif($package->getMaxQuantity() < 1)
                            {{ trans('shop::messages.packages.limit') }}
                        @elseif(! $package->hasBoughtRequirements())
                            {{ trans('shop::messages.packages.requirements') }}
                        @else
                            <form action="{{ route('shop.packages.buy', $package) }}" method="POST" class="form-inline">
                                @csrf

                                @if($package->has_quantity)
                                    <div class="form-group">
                                        <label for="quantity">{{ trans('shop::messages.fields.quantity') }}</label>
                                    </div>

                                    <div class="form-group mx-3">
                                        <input type="number" min="0" max="{{ $package->getMaxQuantity() }}" size="5" class="form-control" name="quantity" id="quantity" value="1">
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-success w-100 ml-5 mr-5" style="font-size: 12px;">
                                    {{ trans('shop::messages.buy') }}
                                </button>
                            </form>
                        @endif
                    @else
                        <div class="alert" role="alert">
                            {{ trans('shop::messages.cart.guest') }}
                        </div>
                    @endauth
                </div>
                <div class="box-list">
                    <div class="nano">
                        <div id="defaultOpen" class="nano-content">
                            <div class="package-body2 pt-1 pb-1">
                                {!! $package->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <span class="flex-md-fill font-weight-bold">
            </span>
            <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">Хаах</span>
            </button>
        </div>
    </div>
</div>
