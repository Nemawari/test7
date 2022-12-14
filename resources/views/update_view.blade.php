<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>商品情報編集画面</h1>
        <p>商品情報ID</p>
            <form action="{{route('product_update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                        <th>商品名</th>
                        <td><input type="text" name="name" value="{{$product->product_name}}" required></td>
                    </tr>
                    <tr>
                        <th>メーカー</th>
                        <td><select name="update" required>
                            @foreach($companies as $company)
                                <option value="{{ $company->id}}">{{ $company->representative_name }}</option>
                            @endforeach
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>価格</th>
                        <td><input type="text" name="price" value="{{$product->price}}" required></td>
                    </tr>
                    <tr>
                        <th>在庫</th>
                        <td><input type="text" name="stock" value="{{$product->stock}}"required></td>
                    </tr>
                    <tr>
                        <th>コメント</th>
                        <td><textarea name="comment" value="{{$product->comment}}"></textarea></td>
                    </tr>
                    <tr>
                        <th>商品画像</th>
                        <td><input type="file" name="img" value="{{$product->img_path}}"></td>
                    </tr>
                </table>

                    <button type="submit">更新する</button>
                    <input type="hidden" name="id" value="{{$product->id}}">
                
            </form>
</body>
</html>