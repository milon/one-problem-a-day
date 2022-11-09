---
extends: _layouts.post
section: content
title: Distribute candies
problemUrl: https://leetcode.com/problems/distribute-candies/
date: 2022-11-09
categories: [array-and-hashmap]
---

We will use a set to keep track of the unique types of candies. We will then return the minimum of the length of the set and half the length of the candy array.

```python
class Solution:
    def distributeCandies(self, candyType: List[int]) -> int:
        return min(len(set(candyType)), len(candyType)//2)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`