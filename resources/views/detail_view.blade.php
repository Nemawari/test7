<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    <script src="/public/js/delete.js"></script>
</head>
<body>
    
    <h1>商品情報詳細画面</h1>
      
        <p>商品情報ID,{{ $product->id }}</p>
        <p>商品画像,{{ $product->img_path }}</p>
        <p>商品名,{{ $product->product_name }}</p>
        <p>メーカー,{{ $product->company_id}}</p>
        <p>価格,{{ $product->price }}</p>
        <p>在庫数,{{ $product->stock }}</p>
        <p>コメント,{{ $product->comment }}</p>
     
    <!-- <form action="{{route('product_update',['id' => $product_id])}}"> -->
            <a href="{{route('update' , ['id' => $product_id])}}">編集する</a> 
    <form action="{{route('list')}}" id="button" onSubmit="check()">
    
        
        <button type="submit">戻る</button><a></a>
    </form>
</html>