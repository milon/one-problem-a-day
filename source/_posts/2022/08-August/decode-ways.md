---
extends: _layouts.post
section: content
title: Decode ways
problemUrl: https://leetcode.com/problems/decode-ways/
date: 2022-08-05
categories: [dynamic-programming]
---

We could decode a string with 1 character with just 1 way, but if we have a 2 digit string, then we can decode it 2 ways. For example, 12 can be decoded `1->A, b->2` or `L->12`. But if a string starts with 0, then we ignore it. Now we can use this as our base case, and create a decision tree. Then we run a recursive DFS in that tree and memoize each step to reduce redundant work.

```python
class Solution:
    def numDecodings(self, s: str) -> int:
        dp = {len(s): 1}

        def dfs(i):
            if i in dp:
                return dp[i]

            if s[i] == "0":
                return 0

            res = dfs(i + 1)
            if i+1 < len(s) and (s[i] == "1" or s[i] == "2" and s[i+1] in "0123456"):
                res += dfs(i + 2)

            dp[i] = res
            return res

        return dfs(0)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`