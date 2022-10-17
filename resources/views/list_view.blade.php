
    @extends('layouts.app')

    @section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">ユーザーログイン画面</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">ユーザー新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    商品情報一覧画面
                </div>

                <div class="links">
                <form action="{{route('search')}}" method="get">
                    @csrf
                    <table>
                        <thead>
                            <tr>
                                <th>商品名</th>
                                <th>メーカー名</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <select name="company">
                              @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->representative_name }}</option>
                              @endforeach
                            </select> -->
                            <input type="text" name="item_name">
                            <button type="submit">検索</button>
                            @foreach ($products as $product)
                                <p>{{ $product->product_name }}</p>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                    <a href ="{{route('create')}}">新規登録</a>
                    <a href ="{{route('detail',['id' => $product->id])}}">詳細編集</a>

                    <script src="js/test">

                    </script>
                </div>
            </div>
        </div>
    @endsectionß

                        <!-- <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                            </tr>
                            @endforeach
                            <td><a href ="{{route('detail' , ['id' => $product->id])}}">詳細</a></td>
                        </tbody> -->

                    <!-- <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> -->




