---
extends: _layouts.post
section: content
title: Can place flowers
problemUrl: https://leetcode.com/problems/can-place-flowers/
date: 2022-10-23
categories: [greedy]
---

We will assume the first and last position are not occupied, so we will imagine 2 empty position at both boundary. Then we will iterate the array and check if the current position is empty and the previous and next positions are occupied. If so, we will plant a flower and increment the counter. If the counter is equal to `n`, we will return `True`. Otherwise, we will return `False`.

```python
class Solution:
    def canPlaceFlowers(self, flowerbed: List[int], n: int) -> bool:
        flowerbed = [0] + flowerbed + [0]
        for i in range(1, len(flowerbed)-1):
            if flowerbed[i-1] == flowerbed[i] == flowerbed[i+1] == 0:
                flowerbed[i] = 1
                n -= 1
        return n <= 0
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`