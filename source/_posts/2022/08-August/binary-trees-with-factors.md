---
extends: _layouts.post
section: content
title: Binary trees with factors
problemUrl: https://leetcode.com/problems/binary-trees-with-factors/
date: 2022-08-09
categories: [dynamic-programming]
---

We will convert the array to array set, so that we can do the lookup in constant time. Then we will check, if a candidate can divide the root without any remainder and root//candidate is available in the array set, then we add it to our answer. Finally, we sum up all the possible answer for every element of the array and mod it by our given mod.

```python
class Solution:
    def numFactoredBinaryTrees(self, arr: List[int]) -> int:
        mod = 10**9+7
        arrSet = set(arr)
        
        @cache
        def dp(root):
            ans = 1
            for candidate in arrSet:
                if root % candidate == 0 and (root // candidate) in arrSet:
                    ans += dp(candidate) * dp(root // candidate)
                    ans %= mod
            return ans
        
        return sum(dp(x) for x in arrSet) % mod
```

Time Complexity: `O(n^2)`
Space Complexity: `O(n)`