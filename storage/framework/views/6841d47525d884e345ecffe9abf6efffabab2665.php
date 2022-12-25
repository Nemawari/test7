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
      
        <p>商品情報ID,<?php echo e(optional($product)->id); ?></p>
        <p>商品画像,<?php echo e(optional($product)->img_path); ?></p>
        <p>商品名,<?php echo e(optional($product)->product_name); ?></p>
        <p>メーカー,<?php echo e(optional($product)->company_id); ?></p>
        <p>価格,<?php echo e(optional($product)->price); ?></p>
        <p>在庫数,<?php echo e(optional($product)->stock); ?></p>
        <p>コメント,<?php echo e(optional($product)->comment); ?></p>
     
    
        <a href="<?php echo e(route('update' , ['id' => $product_id])); ?>">編集する</a>

    <form action="<?php echo e(route('list')); ?>" id="button" onSubmit="check()">
        <button type="submit">戻る</button><a></a>
    </form>
</html><?php /**PATH /Applications/MAMP/htdocs/test8/resources/views/detail_view.blade.php ENDPATH**/ ?>