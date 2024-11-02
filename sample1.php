<?php
/**
 * 以下はクラスAがクラスBに依存している状況
 */

class B {
    public function getHowToGreet(): string {
        return 'Hello';
    }
}

class A {
    public function greet(): void {
        // BをAの内部でインスタンス化
        $b = new B();
        // Bを用いて挨拶の仕方を取得
        $greetMessage = $b->getHowToGreet();

        print $greetMessage;
    }
}

$a = new A();
$a->greet();
