<div class="card-header">
    <div class="card-title text-center"><p>{{ $month }}月</p></div>
    <div class="d-flex">
        <a class="btn btn-primary" href="{{ action('Admin\MoneybikeController@mypage', ['year_month' => $year_month, 'target' => $last_month]) }}">前の月</a>
        <a class="btn btn-primary" href="{{ action('Admin\MoneybikeController@mypage', ['year_month' => $year_month, 'target' => $next_month]) }}">次の月</a>
    </div>
</div>