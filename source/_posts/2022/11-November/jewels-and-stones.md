---
extends: _layouts.post
section: content
title: Jewels and stones
problemUrl: https://leetcode.com/problems/jewels-and-stones/
date: 2022-11-06
categories: [array-and-hashmap]
---

We will count all the distinct jewels and store it in a set. Then we will iterate over all the stones and check if the stone is a jewel. If it is, we will increment the count.

```python
class Solution:
    def numJewelsInStones(self, jewels: str, stones: str) -> int:
        jewels = set(jewels)
        count = 0
        for stone in stones:
            if stone in jewels:
                count += 1
        return count
```

We can also count all the stones and then iterate over all the jewels and check if the jewel is in the stones. If it is, we will add the count of the jewel to the total count.

```python
class Solution:
    def numJewelsInStones(self, jewels: str, stones: str) -> int:
        stones = collections.Counter(stones)
        count = 0
        for jewel in jewels:
            count += stones.get(jewel, 0)
        return count
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`