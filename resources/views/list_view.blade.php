
    @extends('layouts.products')

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
                    @csrf
                    <table>
                        <thead>
                            <tr>
                                <th>商品名</th>
                                <th>メーカー名</th>
                            </tr>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td><button type="button" onClick="location.href='{{route('detail',['id' => $product->id])}}'">詳細編集</button></td>
                                <td>
                                <form method="post" action="{{route('delete',['id' => $product->id])}}" onsubmit="check()">
                                    @csrf
                                    <button type="submit">削除</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </thead>
                        <tbody>
                            <select name="company">
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->representative_name }}</option>
                                @endforeach
                            </select>
                            <form action="{{route('search')}}" method="get">
                                    <input type="text" name="item_name">
                                    <button type="submit">検索</button>
                                @foreach ($products as $product)
                                    <p>{{ $product->product_name }}</p>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                    

                    <a href ="{{route('create')}}">新規登録</a>
                    
                </div>
            </div>
        </div>
            
    @endsection

                       
