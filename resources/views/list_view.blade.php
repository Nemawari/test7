
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
                    <table>
                        <thead>
                            <tr>
                                <th>商品名</th>
                                <td><input type="text" name="name"></td>
                            </tr>
                            <tr>
                                <th>メーカー名</th>
                                <td><select>
                                        <option value="1">コーラ</option>
                                        <option value="2">お茶</option>
                                        <option value="3">水</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="検索"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td><a href ="{{route('detail' , ['id' => $product->id])}}">詳細</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href ="{{route('create')}}">新規登録</a>

                    <!-- <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> -->



                </div>
            </div>
        </div>
    @endsection

