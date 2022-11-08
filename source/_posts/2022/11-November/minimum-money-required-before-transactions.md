---
extends: _layouts.post
section: content
title: Minimum money required before transactions
problemUrl: https://leetcode.com/problems/minimum-money-required-before-transactions/
date: 2022-11-08
categories: [greedy]
---

Pick a transaction to be the very last one you perform. Before you perform this transaction, you want to perform every transaction that raises your cost, ie, every transaction where the cost is more than the cash back. Then add the cost of your chosen transaction and take the max over all possible final transactions. First we compute the sum of every transaction where the cost is greater than the cash back. If we choose our final transaction to be one where the cost is greater than the cash back, we've already added the cost, so we just undo the subtraction of the cash back. Otherwise, we just add the cost.

```python
class Solution:
    def minimumMoney(self, transactions: List[List[int]]) -> int:
        moneyLost = 0
        for cost, cashback in transactions:
            if cost > cashback:
                moneyLost += cost - cashback

        res = 0
        for cost, cashback in transactions:
            if cost > cashback:
                res = max(res, cashback + moneyLost)
            else:
                res = max(res, cost + moneyLost)
                
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`