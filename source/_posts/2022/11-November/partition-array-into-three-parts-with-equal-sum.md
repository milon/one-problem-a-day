---
extends: _layouts.post
section: content
title: Partition array into three parts with equal sum
problemUrl: https://leetcode.com/problems/partition-array-into-three-parts-with-equal-sum/
date: 2022-11-04
categories: [greedy]
---

We will calculate the sum of the array. If the sum is not divisible by 3, we return `False`. Otherwise, we will iterate over the array and check if the sum of the current subarray is equal to the sum of the array divided by 3. If it is, we increment the count. If the count is 3, we return `True`.

```python
class Solution:
    def canThreePartsEqualSum(self, arr: List[int]) -> bool:
        if sum(arr) % 3 != 0:
            return False
        
        average = sum(arr) // 3
        part, count = 0, 0
        for num in arr:
            part += num
            if part == average:
                count += 1
                part = 0
        
        return count >= 3
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`