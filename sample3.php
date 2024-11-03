<?php
/**
 * 具体的な例ver
 * CartクラスのCheckValidCartがUserRepositoryに依存している状態
 * 
 * このクラスのテストコードを書こうとするとDBのデータによって成否が変わるので
 * コード自体は問題ないのにテストが失敗する可能性がある
 * 
 * 補足：テスト用のDBをしっかり管理すればテスト自体は可能ではあるが、
 * 管理するリソースが増える、他のリソースへアクセスするためテスト実行が遅くなる
 * といった、いずれにせよユニットテストとしては課題が残る
 */

class Cart {
    private string $userId;

    public function __construct(string $userId) {
        $this->userId = $userId;
    }

    public function checkValidCart(): bool {
        $userRepository = new UserRepository();
        return $userRepository->checkAvailableUserForPurchase($this->userId);
    }
}

class UserRepository {
    public function checkAvailableUserForPurchase(string $userId): bool {
        // DBの会員情報にアクセスして有効かを判定するコードを記述
    }
}
