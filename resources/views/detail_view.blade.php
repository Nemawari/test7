<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>商品情報詳細画面{{$product_id}}</h1>
     @foreach ($products as $product)
        <p>商品情報ID,{{ $product_id }}</p>
        <p>商品画像,{{ $img }}</p>
        <p>商品名,{{ $name }}</p>
        <p>メーカー,{{ $company}}</p>
        <p>価格,{{ $price }}</p>
        <p>在庫数,{{ $stock }}</p>
        <p>コメント,{{ $comment }}</p>
     @endforeach
    <button type="submit">編集する</button><a href="{{route('update' , ['id' => $product_id])}}"></a> 
    <button type="submit">戻る</button><a></a>
</html>