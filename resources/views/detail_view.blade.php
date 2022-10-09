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
      
        <p>商品情報ID,{{ $product_id }}</p>
        <p>商品画像,{{ $img_path }}</p>
        <p>商品名,{{ $product_name }}</p>
        <p>メーカー,{{ $company_id}}</p>
        <p>価格,{{ $price }}</p>
        <p>在庫数,{{ $stock }}</p>
        <p>コメント,{{ $comment }}</p>
     
    <form action="{{route('update',['id' => $product_id])}}">
        <button type="submit">編集する</button><a href="{{route('update' , ['id' => $product_id])}}"></a> 
    </form>
    <form action="{{route('list')}}">
        <button type="submit">戻る</button><a></a>
    </form>
</html>