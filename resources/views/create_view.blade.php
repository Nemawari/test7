<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
</head>
<body>
    <h1>商品新規登録</h1>
    <form>
        <table>
            <tr>
                <th><label>商品名</label></th>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <th><label>メーカー</label></th>
                <td><select name="drink" required>
                        <option value = "1">コーラ</option>
                        <option value = "2">お茶</option>
                        <option value = "3">水</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label>価格</label></th>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <th><label>在庫数</label></th>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <th><label>コメント</label></th>
                <td><textarea name="comment" id="" ></textarea></td>
           </tr>
           <tr>
                <th><label>商品画像</label></th>
                <td><input type="file" id="" name="" accept=""></td>
            </tr>
        </table>
            <button type="button">更新</button>
            <button type="button" onClick="history.back()">戻る</button>
    </form>
    
</body>
</html>