---
extends: _layouts.post
section: content
title: Design an atm machine
problemUrl: https://leetcode.com/problems/design-an-atm-machine/
date: 2022-09-16
categories: [greedy, design]
---

We will store all the notes to an array, which will be the attribute of the class. We will also have a lookup notes dictionary. For deposit, we will just increase the number of bank notes in the ATM machine. When withdraw, we will take a greedy approach, we will take the largest note first and them move forward. If it is possible to take all the amount, we return the taken array, else we will return `[-1]`.

```python
class ATM:
    def __init__(self):
        self.notes = {0: 20, 1: 50, 2: 100, 3: 200, 4: 500}
        self.money = [0] * 5        

    def deposit(self, banknotesCount: List[int]) -> None:
        for idx, note in enumerate(banknotesCount):
            self.money[idx] += note

    def withdraw(self, amount: int) -> List[int]:
        taken = [0] * 5
        for i in range(4, -1, -1):
            if amount >= self.money[i]*self.notes[i]:
                amount -= self.money[i]*self.notes[i]
                taken[i] += self.money[i]
            else:
                taken[i] += amount//self.notes[i]
                amount -= taken[i]*self.notes[i]
        
        if amount == 0:
            for i in range(5):
                self.money[i] -= taken[i]
            
            return taken
        return [-1]

# Your ATM object will be instantiated and called as such:
# obj = ATM()
# obj.deposit(banknotesCount)
# param_2 = obj.withdraw(amount)
```

Time Complexity: `O(1)`, for each operation <br/>
Space Complexity: `O(1)`