---
extends: _layouts.post
section: content
title: Stone game VII
problemUrl: https://leetcode.com/problems/stone-game-vii/
date: 2022-11-24
categories: [dynamic-programming]
---

We can see dynamic programming structure in this problem: each time we take some stones from the left or from the left side, what is rest is always contigious array. So, let us denote by dp(i, j) the biggest difference in scores for the person who start with this position.

If i >= j, then we have empty array and result is zero. In the opposite case, we have two options: we can take either leftmost stone or rightmost stone. We also precomputed CSum: cumulative sums to evaluate sums in ranges in O(1) time. We can either can gain sum from [i+1, j] and subtract dp(i+1, j) or we can gain sum from [i, j-1] and subtract dp(i, j-1). Why we need to subtract here? Because dp(i+1, j) and dp(i, j-1) is maximum difference of scores another player can gain, so for current player we need to take negative value.

```python
class Solution:
    def stoneGameVII(self, stones: List[int]) -> int:
        _sum = list(itertools.accumulate(stones, initial=0))
        
        @lru_cache(2000)
        def fn(i, j):
            if i >= j:
                return 0
        
            return _sum[j+1] - _sum[i] - min(stones[i] + fn(i+1, j), stones[j]+fn(i, j-1))

        return fn(0, len(stones)-1)
```

Time complexity: `O(n^2)`, n is the length of stones <br/>
Space complexity: `O(n^2)`