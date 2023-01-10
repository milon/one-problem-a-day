---
extends: _layouts.post
section: content
title: Shuffle the array
problemUrl: https://leetcode.com/problems/shuffle-the-array/
date: 2023-01-10
categories: [array-and-hashmap]
---

We will iterate over the half of of the array and add the elements to the result array form the front and middle.

```python
class Solution:
    def shuffle(self, nums: List[int], n: int) -> List[int]:
        res, n = [], len(nums)//2
        for i in range(n):
            res.extend([nums[i], nums[n+i]])
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`