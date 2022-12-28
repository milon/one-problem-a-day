---
extends: _layouts.post
section: content
title: Minimum penalty for a shop
problemUrl: https://leetcode.com/problems/minimum-penalty-for-a-shop/
date: 2022-12-28
categories: [array-and-hashmap, greedy]
---

We will count the number of penaly and then iterate over the customers, canculate the minimum penalty for each customer and add it to the total penalty.

```python
class Solution:
    def bestClosingTime(self, customers: str) -> int:
        n = len(customers)
        penalty = customers.count('Y')
        
        if penalty == n: 
            return n
        
        minPenalty, res = n, 0
        for idx, value in enumerate(customers):
            if minPenalty > penalty:
                minPenalty = penalty
                res = idx
            if value == 'Y':
                penalty -= 1
            else:
                penalty += 1
                
        if minPenalty > penalty: 
            return n
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`

