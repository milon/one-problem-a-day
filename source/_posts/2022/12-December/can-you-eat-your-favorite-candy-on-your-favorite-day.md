---
extends: _layouts.post
section: content
title: Can you eat your favorite candy on your favorite day
problemUrl: https://leetcode.com/problems/can-you-eat-your-favorite-candy-on-your-favorite-day/
date: 2022-12-07
categories: [array-and-hashmap]
---

Define a prefix sum of candiesCount. If you label all candies starting from 1 and order them by type:

- [prefix[candyType]+1, prefix[candyType+1]] are all the candies of type candyType.
- At minimum, you must eat targetDay+1 candies.
- At maximum, you can eat (targetDay+1)*dailyCap
- So now you have two intervals. The answer to each query is whether or not these two intervals overlap.

```python
class Solution:
    def canEat(self, candiesCount: List[int], queries: List[List[int]]) -> List[bool]:
        prefix = [0]
        for candy in candiesCount:
            prefix.append(prefix[-1]+candy)
        
        def helper(candyType, targetDay, dailyCap):
            low, high = prefix[candyType]+1, prefix[candyType+1]
            minEat = targetDay+1
            maxEat = (targetDay+1)*dailyCap
            if maxEat < low or minEat > high:
                return False
            else:
                return True
        
        res = [helper(*query) for query in queries]
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`