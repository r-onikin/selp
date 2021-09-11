# SELP
自己研鑽「Self Develpment」の共有に特化したSNSアプリです。

※現在、ドメイン取得中でであり、近日中にAWSのEC2にて公開予定です。<br>
URL：
<br>

## テストユーザー
メールアドレス　test@gmail.com<br>
パスワード　aaaa1111
<br>

## 制作した背景
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

こうした経験から、自己研鑽の継続をサポートできるアプリを作成したいと考えました。<br>

## 使用技術
1. フロントエンド
 - HTML/CSS/Bootstrap
 - jQuery
 - JavaScript
 - GoogleAPI(Map projects)
2. バックエンド
 - php 7.3.29
 - Laravel 6.20.31
3. インフラ
 - mysql 5.7.35
 - AWS (EC2,S3,Route53,VPC,EIP,Cloud9)
4. その他のツール
 - Cacoo
 - Adobe XD
<br>

## AWS構成図

## 機能一覧

## DB設計
### ER図

### 各テーブルについて
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

## 今後のアップデート予定と課題
今後は、以下の内容について修正及び加工を施し、ユーザーファーストのアプリにしていきたいと考えています。<br>
- フォロワー間のチャット機能（現在、pusherとajaxを使用した非同期通信の実装中）
- API連携によるログイン機能の拡張



