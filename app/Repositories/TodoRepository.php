<?php

namespace App\Repositories;


use App\Interfaces\TodoInterface;
use App\Traits\ResponseAPI;
use App\Models\Todo;
use DB;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;


class TodoRepository implements TodoInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAll(Request $request)
    {

        try {
            $todo = QueryBuilder::for(Todo::class)
                ->defaultSort('id')
                ->allowedSorts('id','userId','title','completed')
                ->allowedIncludes(['user.address.geo','user.company'])
                ->allowedFilters(
                [
                    AllowedFilter::exact('userId'),
                    AllowedFilter::exact('completed'),
                    'title',
                    'user.name',
                    'user.email',
                    'user.todo',
                    'user.website',
                    'user.company.id',
                    'user.company.name',
                    'user.company.catchPhrase',
                    'user.company.bs',
                ]
            )->get();
            return $this->success("All Todos", $todo);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
