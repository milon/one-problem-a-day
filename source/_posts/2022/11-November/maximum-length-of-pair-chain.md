---
extends: _layouts.post
section: content
title: Maximum length of pair chain
problemUrl: https://leetcode.com/problems/maximum-length-of-pair-chain/
date: 2022-11-20
categories: [greedy]
---

We will first sort all the pairs by the second element. Then we will iterate over each pair and we will check if the current pair's first element is greater than the previous pair's second element. If yes, we will increment the result by 1 and update the previous pair to the current pair. We will continue this process until we reach the end of the array.

```python
class Solution:
    def findLongestChain(self, pairs: List[List[int]]) -> int:
        pairs.sort(key=lambda x: x[1])
        res = 0
        prev = -math.inf
        for pair in pairs:
            if prev < pair[0]:
                res += 1
                prev = pair[1]
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(1)`