<?php
namespace App\Helper_Functions;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection ;

trait PaginatorHelper
{

  public function paginate($items, $perPage = 2, $page = null)
  {
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
    'path' => Paginator::resolveCurrentPath(),
    'pageName' => 'page',
    ]);
  }


}
