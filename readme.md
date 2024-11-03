# DIP（Dependency Inversion Principle）の学習用リポジトリ

## DIP（依存性逆転の原則）

SOLID原則のD。プログラムの重要な部分が、重要でない部分に依存しないよう設計すべきであるという原則。


## DI（依存性の注入）

```sample2.php```のようなテクニック。DIを用いて、プログラムの重要部分を担うクラスが、DBやWebフレームワークなどを用いるクラスに依存しないように設計し、DIPを守る。

これ（```sample1.php```）を  
![sample1.php](https://github.com/superneko160/DIP/blob/main/images/sample1.drawio.svg)

こうしたい  
![sample2-1.php](https://github.com/superneko160/DIP/blob/main/images/sample2-1.drawio.svg)

そのためにあいだにインターフェースを介すとよい  
![sample2-2.php](https://github.com/superneko160/DIP/blob/main/images/sample2-2.drawio.svg)

このテクニックが**DI**  
AとBインターフェースを同じ括りで考えたとき、```[A + Bインターフェース] <- [B]```のように矢印の方向が逆転しているので依存性逆転の原則と呼ぶ......らしい。

## メリット

DIを採用するメリットのひとつとして、単体テストが実装しやすくなる、というのがある。  
その例が```sample3.php```（DI不採用） -> ```sample4.php```（DI採用）
