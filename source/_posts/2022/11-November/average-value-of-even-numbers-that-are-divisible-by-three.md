---
extends: _layouts.post
section: content
title: Average value of even numbers that are divisible by three
problemUrl: https://leetcode.com/problems/average-value-of-even-numbers-that-are-divisible-by-three/
date: 2022-11-08
categories: [math-and-geometry]
---

We will iterate over all elements and filter the numbers that are divisible by 2*3=6. Then we will calculate the average of the numbers. If there are no numbers that are divisible by 6, we will return 0.

```python
class Solution:
    def averageValue(self, nums: List[int]) -> int:
        nums = [n for n in nums if n%(2*3)==0]
        return int(sum(nums)/len(nums)) if len(nums) > 0 else 0
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`