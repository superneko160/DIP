<?php
/**
 * sample1の状況から以下のように依存関係を逆転したい
 * A -> B (sample1)
 * B <- A
 * 
 * 上記のように依存関係を逆転させるには以下のように
 * Bのインターフェース (IB) を用意する
 * A -> IB <- B (sample2)
 * 
 * DIは必ずしもインターフェースを使う必要はない
 * Bクラスを直接注入することも可能
 * しかし、インターフェースを使用することで以下のメリットがある
 * - 実装の詳細から分離できる
 * - 複数の異なる実装を簡単に切り替えられる
 * - テストが容易になる
 * - 将来の変更に対して柔軟に対応できる
 */

interface IB {
    function getHowToGreet(): string;
}

class B implements IB {
    public function getHowToGreet(): string {
        return 'Hello';
    }
}

class A {
    private B $b;  // Bインターフェースに依存する

    // コンストラクタで外からBの実体を受け取る
    public function __construct(B $b) {
        $this->b = $b;
    }

    public function greet() :void {
        // 受け取ったBの実体を用いる
        $greetMessage = $this->b->getHowToGreet();
        print $greetMessage;
    }
}

/**
 * Bは外で生成して渡す
 * 以下のように依存するものをコンストラクタなどで外から入れてもらうことを
 * 依存性の注入 (Dependency Injection) と呼ぶ
 */
$b = new B();
$a = new A($b);
$a->greet();
