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
            <form>
                <table>
                    <tr>
                        <th>商品名</th>
                        <td><input type="text" name="name" required></td>
                    </tr>
                    <tr>
                        <th>メーカー</th>
                        <td><select name="update" required>
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>価格</th>
                        <td><input type="text" name="price" required></td>
                    </tr>
                    <tr>
                        <th>在庫</th>
                        <td><input type="text" name="stock" required></td>
                    </tr>
                    <tr>
                        <th>コメント</th>
                        <td><textarea name="comment"></textarea></td>
                    </tr>
                    <tr>
                        <th>商品画像</th>
                        <td><input type="file" name="file"></td>
                    </tr>
                </table>
            </form>
        <input type="submit" value="更新">
        <input type="submit" value="戻る">
</body>
</html>