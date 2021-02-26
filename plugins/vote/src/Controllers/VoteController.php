<?php

namespace Azuriom\Plugin\Vote\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\User;
use Azuriom\Plugin\Vote\Models\Reward;
use Azuriom\Plugin\Vote\Models\Site;
use Azuriom\Plugin\Vote\Models\Vote;
use Azuriom\Plugin\Vote\Verification\VoteChecker;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VoteController extends Controller
{
    /**
     * Display the vote home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vote::index', [
            'sites' => Site::enabled()->get(),
            'rewards' => Reward::orderByDesc('chances')->get(),
            'votes' => Vote::getTopVoters(now()->startOfMonth()),
        ]);
    }

    public function verifyUser(string $name)
    {
        if (! User::where('name', $name)->exists()) {
            return response()->json([
                'message' => trans('vote::messages.unknown-user'),
            ], 422);
        }

        return response()->noContent();
    }

    public function canVote(Request $request, Site $site)
    {
        $user = $request->user() ?? User::firstWhere('name', $request->input('user'));

        abort_if($user === null, 401);

        $nextVoteTime = $site->getNextVoteTime($user, $request);

        if ($nextVoteTime !== null) {
            $formattedTime = $nextVoteTime->diffForHumans([
                'parts' => 2,
                'join' => true,
                'syntax' => CarbonInterface::DIFF_ABSOLUTE,
            ]);

            return response()->json([
                'message' => trans('vote::messages.vote-delay', ['time' => $formattedTime]),
            ], 422);
        }

        if ($site->rewards->isEmpty()) {
            return response()->json([
                'message' => trans('vote::messages.site-no-rewards'),
            ], 422);
        }

        return response()->noContent();
    }

    public function done(Request $request, Site $site)
    {
        $user = $request->user() ?? User::firstWhere('name', $request->input('user'));

        abort_if($user === null, 401);

        $nextVoteTime = $site->getNextVoteTime($user, $request);

        if ($nextVoteTime !== null) {
            $formattedTime = $nextVoteTime->diffForHumans([
                'parts' => 2,
                'join' => true,
                'syntax' => CarbonInterface::DIFF_ABSOLUTE,
            ]);

            return response()->json([
                'message' => trans('vote::messages.vote-delay', ['time' => $formattedTime]),
            ], 422);
        }

        if ($site->rewards->isEmpty()) {
            return response()->json([
                'message' => trans('vote::messages.site-no-rewards'),
            ], 422);
        }

        $voteChecker = app(VoteChecker::class);

        if ($site->has_verification && ! $voteChecker->verifyVote($site, $user, $request->ip())) {
            return response()->json([
                'status' => 'pending',
            ]);
        }

        $next = now()->addMinutes($site->vote_delay);
        Cache::put('votes.site.'.$site->id.'.'.$request->ip(), $next, $next);

        $reward = $site->getRandomReward();

        if ($reward !== null) {
            $site->votes()->create([
                'user_id' => $user->id,
                'reward_id' => $reward->id,
            ]);

            $reward->giveTo($user);
        }

        return response()->json(['message' => trans('vote::messages.vote-success')]);
    }
}
