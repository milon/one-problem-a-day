---
extends: _layouts.post
section: content
title: Maximum number of coins you can get
problemUrl: https://leetcode.com/problems/maximum-number-of-coins-you-can-get/
date: 2022-11-26
categories: [greedy, queue]
---

We will use a double ended queue to store the piles. We will sort the piles in descending order. We will iterate over the piles. We will pop the first and the last element from the queue. We will add the popped elements to the result. We will return the result.

```python
class Solution:
    def maxCoins(self, piles: List[int]) -> int:
        piles = collections.deque(sorted(piles))
        res = 0
        while piles:
            piles.pop()         # Alice
            res += piles.pop()  # Me
            piles.popleft()     # Bob
        return res
```

Time complexity: `O(nlog(n))`, n is the length of piles <br/>
Space complexity: `O(n)`