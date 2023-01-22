---
extends: _layouts.post
section: content
title: Confusing number II
problemUrl: https://leetcode.com/problems/confusing-number-ii/
date: 2023-01-22
categories: [backtracking]
---

We can use backtracking to generate all possible numbers and check if they are confusing. We can generate all numbers with length from 1 to 9. For each length we can generate all numbers with digits from 1 to 9. For each number we can check if it is confusing. If it is, we add it to the result.

```python
class Solution:
    def confusingNumberII(self, n: int) -> int:
        rotate180 = [(0, 0), (1, 1), (6, 9), (8, 8), (9, 6)]
        self.res = 0
        
        def dfs(num, numRotated, unit):
            if num != numRotated:
                self.res += 1
            
            for d, dRotated in rotate180:
                if d == 0 and num == 0:     # Skip zero infinity!
                    continue  
                if num * 10 + d > n:        # Over N already!
                    break
                dfs(num*10+d, dRotated*unit+numRotated, unit*10)
            
        dfs(0, 0, 1)
        return self.res
```

Time complexity: `O(5^log(n))` <br/>
Space complexity: `O(lon(n))`
