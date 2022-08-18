---
extends: _layouts.post
section: content
title: Strange printer
problemUrl: https://leetcode.com/problems/strange-printer/
date: 2022-08-18
categories: [dynamic-programming]
---

If we start from the last character, then it will always print with 1 switch. This will be our base case. We will run DFS to the rest of the characters. Then we will look through each elements until last character, then check whether we have the last character or not. If we have the last char in the middle, that is already covered by the base case, we will then run DFS from first to until that character, then skip that character, and thake the rest of the string and run DFS on that. We will add this 2, and check which one has the minimum value, we return that.

As we have many repetative computation, we will reduce it by memoization.

```python
class Solution:
    def strangePrinter(self, s: str) -> int:
        def dfs(i, j, memo):
            if (i, j) in memo:
                return memo[(i,j)]
            if i > j:
                return 0
            ans = dfs(i, j-1, memo) + 1
            for k in range(i, j):
                if s[k] == s[j]:
                    ans = min(ans, dfs(i, k, memo) + dfs(k+1, j-1, memo))
            
            memo[(i,j)] = ans
            return memo[(i,j)]
        
        return dfs(0, len(s)-1, {})
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n^2)`
