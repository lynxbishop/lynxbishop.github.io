@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex align-items-center border rounded-sm border-primary shadow mb-3 mt-2 p-2 ">
                    <a class="text-center btn btn-primary pl-4 pr-4 mr-3" href="">GET</a>
                    <div style="font-size: 20px;line-height: 0.8"><code>{{ route('api').'/todo' }}</code></div>
                </div>

                <div class="d-flex align-items-center border rounded-sm border-primary shadow mb-3 p-2 ">
                    <a class="text-center btn btn-primary pl-4 pr-4 mr-3" href="">GET</a>
                    <div style="font-size: 20px;line-height: 0.8"><code>{{ route('api').'/todo?sort=-completed' }}</code></div>
                </div>

                <div class="d-flex align-items-center border rounded-sm border-primary shadow mb-3 p-2 ">
                    <a class="text-center btn btn-primary pl-4 pr-4 mr-3" href="">GET</a>
                    <div style="font-size: 20px;line-height: 0.8"><code>{{ route('api').'/todo?include=user' }}</code></div>
                </div>

                <div class="d-flex align-items-center border rounded-sm border-primary shadow mb-3 p-2 ">
                    <a class="text-center btn btn-primary pl-4 pr-4 mr-3" href="">GET</a>
                    <div style="font-size: 20px;line-height: 0.8"><code>{{ route('api').'/todo?filter[id]=1' }}</code></div>
                </div>

                <div class="d-flex align-items-center border rounded-sm border-primary shadow mb-2 p-2">
                    <a class="text-center btn btn-primary pl-4 pr-4 mr-3" href="">GET</a>
                    <div style="font-size: 20px;line-height: 0.8"><code>{{ route('api').'/todo?filter[title]=delectus&sort=id&include=user.company' }}</code></div>
                </div>



            </div>

        </div>
    </div>
@endsection
