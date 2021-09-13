# SELP
自己研鑽「Self Develpment」の共有に特化したSNSアプリです。

  <a href="https://gyazo.com/b23a193be12021406eb4205e87dac9cc">  <img src="https://i.gyazo.com/b23a193be12021406eb4205e87dac9cc.jpg" alt="Image from Gyazo" width="700"/></a>

※現在、ドメイン取得中であり、近日中にAWSのEC2にて公開予定です。<br>
URL：
<br>

## テストユーザー
メールアドレス　test@gmail.com<br>
パスワード　aaaa1111  


# 制作した背景
終身雇用制度が崩壊しつつあり、人生100年時代において、自己研鑽の重要度が高くなってきていますが、<br>
モチベーションを維持し継続することは簡単ではありません。<br>
そこで、私だけでなく友人含め、自己研鑽をモチベーション高く継続させたい！と思ったことがきっかけです。<br>

そして、いざその友人たちと自己研鑽に挑戦しましたが、<br>
- モチベーションが維持できない
- ついサボってしまう
このような要因により、2ヶ月目から続きませんでした。。。<br>

そこで対策として<br>
- 意識高い系Vlogを視聴する
- 起きる時間を友人に宣言する
- １日の取り組みをグループ内で共有する

このように対策を施行することにより、自己研鑽が2ヶ月目以降も継続できました。<br>

こうした経験から、自己研鑽の継続をサポートするアプリを作成したいと考えました。
<br>

# 使用技術
- フロントエンド
   - HTML/CSS/Bootstrap
   -  jQuery
   - JavaScript
   - GoogleAPI(Map projects)
- バックエンド
   - php 7.3.29
   - Laravel 6.20.31
- インフラ
   - mysql 5.7.35
   - AWS (EC2,S3,Route53,VPC,EIP,Cloud9)
- その他のツール
   - Cacoo
   - Adobe XD
<br>


# 機能一覧
- ユーザー登録関連
   - アカウント新規登録
   - ログイン、ログアウト機能
   - パスワードロック機能
   - ユーザー情報編集機能
  
- ユーザー投稿関連(CRUD)
   - 位置情報登録(GoogleMap API)- 

- いいね機能
    - いいねした投稿一覧機能(ページネーション）

- フォロー機能
   - フォロー/フォロワー一覧(ページネーション)

- 目標設定関連(CRUD)

- 画像アップロード機能(AWS S3バケット)

# イメージ一覧

## メインページ

<a href="https://gyazo.com/d5b6167608b72c54c285f7f2d7db6f90"><img src="https://i.gyazo.com/d5b6167608b72c54c285f7f2d7db6f90.png" alt="Image from Gyazo" width="500"/></a><br>

メインページには、自分の目標とフォロワ中ユーザー及び自分の投稿を一覧で表示しています。<br>
また、投稿も行えます。

## マイページ

<a href="https://gyazo.com/49d07e09181d3f711c8512a03ce7e44d"><img src="https://i.gyazo.com/49d07e09181d3f711c8512a03ce7e44d.png" alt="Image from Gyazo" width="500"/></a><br>

マイページには、自分のプロフィールと目標、自分の投稿が表示されます。<br>
また、お気に入りの投稿とフォロー/フォロワー一覧の検索も可能です。<br>

## プロフィール編集

<a href="https://gyazo.com/184da8f0f070eff6556bd125131445b1"><img src="https://i.gyazo.com/184da8f0f070eff6556bd125131445b1.png" alt="Image from Gyazo" width="400"/></a><br>

自分のプロフィールである「アイコン」と「自己紹介文」を編集できるようになっています。<br>

## 位置情報追加

<a href="https://gyazo.com/8814e9d040c1105f84f68a4e5ac26458"><img src="https://i.gyazo.com/8814e9d040c1105f84f68a4e5ac26458.png" alt="Image from Gyazo" width="500"/></a><br>

投稿において、位置情報ボタンをクリックするとモーダルが機能し、Google Mapの活用による位置情報の投稿が可能です。<br>
位置情報を追加した投稿は、位置情報ボタンをクリックすると確認することができます。


# DB設計
## ER図

<a href="https://gyazo.com/0208772158d4760d292abbe00286c2cc"><img src="https://i.gyazo.com/0208772158d4760d292abbe00286c2cc.png" alt="Image from Gyazo" width="650"/></a>


## 各テーブルについて
 <table>
    <tr>
      <th>テーブル名</th>
      <th>説明</th>
    </tr>
    <tr>
      <td>users</td>
      <td>ユーザー情報</td>
    </tr>
    <tr>
      <td>user_follow</td>
      <td>ユーザーフォローの中間テーブル</td>
    </tr>
     <tr>
      <td>posts</td>
      <td>投稿情報</td>
    </tr>
     <tr>
      <td>favorites</td>
      <td>投稿への、いいね情報</td>
    </tr>
    <tr>
      <td>goals</td>
      <td>ユーザー目標情報</td>
    </tr>
  </table>

# 今後のアップデート予定と課題
今後は、以下の内容について修正及び加工を施し、ユーザーファーストのアプリにしていきたいと考えています。<br>
- フォロワー間のチャット機能（現在、pusherとajaxを使用した非同期通信の実装中）
- API連携によるログイン機能の拡張



