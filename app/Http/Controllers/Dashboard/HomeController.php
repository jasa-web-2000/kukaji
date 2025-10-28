<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\Speaker;
use App\Models\Theme;

class HomeController extends Controller
{

    function calculateGrowth($model, $filter = null)
    {

        $todayCount = $model::whereDate('created_at', today())
            ->when($filter, $filter)
            ->count();
        $yesterdayCount = $model::whereDate('created_at', today()->subDay())
            ->when($filter, $filter)
            ->count();


        if ($todayCount == 0) {
            return 0;
        }

        if ($yesterdayCount == 0) {
            return '~';
        }

        return round(($todayCount / $yesterdayCount) * 100, 2);
    }

    public function index()
    {

        $counts = [
            'user' => User::count(),
            'theme' => Theme::count(),
            'speaker' => Speaker::count(),
            'event' => Event::when(auth()->user()->role != 'admin', function ($query) {
                $query->where('user_id', auth()->id());
            })->count(),
            'eventParticipant' => EventParticipant::when(auth()->user()->role != 'admin', function ($q1) {
                $q1->where('user_id', auth()->id())
                    ->orWhereHas('event', function ($q2) {
                        $q2->where('user_id', auth()->id());
                    });
            })->count(),
        ];

        $growths = [
            'user' => $this->calculateGrowth(User::class),
            'theme' => $this->calculateGrowth(Theme::class),
            'speaker' => $this->calculateGrowth(Speaker::class),
            'event' => $this->calculateGrowth(Event::class, function ($query) {
                $query->when(auth()->user()->role != 'admin', function ($q) {
                    $q->where('user_id', auth()->id());
                });
            }),
            'eventParticipant' => $this->calculateGrowth(EventParticipant::class, function ($query) {
                $query->when(auth()->user()->role != 'admin', function ($q1) {
                    $q1->where('user_id', auth()->id())
                        ->orWhereHas('event', function ($q2) {
                            $q2->where('user_id', auth()->id());
                        });
                });
            }),
        ];
        return view('pages.dashboard.index', [
            'page' => 'Dashboard',
            'title' => 'Halaman Dashboard',
            'desc' => 'Halaman Dashboard',
            'count' => $counts,
            'growth' => $growths,
            'user' =>  User::orderBy('id', 'desc')
                ->take(10)
                ->get(),
            'event' =>  Event::orderBy('id', 'desc')
                ->take(5)
                ->get(),

            'eventParticipant' =>  EventParticipant::orderBy('id', 'desc')
                ->with(['speaker:id,name', 'theme:id,name', 'user:id,username'])
                ->take(5)
        ]);
    }
}
