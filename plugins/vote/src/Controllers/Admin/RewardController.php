<?php

namespace Azuriom\Plugin\Vote\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Server;
use Azuriom\Plugin\Vote\Models\Reward;
use Azuriom\Plugin\Vote\Requests\RewardRequest;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vote::admin.rewards.index', [
            'rewards' => Reward::with('server')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vote::admin.rewards.create', [
            'servers' => Server::executable()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Plugin\Vote\Requests\RewardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RewardRequest $request)
    {
        Reward::create($request->validated());

        return redirect()->route('vote.admin.rewards.index')
            ->with('success', trans('vote::admin.rewards.status.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Plugin\Vote\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function edit(Reward $reward)
    {
        return view('vote::admin.rewards.edit', [
            'reward' => $reward->load('server'),
            'servers' => Server::executable()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Plugin\Vote\Requests\RewardRequest  $request
     * @param  \Azuriom\Plugin\Vote\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function update(RewardRequest $request, Reward $reward)
    {
        $reward->update($request->validated());

        return redirect()->route('vote.admin.rewards.index')
            ->with('success', trans('vote::admin.rewards.status.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Plugin\Vote\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Reward $reward)
    {
        $reward->delete();

        return redirect()->route('vote.admin.rewards.index')
            ->with('success', trans('vote::admin.rewards.status.deleted'));
    }
}
