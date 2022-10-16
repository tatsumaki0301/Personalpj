# Rese    
### 飲食店予約アプリ
[Rese](http://127.0.0.1:8000)
  

## 作成した目的  
COAHTECH アドバンスタームの課題として作成  
  

## アプリケーションＵＲＬ  
https://gentle-falls-41390.herokuapp.com/ 
  

## 他のリポジトリ  
  Github 
  https://github.com/tatsumaki0301/Resepj.git  

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
- レスポンシブデザイン　（ブレークポイント768px）  
  
  
## 仕様技術（実行環境）  
- Laravel8.X  
- PHP  
- HTML  
- CSS  
- javascript  
- mysql  
  
## テーブル設計  
![table1](/img/table1.png)  
![table2](/img/table2.png)  
  
## ＥＲ図  
![ER図](/img/ER図.png)
  
## 環境構築  
ローカル環境構築  
- php artisan migrate:fresh --seed でテーブル作成とシーディング  
  
本番環境構築(Heroku)  
- heroku run php artisan migrate （マイグレーション）  
- heroku run php artisan db:seed （シーダー挿入）    
  
## 他に記載することがあれば記載する  
例 ) ## アカウントの種類（テストユーザーなど）  
  

