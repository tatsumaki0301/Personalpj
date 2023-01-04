# Rese    
### 飲食店予約アプリ
[Rese](http://127.0.0.1:8000)
  

## 作成した目的  
飲食店予約アプリを想定し作成 
  

## アプリケーションＵＲＬ  

  

## 他のリポジトリ  
  Github   
 https://github.com/tatsumaki0301/Personalpj 

## 機能一覧  
  
- 会員登録  
- ログイン
- ログアウト    
- ユーザー情報取得  
- ユーザー飲食店お気に入り一覧取得  
- ユーザー飲食店予約情報取得  
- 飲食店一覧取得  
- 飲食店詳細取得  
- 飲食店お気に入り追加  
- 飲食店お気に入り削除  
- 飲食店予約情報追加  
- 飲食店予約情報削除  
- エリアで検索  
- ジャンルで検索  
- 店名で検索  
- エリアとジャンルで検索  
- 飲食店予約情報変更  
- 認証、予約でのバリデーション  
- レスポンシブデザイン（ブレークポイント768px） 
- レビュー機能   
- レビュー５段階評価システム
- QRコード  
- Stripe決済機能  
- 管理者、店舗責任者、利用者分割  
- 利用者へメール一斉送信  
- 予約当日リマインダー  
- 店舗画像ストレージ保存  
- S3へファイルアップロード  
- メール認証機能  
  
## 仕様技術（実行環境）  
- Laravel8.X  
- PHP  
- HTML  
- CSS  
- javascript  
- mysql  
- AWS S3  
- Stripe  
- simple-qrcode
- mailtrap
  
## テーブル設計  
![table1](/img/table1.png)  
![table2](/img/table2.png)  
![table3](/img/table3.png)  
![table4](/img/table4.png)  

  
## ＥＲ図  
![ER図](/img/Rese_ER図.png)
  
## 環境構築  
ローカル環境構築  
- php artisan migrate:fresh --seed （テーブル作成とシーディング）  
  
  
## 他に記載することがあれば記載する  
- 管理者login画面  
(http://127.0.0.1:8000/admin/login)  
メールアドレス：　admin@example.com  
パスワード：　test777  
  
- 店舗責任者login画面  
(http://127.0.0.1:8000/person/login)  
メールアドレス：　person001@example.com  
パスワード：　person001  
  
- 利用者へメール一斉送信  
(http://127.0.0.1:8000/mail/send)  
  
- 予約当日リマインダー  
(http://127.0.0.1:8000/mail/reservemail)  

  

