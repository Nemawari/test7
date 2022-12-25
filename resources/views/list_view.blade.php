
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
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td><button type="button" onClick="location.href='{{route('detail',['id' => $product->id])}}'">詳細編集</button></td>
                                <td>
                                <form method="post" action="{{route('delete',['id' => $product->id])}}" >
                                    @csrf
                                    <button type="submit" onclick="return check()">削除</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  
                    <select name="company">
                        @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->representative_name }}</option>
                        @endforeach
                    </select>
                    <form id="search" action="{{route('search')}}" method="get">
                            <input id="item_name" type="text" name="item_name"><br>
                            <!-- ソートの器 hidden -->
                            <input type='hidden' id="sort_ordered" value='desc'>
                            <input type='hidden' id="sort_col" value='id'>
                            <!-- 仕様書2. 価格上限下限、在庫上限下限 -->
                            <p>価格</p>
                            <input type='number' id="price_up" value='1000'>
                            <input type='number' id="price_down" value='0'><br>
                            <p>在庫</p>
                            <input type='number' id="stock_up" value='10'>
                            <input type='number' id="stock_down" value='0'>
                            <!-- submit切る? -->
                            <button id="ajax_search" type="button">検索</button>
                            <!-- ↓　ステップ８　ソート機能 -->
                            <button id="ajax_sort" type="button">ソート</button>
                    <!-- ステップ８ ajax 検索項目 -->
                    <table border="1">
                        <caption>検索結果</caption>
                        <thead id="endsearch">
                            <tr>
                                <!-- ステップ８　aタグ 非同期処理 -->
                                <th><a href="#" id="ajax_1">商品名</a></th>
                                <th><a href="#" id="ajax_2">価格</a></th>
                                <th><a href="#" id="ajax_3">在庫数</a></th>
                                <th>削除</th>
                                
                            </tr>
                        </thead>
                        <tbody id="ajax_table">
                           
                        </tbody>
                    </table>

                    </form>
                    
                    <a href ="{{route('create')}}" >新規登録</a>
                  
                </div>
            </div>
        </div>
            
    @endsection

                       



    <!-- @if(session('products'))
                            @foreach (session('products') as $product)
                                <p>{{ $product->product_name }}</p>
                            @endforeach
                    @else
                            @foreach ($products as $product)
                                <p>{{ $product->product_name }}</p>
                            @endforeach
                    
                    @endif -->