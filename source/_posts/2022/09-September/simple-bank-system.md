---
extends: _layouts.post
section: content
title: Simple bank system
problemUrl: https://leetcode.com/problems/simple-bank-system/
date: 2022-09-01
categories: [array-and-hashmap]
---

We will create a list in the class to track the balance of each account. Then on each operation we will check whether the account number is out or range or money is overflown to that account, if yes return false. Else we will perform the operation and update our balance and return true.

```python
class Bank:
    def __init__(self, balance: List[int]):
        self.balance = balance
        self.accountLen = len(balance)

    def transfer(self, account1: int, account2: int, money: int) -> bool:
        if account1 <= 0 or account1 > self.accountLen:
            return False
        if account2 <= 0 or account2 > self.accountLen:
            return False
        
        acc1bal = self.balance[account1-1]
        if acc1bal < money or money < 0:
            return False
        
        self.balance[account1-1] -= money
        self.balance[account2-1] += money
        return True

    def deposit(self, account: int, money: int) -> bool:
        if account <= 0 or account > self.accountLen or money < 0:
            return False
        
        self.balance[account-1] += money
        return True

    def withdraw(self, account: int, money: int) -> bool:
        if account <= 0 or account > self.accountLen or money < 0:
            return False
        
        accbal = self.balance[account-1]
        if accbal < money:
            return False
        
        self.balance[account-1] -= money
        return True

# Your Bank object will be instantiated and called as such:
# obj = Bank(balance)
# param_1 = obj.transfer(account1,account2,money)
# param_2 = obj.deposit(account,money)
# param_3 = obj.withdraw(account,money)
```

Time Complexity: `O(1)`, for each operations <br/>
Space Complexity: `O(n)`, n is the number of accounts in the bank