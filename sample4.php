<?php
/**
 * 具体的な例ver
 * sample4.phpをDIを使って修正
 * 
 * 製品コードではCartのコンストラクタに UserRepositoryDb を
 * テストでは UserRepositoryMock を渡すことで
 * テスト時に UserRepositoryDb の実装に依存せずにテストができる
 */

interface IUserRepository {
    function checkAvailableUserForPurchase(string $userId): bool;
}

class Cart {
    private string $userId;
    private IUserRepository $userRepository;

    public function __construct(string $userId, IUserRepository $userRepository) {
        $this->userId = $userId;
        $this->userRepository = $userRepository;
    }

    public function checkValidCart(): bool {
        return $this->userRepository->checkAvailableUserForPurchase($this->userId);
    }
}

class UserRepositoryDb implements IUserRepository {
    public function checkAvailableUserForPurchase(string $userId): bool {
        // DBの会員情報にアクセスして有効かを判定するコードを記述
    }
}

class UserRepositoryMock implements IUserRepository {
    public function checkAvailableUserForPurchase(string $userId): bool {
        // テスト用のデータを返すコードを記述
    }
}
