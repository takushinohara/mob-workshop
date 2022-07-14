# モブプログラミング ワークショップ

モブプログラミング ワークショップの演習用ソースコードです。

# 概要

- カフェのメニューを表示するためのAPIを作成します
    - メニューの内容は好みに合わせて決めて頂いて構いません
    - メニューには以下の内容を必ず表示します
        - 商品名
        - 税込価格
            - 消費税はイートインの場合10%、テイクアウトの場合8%とする
- 現状のソースコードには商品一覧(商品ID, 商品名, 税抜価格)を返却するREST APIを仮実装しています
    - コードベースには [Slim Framework](https://www.slimframework.com/) の [Skeleton Application](https://github.com/slimphp/Slim-Skeleton) を利用しています

# ワークショップ演習課題

1. メニュー表示に必要な情報を返却するREST APIを実装してください
2. メニュー表示のAPIに以下の追加要件を実装してください
    - 軽食とドリンクをセット購入した場合に50円割引するセットメニューを表示する
    - 期間限定商品を販売期間中のみメニューに表示する