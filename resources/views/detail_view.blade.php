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

    <p>商品情報ID</p>
    <p>商品画像</p>
    <p>商品名</p>
    <p>メーカー</p>
    <p>価格</p>
    <p>在庫数</p>
    <p>コメント</p>

    <input type="submit" value="編集ボタン"><a href="{{route('update' , ['id' => $product_id])}}"></a> 
    <input type="submit" value="戻る"><a></a>
</html>