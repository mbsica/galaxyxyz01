
<div class="container pl-0 pr-0 ">
    <div class="row medeelel-board">
        <div class="col-md pt-3">
            <div class="server-info">
                <div class="server-ip">
                    <div class="server-icon">
                        <i class="fas fa-dice"></i>
                    </div>
                    <div class="server-medeelel">
                        <div class="small text-uppercase">Дараад хуулаарай</div>
                        <div class="big text-uppercase font-weight-bold">play.galaxymn.xyz</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md pt-3">
            <div class="server-info">
                <div class="server-ip">
                    <div class="server-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="server-medeelel">
                        <a href="/games">
                            @if($server && $server->isOnline())
                                <div class="small text-uppercase">Сэрвэрт нийт</div>
                                <div class="big text-uppercase font-weight-bold">{{ trans_choice('messages.server.online', $server->getOnlinePlayers()) }}</div>
                            @else
                            <div class="small text-uppercase">{{ trans('messages.server.offline') }}</div>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg pt-3">
            <div class="server-info">
                <div class="server-ip">
                    <div class="server-icon">
                        <i class="fab fa-discord"></i>
                    </div>
                    <div class="server-medeelel">
                        <div class="small text-uppercase">33 хүн онлайн</div>
                        <div class="big text-uppercase font-weight-bold">join our discord</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>